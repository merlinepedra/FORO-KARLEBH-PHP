<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\FollowNotification;

class FollowController extends Controller
{
    public function store(User $user)
    {
      $user->notify(new FollowNotification(auth()->user()));
      return auth()->user()->following()->toggle($user->profile);
    }
}
