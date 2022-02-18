<?php  

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin;


Route::name('admin.')->prefix('admin')->middleware('admin')->group( function () {
  Route::get('/home', [Admin\HomeController::class, 'home'])->name('home');
  Route::get('/settings', [Admin\HomeController::class, 'settings'])->name('settings');
  Route::get('/make-admin', [Admin\AdminController::class, 'create'])->name('makeAdmin.create');
  Route::post('/make-admin/{user}', [Admin\AdminController::class, 'makeAdmin'])->name('makeAdmin');
  Route::post('/make-user/{user}', [Admin\AdminController::class, 'makeuser'])->name('makeUser');

  Route::get('/posts', [Admin\PostController::class, 'posts'])->name('posts');
  Route::view('/comments', 'admin.comment', ['comments' => \App\Models\Comment::paginate()])->name('comments');
  Route::view('/categories', 'admin.category', ['categories' => \App\Models\Category::paginate()])->name('categories');

  Route::patch('/make-latest/{post}', [Admin\PostController::class, 'makeLatest']);
  Route::patch('/change-category/{post}', [Admin\PostController::class, 'changeCategory']);
  Route::patch('/change-title/{post}', [Admin\PostController::class, 'changeTitle']);


});
