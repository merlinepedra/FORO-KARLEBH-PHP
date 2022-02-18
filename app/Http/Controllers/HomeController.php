<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function notifications()
    {
      auth()->user()->unreadNotifications->markAsRead();

      return view('notifications')->withNotifications(auth()->user()->notifications());
    }

    public function notificationsCount()
    {
      return auth()->user()->unreadNotifications->count();
    }
}
