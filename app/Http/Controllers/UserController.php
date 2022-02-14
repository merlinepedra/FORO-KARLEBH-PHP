<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

  public function __invoke()
  {
    return view('users')
                ->withUsers(\App\Models\User::with('profile')
                  ->where('id', '!=', auth()->id())
                  ->latest()
                  ->paginate()
                );
  }
}
