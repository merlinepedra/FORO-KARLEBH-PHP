<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class HomeController extends Controller
{
  public function home()
  {
    return view('admin.home');
  }

  public function settings()
  {
    return view('admin.settings');
  }
}
