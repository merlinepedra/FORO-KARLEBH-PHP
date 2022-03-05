<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\File;
use App\Models\Like;


class AdminController extends Controller
{
  public function overview()
  {

    $users = User::count();
    $posts = Post::count();
    $categories = Category::count();
    $comments = Comment::count();
    $files = File::count();
    $likes = Like::count();
    $admins = User::whereIsAdmin(1)->count();

    return view('admin.overview')
    ->withUsers($users)
    ->withPosts($posts)
    ->withCategories($categories)
    ->withComments($comments)
    ->withFiles($files)
    ->withLikes($likes)
    ->withAdmins($admins);
  }

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
