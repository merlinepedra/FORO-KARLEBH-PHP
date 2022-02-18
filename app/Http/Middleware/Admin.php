<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
      if (!$request->user() || ($request->user() && !$request->user()->is_admin)) {
        return redirect()->route('post.index');
      }

        return $next($request);
  
    }
}
