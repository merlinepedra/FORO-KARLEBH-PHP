<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
  use HandlesAuthorization;

  public function store(User $user)
  {
    return false;
  }

  public function update(User $user, Comment $comment)
  {
    return $user->id === $comment->user_id || $user->is_admin;
  }

  public function reply(User $user, Comment $comment)
  {
    return true;
  }
}
