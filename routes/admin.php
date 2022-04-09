<?php  

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin;


Route::name('admin.')->prefix('admin')->middleware('admin')->group( function () {
  Route::get('/home', [Admin\AdminController::class, 'overview'])->name('home');
  Route::get('/make-admin', [Admin\AdminController::class, 'create'])->name('makeAdmin.create');
  Route::patch('/make-admin/{user}', [Admin\AdminController::class, 'makeAdmin'])->name('makeAdmin');
  Route::patch('/make-user/{user}', [Admin\AdminController::class, 'makeuser'])->name('makeUser');

  Route::patch('/block/{user}', [Admin\AdminController::class, 'blockUser'])->name('blockUser');
  Route::patch('/unblock/{user}', [Admin\AdminController::class, 'unblockUser'])->name('unblockUser');

  Route::get('/posts', [Admin\PostController::class, 'posts'])->name('posts');

  Route::get('/comments', [\App\Http\Controllers\CommentController::class, 'commentsAdmin'])->name('comments');
  Route::view('/categories', 'admin.category')->name('categories');

  Route::patch('/make-latest/{post}', [Admin\PostController::class, 'makeLatest']);
  Route::patch('/change-category/{post}', [Admin\PostController::class, 'changeCategory']);
  Route::patch('/change-title/{post}', [Admin\PostController::class, 'changeTitle']);


});