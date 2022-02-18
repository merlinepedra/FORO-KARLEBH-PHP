<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


Route::view('/', 'home');
Route::view('/welcome', 'welcome');

Route::get('/mail', function () {
  return new \App\Mail\WelcomeMail;
});

Route::resource('/profile', Controllers\ProfileController::class)->middleware('auth');
Route::get('/users', Controllers\UserController::class)->name('users');

Route::get('/notifications', [Controllers\HomeController::class, 'notifications'])->name('notifications');
Route::get('/notificationsCount', [Controllers\HomeController::class, 'notificationsCount']);

Route::resource('/post', Controllers\PostController::class);
Route::post('/likeData', [Controllers\LikeController::class, 'likeData']);


Route::group(['middleware' => 'auth'], function () {

  Route::resource(
    '/category', Controllers\CategoryController::class
  );
  
  Route::post('/follow/{user}', [Controllers\FollowController::class, 'store'])->name('follow');
  
  Route::post('/filepondUpload', [Controllers\FileController::class, 'filepondUpload']);
  Route::post('/dropzone', [Controllers\FileController::class, 'dropzoneUpload']);
  Route::post('/file/{file}', [Controllers\FileController::class, 'delete'])->name('file.delete');

  Route::post('/reply', [Controllers\CommentController::class, 'storeReply'])->name('comment.reply');
  Route::post('/comment', [Controllers\CommentController::class, 'store'])->name('comment.store');
  Route::get('/comment/{comment}/edit', [Controllers\CommentController::class, 'edit'])->name('comment.edit');
  Route::patch('/comment/{comment}', [Controllers\CommentController::class, 'update'])->name('comment.update');
  
  Route::post('/like', [Controllers\LikeController::class, 'like']);
  Route::delete('/delete-like', [Controllers\LikeController::class, 'delete-like']);
  Route::post('/unlike', [Controllers\LikeController::class, 'unlike']);
  Route::delete('/delete-unlike', [Controllers\LikeController::class, 'delete-unlike']);

});























require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

