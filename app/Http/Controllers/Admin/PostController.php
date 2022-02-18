<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function makeLatest(Post $post) {
      $post->update(['sort_at' => now()]);
    }

    public function posts()
    {
      $posts = \App\Models\Post::orderBy('sort_at', 'desc')->withCount('comments')->paginate();
      return view('admin.post')->withPosts($posts);
    }

    public function changeCategory(Post $post)
    {
      $post->update(['category_id' => request()->category_id]);
    }

    public function changeTitle(Post $post, Request $request) 
    {
      $data = $request->validate([
        'title' => ['required', 'string', 'min:5', 'unique:posts,title', 'max:255']
      ]);

      $slug = trim(Str::limit(Str::slug($data['title']), 50, ''), '-');

      $post->update([
        'title' => $data['title'],
        'slug' => $slug
      ]);

      return $post;
    }
}














