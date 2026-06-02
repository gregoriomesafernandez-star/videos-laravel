<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
   public function store(Request $request){

        $validate = $request->validate([
            'body'       => 'required' 
        ]);

        $comment = new Comment();

        $comment->user_id = Auth::id();
        $comment->video_id = $request->input('video_id');
        $comment->body = $request->input('body');

        $comment->save();
        
        return redirect()->route('video.detail', $comment->video_id)
                         ->with([
                            'message' => 'El comentario se ha añadido correctamente!',
                            'video_time' => $request->video_time
                            ])
                         ->withFragment('comentarios');

   }

   public function deleteComment(int $comment_id){
        $user = Auth::user();
        $comment = Comment::find($comment_id);

        if($user && ($comment->user_id == $user->id) || $comment->video->user_id == $user){
            $comment->delete();
        }

        return redirect()->route('video.detail', $comment->video_id)
                         ->with(['message' => 'El comentario se ha borrado correctamente!'])
                         ->withFragment('comentarios');
   }

   
}
