<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
  public function index()
  {
    return view('settings');
  }

  public function toggleLike(User $user)
  {
    abort_if($user->id !== auth()->id(), 403, 'You are not allowed!!');

    if (! $user->setting->like_notifiable) {
      $user->setting->update(['like_notifiable' => 1]);

      // event(new NotifiableEvent());
      return "Updated Successfully";
    } else {
      $user->setting->update(['like_notifiable' => 0]);
      return "Updated Successfully";
    }

  }

  public function toggleFollow(User $user)
  {
    abort_if($user->id !== auth()->id(), 403, 'You are not allowed!!');

    if (! $user->setting->follow_notifiable) {
      $user->setting->update(['follow_notifiable' => 1]);
      return "Updated Successfully";

      // event(new NotifiableEvent());
    } else {
      $user->setting->update(['follow_notifiable' => 0]);
      return "Updated Successfully";
    }
  }

  public function toggleComment(User $user)
  {
    abort_if($user->id !== auth()->id(), 403, 'You are not allowed!!');

     if (! $user->setting->comment_notifiable) {
      $user->setting->update(['comment_notifiable' => 1]);
      
      // event(new NotifiableEvent());
      return "Updated Successfully";
    } else {
      $user->setting->update(['comment_notifiable' => 0]);
      return "Updated Successfully";
    }
  }

}
