<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like as Vote;

class VoteController extends Controller
{

  public function upVote()
  {
    auth()
    ->user()
    ->likes()
    ->create([
      'likeable_id' => request()->likeable_id,
      'likeable_type' => request()->likeable_type,
      'like' => 'vote-up'
    ]);
  }

  public function deleteUpVote()
  {
    auth()
    ->user()
    ->likes()
    ->whereLikeableId(request()->likeable_id)
    ->whereLikeableType(request()->likeable_type)
    ->whereLike('vote-up')
    ->delete();
  }

  public function downVote()
  {
    auth()
    ->user()
    ->likes()
    ->whereLikeableId(request()->likeable_id)
    ->whereLikeableType(request()->likeable_type)
    ->update(['like' => 'vote-down']);
  }

  public function deleteDownVote()
  {
    auth()
    ->user()
    ->likes()
    ->whereLikeableId(request()->likeable_id)
    ->whereLikeableType(request()->likeable_type)
    ->whereLike('vote-down')
    ->delete();
  }

  private function voted()
  {
    return Vote::whereUserId(auth()->id())
    ->whereLikeableId(request()->likeable_id)
    ->whereLikeableType(request()->likeable_type)
    ->exists();
  }


  public function voteData()
  {
    $upVoted = Vote::whereUserId(auth()->id())
    ->whereLikeableId(request()->likeable_id)
    ->whereLikeableType(request()->likeable_type)
    ->whereLike('vote-up')
    ->exists();

    $downVoted = Vote::whereUserId(auth()->id())
    ->whereLikeableId(request()->likeable_id)
    ->whereLikeableType(request()->likeable_type)
    ->whereLike('vote-down')
    ->exists();

    $downVoteCount = Vote::whereLikeableId(request()->likeable_id)
    ->whereLikeableType(request()->likeable_type)
    ->whereLike('vote-down')
    ->count();

    $upVoteCount = Vote::whereLikeableId(request()->likeable_id)
    ->whereLikeableType(request()->likeable_type)
    ->whereLike('vote-up')
    ->count();

    $data = null;

    if ($upVoted) {
      $data = 'up-voted';
    } else if ($downVoted) {
      $data = 'down-voted';
    } else {
      $data = '';
    }

    return ['data' => $data, 'upVoteCount' => $upVoteCount, 'downVoteCount' => $downVoteCount];
  }
}
