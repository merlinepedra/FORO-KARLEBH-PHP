<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function __invoke()
    {
      //validate requests
      
      // return Post::whereTitle('like', '%' . request()->item . '%')->get();
      return Post::where('title', 'like', '%' . request()->item . '%')->get();
    }
}
