<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Str;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
  public function index()
  {
    return view('post.index')->withPosts(Post::latest()->withCount('comments')->with('user')->get());
  }   

  public function create()
  {
    return view('post.create')
    ->withCategories(\App\Models\Category::all());
  }

  public function store(StorePostRequest $request)
  {
    $slug = trim(Str::limit(Str::slug($request->title), 50, ''), '-');

    $post = $request->user()->posts()->create([
      'title' => $request->title,
      'desc' => $request->desc,
      'category_id' => $request->category_id,
      'slug' => $slug,
    ]);

    (new \App\Http\Helpers\File)->upload($request, $post);

    return redirect()->route('post.show', $post)
    ->withPost($post);
  }

  public function show(Post $post)
  {
    $comments = Comment::with('user')->wherePostId($post->id)->whereNull('parent_id')->latest()->paginate();

    return view('post.show', $post)
    ->withPost($post)
    ->withComments($comments);
  }

  public function edit(Post $post)
  {
    $this->authorize('update', $post);

    $files = \App\Models\File::whereFileableId($post->id)->whereFileableType($post::class)->get();
    return view('post.edit')->withPost($post)->withFiles($files)->withCategories(\App\Models\Category::all());
  }

  public function update(UpdatePostRequest $request, Post $post)
  {
   $this->authorize('update', $post);

 }

 public function destroy(Post $post)
 {
   $this->authorize('update', $post);
 }

}
