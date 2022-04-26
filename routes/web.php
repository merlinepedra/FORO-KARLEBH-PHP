<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


Route::get('/', [Controllers\PostController::class, 'index']);
Route::view('/welcome', 'welcome');

Route::get('/mail', function () {
  return new \App\Mail\WelcomeMail;
});

Route::resource('/profile', Controllers\ProfileController::class)->middleware('auth');

Route::get('/users', [Controllers\UserController::class, 'index'])->name('users');
Route::get('/user-posts', [Controllers\UserController::class, 'posts'])->name('user.posts')->middleware('auth');

Route::post('/search', [Controllers\SearchController::class, 'search'])->name('search');
Route::get('/search-view', [Controllers\SearchController::class, 'mobileSearch'])->name('mobile-search');

Route::get('/notifications', [Controllers\HomeController::class, 'notifications'])->name('notifications');
Route::get('/notificationsCount', [Controllers\HomeController::class, 'notificationsCount']);
Route::delete('/delete-notification/{id}', [Controllers\HomeController::class, 'deleteNotification']);

Route::resources([
  '/category' => Controllers\CategoryController::class,
  '/post' => Controllers\PostController::class
]);

Route::post('/like-data', [Controllers\LikeController::class, 'likeData']);
Route::post('/vote-data', [Controllers\VoteController::class, 'voteData']);


Route::group(['middleware' => 'auth'], function () {

  Route::get('my-comments', [Controllers\CommentController::class, 'myComments'])->name('my-comments');

  Route::get('/setting/index', [Controllers\SettingController::class, 'index'])->name('setting.index');
  Route::patch('/like-setting/{user:id}', [Controllers\SettingController::class, 'toggleLike'])->name('like-setting');
  Route::patch('/follow-setting/{user:id}', [Controllers\SettingController::class, 'toggleFollow'])->name('follow-setting');
  Route::patch('/comment-setting/{user:id}', [Controllers\SettingController::class, 'toggleComment'])->name('comment-setting');

  Route::post('/follow/{user}', [Controllers\FollowController::class, 'store'])->name('follow');
  
  Route::post('/filepondUpload', [Controllers\FileController::class, 'filepondUpload']);
  Route::post('/dropzone', [Controllers\FileController::class, 'dropzoneUpload']);
  Route::post('/file/{file}', [Controllers\FileController::class, 'delete'])->name('file.delete');

  Route::get('/create-reply/{comment}', [Controllers\CommentController::class, 'createReply'])->name('reply.create');
  Route::post('/reply', [Controllers\CommentController::class, 'storeReply'])->name('reply.store');
  Route::post('/comment', [Controllers\CommentController::class, 'store'])->name('comment.store');
  Route::get('/comment/{comment}/edit', [Controllers\CommentController::class, 'edit'])->name('comment.edit');
  Route::patch('/comment/{comment}', [Controllers\CommentController::class, 'update'])->name('comment.update');
  
  Route::post('/like', [Controllers\LikeController::class, 'like']);
  Route::post('/delete-like', [Controllers\LikeController::class, 'deleteLike']);

  Route::post('/up-vote', [Controllers\VoteController::class, 'upVote']);
  Route::post('/down-vote', [Controllers\VoteController::class, 'downVote']);
  Route::delete('/delete-up-vote', [Controllers\VoteController::class, 'deleteVoteUp']);
  Route::delete('/delete-down-vote', [Controllers\VoteController::class, 'deleteVoteDown']);



});






















require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

