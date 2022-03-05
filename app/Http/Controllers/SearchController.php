<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function __invoke()
    {
      //validate requests
      
      return Post::search(request()->item)->get();
    }
}
