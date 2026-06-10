<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('id','desc')->paginate(6);

        return view('welcome', [
            'videos' => $videos
        ]);
    }

    public function createVideo()
    {
        return view('video.createVideo');
    }

    public function saveVideo(Request $request)
    {
        $validatedData = $request->validate([
            'title'       => 'required|string|min:5',
            'description' => 'required|string|min:10',
            //'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240', // 10MB
            'video'       => 'mimes:mp4|required'  
        ]);

        $video = new Video();
        $user_id = Auth::id(); // Obtenemos id obj-usuario logeado 
        $video->user_id = $user_id;
        $video->title = $request->input('title');
        $video->description = $request->input('description');

        // Subida de la miniatura (imagen)
        if ($request->hasFile('image')) {
            
            $image = $request->file('image');
            
            // Generar un nombre único y seguro
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Guardar la imagen en la carpeta "public/images"
            $image->storeAs('images', $imageName, 'public');
            
            // Guardar la ruta en la base de datos
            $video->image = $imageName;
        }

        // Subida del video
        if ($request->hasFile('video')) {
            
            $video_file = $request->file('video');
            
            // Generar un nombre único y seguro
            $videoName = time() . '_' . $video_file->getClientOriginalName();
            
            // Guardar la imagen en la carpeta "public/images"
            $video_file->storeAs('videos', $videoName, 'public');
            
            // Guardar la ruta en la base de datos
            $video->video_path = $videoName;
        }

        $video->save();

        return redirect()->route('home')->with([
            'message' => 'El video se ha subido correctamente!'
        ]);
    }

    public function showImg(string $filename)
    {
        $path = storage_path('app/public/images/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }

    public function videoDetail(int $video_id)
    {
        $video = Video::find($video_id);
        $videos = Video::paginate(10);

        return view('video.detail', [
            'video' => $video,
            'videos' => $videos,
        ]);
    }

    public function showVideo(string $filename)
    {
        $path = storage_path('app/public/videos/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }

    public function deleteVideo(int $video_id){

        $user = Auth::user();
        $video = Video::find($video_id);
        

        if ($user && $video->user_id === $user->id) {

            // Eliminar comentarios
            Comment::where('video_id', $video_id)->delete();

            // Eliminar archivos
            if ($video->image) {
                Storage::disk('public')->delete('images/' . $video->image);
                
            }

            if ($video->video_path) {
                Storage::disk('public')->delete('videos/' . $video->video_path);
            }

            // Eliminar video
            $video->delete();

            return redirect()
                ->route('home')
                ->with('message', 'Vídeo eliminado correctamente');
        }

        return redirect()
            ->route('home')
            ->with('message', 'El vídeo no se ha eliminado'
        );

    }

    public function edit(int $video_id)
    {
        $user = Auth::user();
        $video = Video::findOrFail($video_id);

        if ($user && $video->user_id === $user->id) {

            return view('video.edit', [
                'video' => $video
            ]);

        } else {
            return redirect()->route('home');
        }
        
    }

    public function update(int $video_id, Request $request){

        $request->validate([
            'title'       => 'required|string|min:5',
            'description' => 'required|string|min:10',
            //'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240', // 10MB
            'video'       => 'mimes:mp4'  
        ]);

        $user = Auth::user();
        $video = Video::findOrFail($video_id);
        $video->user_id = $user->id;
        $video->title = $request->input('title');
        $video->description = $request->input('description');

        // Subida de la miniatura (imagen)
        if ($request->hasFile('image')) {
            
            if ($video->image) {
                Storage::disk('public')->delete('images/' . $video->image);   
            }
            
            $image = $request->file('image');
            
            // Generar un nombre único y seguro
            $imagePath = time() . '_' . $image->getClientOriginalName();
            
            // Guardar la imagen en la carpeta "public/images"
            $image->storeAs('images', $imagePath, 'public');
            
            // Guardar la ruta en la base de datos
            $video->image = $imagePath;
        }

        // Subida del video
        if ($request->hasFile('video')) {
            
            if ($video->video_path) {
                Storage::disk('public')->delete('images/' . $video->video_path);   
            }

            $video_file = $request->file('video');
            
            // Generar un nombre único y seguro
            $videoPath = time() . '_' . $video_file->getClientOriginalName();
            
            // Guardar la imagen en la carpeta "public/images"
            $video_file->storeAs('videos', $videoPath, 'public');
            
            // Guardar la ruta en la base de datos
            $video->video_path = $videoPath;
        }

        $video->save();

        return redirect()
                ->route('home')
                ->with('message', 'Vídeo actualizado correctamente');
    }

    public function search(Request $request)
    {
        $search = $request->query('search');
        $order = $request->query('order', 'latest');

        $videos = Video::query();

        if ($search) {
            $videos->where('title', 'LIKE', "%$search%");
        }

        // Ordenar
        if ($order === 'oldest') {
            $videos->oldest();
        } elseif ($order === 'title') {
            $videos->orderBy('title', 'asc');
        } else {
            $videos->latest();
        }

        $videos = $videos->paginate(6);

        return view('welcome', compact(
            'videos',
            'search'
        ));
    }
}
