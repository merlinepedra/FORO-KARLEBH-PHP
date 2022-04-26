<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\File;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function store(StoreCommentRequest $request)
  {
    $this->authorize('store');

    $comment = $request->user()->comments()->create([
      'comment' => $request->comment,
      'post_id' => $request->post_id,
    ]);

    (new \App\Http\Helpers\File)->upload($request, $comment);

    $url = '/post/' . $comment->post->slug . '#comment-' . $comment->id;

    if (
      // $comment->post->user->id !== auth()->user() &&
     $comment->user->setting->comment_notifiable
   ) {
      $comment->post->user->notify(new \App\Notifications\CommentCreated(auth()->user(), $comment->post, $url));
    }

    return redirect($url);
  }

  public function createReply(Comment $comment)
  {
    // $this->authorize('store');
    return view('comment.reply')->withComment($comment->load('post'));
  }

  public function storeReply(Request $request)
  {
    // $this->authorize('store');

    $data = $request->validate([
      'comment' => 'required|max:5000',
      'parent_id' => 'required|int',
      'post_id' => 'required|int',
    ]);

    $comment = $request->user()->comments()->create($data);

    (new \App\Http\Helpers\File)->upload($request, $comment);

    if (
      // $comment->post->user->id !== auth()->user() &&
     $comment->user->setting->comment_notifiable
   ) {
      $url = '/post/' . $comment->post->slug . '#comment-' . $comment->id;

      $comment->post->user->notify(new \App\Notifications\CommentCreated(auth()->user(), $comment->post, $url));
    }

    return redirect('/post/' . $comment->post->slug . '#comment-' . $comment->id);
  }

  public function edit(Comment $comment)
  {
    $this->authorize('update', $comment);

    $files = File::whereFileableId($comment->id)->whereFileableType($comment::class)->get();
    return view('comment.edit')
    ->withComment($comment)
    ->withFiles($files);
  }

  public function update(UpdateCommentRequest $request, Comment $comment)
  {
    $this->authorize('update', $comment);

    $comment->update(['comment' => $request->comment]);

    (new \App\Http\Helpers\File)->upload($request, $comment);

    return redirect('/post/' . $comment->post->slug . '#comment-' . $comment->id);
  }

  public function myComments()
  {
    return view('comment.my-comments')
    ->withComments(Comment::withCount('likes')->with('post')->whereUserId(auth()->id())->paginate());
  }

  public function destroy(Comment $comment)
  {
    $this->authorize('update', $comment);
    $comment->delete();
  }

  public function commentsAdmin() {
    return view('admin.comment')->withComments(\App\Models\Comment::paginate());
  }
}
