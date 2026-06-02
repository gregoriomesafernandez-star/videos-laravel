<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

Route::get('/', [VideoController::class, 'index'])
    ->name('home');
    

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rutas del controlador video
Route::get('crear-video', [VideoController::class, 'createVideo'])
    ->name('create.video')
    ->middleware('auth');

Route::post('guardar-video', [VideoController::class, 'saveVideo'])
    ->name('save.video')
    ->middleware('auth');

Route::post('update-video/{video_id}', [VideoController::class, 'update'])
    ->name('update.video')
    ->middleware('auth');

Route::get('image/{filename}', [VideoController::class, 'showImg'])
     ->name('show.image');

Route::get('video/{video_id}', [VideoController::class, 'videoDetail'])
    ->name('video.detail');

Route::get('delete-video/{video_id}', [VideoController::class, 'deleteVideo'])
    ->name('delete.video')
    ->middleware('auth');

Route::get('video-file/{filename}', [VideoController::class, 'showVideo'])
     ->name('show.video');

Route::get('editar-video/{video_id}', [VideoController::class, 'edit'])
    ->name('edit.video')
    ->middleware('auth');

Route::get('buscar', [VideoController::class, 'search'])
->name('search.video');



//Comentarios
Route::post('comment', [CommentController::class, 'store'])
    ->name('comment')
    ->middleware('auth');

Route::get('delete-comment/{comment_id}', [CommentController::class, 'deleteComment'])
    ->name('delete.comment')
    ->middleware('auth');

//Usuarios
Route::get('canal/{user_id}', [UserController::class, 'channel'])
    ->name('channel.user');

require __DIR__.'/auth.php';

