<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class AdminController extends Controller
{
  public function create(Request $request)
  {
    $profiles = Profile::where('id', '!=', $request->user()->id)->paginate();

    return view('admin.users')
    ->withProfiles($profiles);
  }

  public function makeAdmin(User $user)
  {
    $user->is_admin = 1;
    $user->save();

    return 'success';
  }

  public function makeUser(User $user)
  {
    $user->is_admin = 0;
    $user->save();

    return 'success';
  }

  public function blockUser(User $user)
  {

    if ($user->is_admin) {
      return "cannot block an admin";
    }

    $user->is_blocked = 1;
    $user->save();

    return 'sucess';
  }

  public function unblockUser(User $user)
  {
    if ($user->is_admin) {
      return "cannot unblock an admin";
    }

    $user->is_blocked = 0;
    $user->save();

    return 'sucess';
  }
}
