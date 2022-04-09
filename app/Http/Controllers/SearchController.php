<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
  public function __invoke()
  {
      //validate requests

    $data = request()->validate([
      'item' => 'max:20|min:1|string',
    ]);
      // $results = Post::where('title', 'LIKE' , '%'.  $data['item'] .'%')
      // ->orWhere('desc', 'LIKE' , '%'.  $data['item'] .'%')->get();

    $results = Post::search($data['item'])->get();


    return [request()->item, $results];
  }
}
