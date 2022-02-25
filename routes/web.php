<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


Route::view('/', 'home');
Route::view('/welcome', 'welcome');

Route::get('/mail', function () {
  return new \App\Mail\WelcomeMail;
});

Route::resource('/profile', Controllers\ProfileController::class)->middleware('auth');

Route::get('/users', [Controllers\UserController::class, 'index'])->name('users');
Route::get('/user-posts', [Controllers\UserController::class, 'posts'])->name('user.posts');

Route::get('/search', Controllers\SearchController::class)->name('search');

Route::get('/notifications', [Controllers\HomeController::class, 'notifications'])->name('notifications');
Route::get('/notificationsCount', [Controllers\HomeController::class, 'notificationsCount']);

Route::resources([
  '/category' => Controllers\CategoryController::class,
  '/post' => Controllers\PostController::class
]);

Route::post('/likeData', [Controllers\LikeController::class, 'likeData']);
Route::post('/voteData', [Controllers\LikeController::class, 'voteData']);


Route::group(['middleware' => 'auth'], function () {

  Route::get('/setting/index', [Controllers\SettingController::class, 'index'])->name('setting.index');
  Route::patch('/like-setting/{user:id}', [Controllers\SettingController::class, 'toggleLike'])->name('like-setting');
  Route::patch('/follow-setting/{user:id}', [Controllers\SettingController::class, 'toggleFollow'])->name('follow-setting');
  Route::patch('/comment-setting/{user:id}', [Controllers\SettingController::class, 'toggleComment'])->name('comment-setting');

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

