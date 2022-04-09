<?php

namespace App\Http\Controllers;

use App\Models\Post;

class UserController extends Controller
{

  public function index()
  {
    return view('users')
    ->withUsers(\App\Models\User::with('profile')
      ->where('id', '!=', auth()->id())
      ->latest()
      ->paginate()
    );
  }

  public function posts()
  {
    return view('post.user-posts')
    ->withPosts(Post::withCount('comments')->whereUserId(auth()->id())->paginate());
  }


}
