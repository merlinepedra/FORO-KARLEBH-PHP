<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'home');
Route::view('/welcome', 'welcome');

Route::get('/mail', function () {
  return new \App\Mail\WelcomeMail;
});

Route::resource('/profile', \App\Http\Controllers\ProfileController::class)->middleware('auth');
Route::get('/users', [\App\Http\Controllers\UserController::class, '__invoke'])->name('users');


Route::group(['middleware' => 'auth'], function () {

  Route::resources([
    '/post' => \App\Http\Controllers\PostController::class,
    '/category' => \App\Http\Controllers\CategoryController::class,
  ]);
  
  Route::post('/follow/{user}', [\App\Http\Controllers\FollowController::class, 'store'])->name('follow');
  
  Route::post('/filepondUpload', [\App\Http\Controllers\FileController::class, 'filepondUpload']);
  Route::post('/dropzone', [\App\Http\Controllers\FileController::class, 'dropzoneUpload']);
  Route::post('/file/{file}', [\App\Http\Controllers\FileController::class, 'delete'])->name('file.delete');

  Route::post('/reply', [\App\Http\Controllers\CommentController::class, 'storeReply'])->name('comment.reply');
  Route::post('/comment', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
  Route::get('/comment/{comment}/edit', [\App\Http\Controllers\CommentController::class, 'edit'])->name('comment.edit');
  Route::patch('/comment/{comment}', [\App\Http\Controllers\CommentController::class, 'update'])->name('comment.update');
  
  Route::post('/like', [\App\Http\Controllers\LikeController::class, 'like']);
  Route::post('/unlike', [\App\Http\Controllers\LikeController::class, 'unlike']);
  Route::post('/likeData', [\App\Http\Controllers\LikeController::class, 'likeData']);

});



























require __DIR__.'/auth.php';
