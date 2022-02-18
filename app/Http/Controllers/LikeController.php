<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Http\Requests\StorelikesRequest;
use App\Http\Requests\UpdatelikesRequest;
use App\Notifications\LikeNotification;

class LikeController extends Controller
{
  public function likeData()
  {
    $like = Like::whereUserId(auth()->id())->whereLikeableId(request()->likeable_id)->whereLikeableType(request()->likeable_type)->exists();
    $count = Like::whereLikeableId(request()->likeable_id)->whereLikeableType(request()->likeable_type)->count();
    
    $liked = $like ? 'liked' : 'notLiked';
    return [$liked, $count];
  }

  public function like()
  {
    if (
      ! $this->check()
    ) {
      auth()
      ->user()
      ->likes()
      ->create([
        'likeable_id' => request()->likeable_id,
        'likeable_type' => request()->likeable_type,
        'like' => 'like'
      ]);
    }

    $user = \App\Models\User::findOrFail(request()->user_id);
    
    // if ($user->id !== auth()->id()) {
    $user->notify(new LikeNotification(
      request()->likeable_id, 
      request()->likeable_type,
    ));
    // }
  }

  public function deleteLike()
  {
    if (
      $this->check()
    ) {
      auth()
      ->user()
      ->likes()
      ->whereLikeableId(request()->likeable_id)
      ->whereLikeableType(request()->likeable_type)
      ->whereLike('like')
      ->delete();
    }
  }

  public function unlike()
  {
   auth()
   ->user()
   ->likes()
   ->create([
    'likeable_id' => request()->likeable_id,
    'likeable_type' => request()->likeable_type,
    'like' => 'unlike'
  ]);
 }

 public function deleteUnlike()
 {
  auth()
      ->user()
      ->likes()
      ->whereLikeableId(request()->likeable_id)
      ->whereLikeableType(request()->likeable_type)
      ->whereLike('unlike')
      ->delete();
 }

 private function check()
 {
  return Like::whereUserId(auth()->id())->whereLikeableId(request()->likeable_id)->whereLikeableType(request()->likeable_type)->exists();

}

}
