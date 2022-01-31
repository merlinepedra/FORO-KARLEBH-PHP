<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/welcome', 'welcome');

// Route::resource('post', [\App\Http\Controllers\PostController::class]);


























require __DIR__.'/auth.php';
