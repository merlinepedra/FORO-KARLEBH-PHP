<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function create() 
    {
        return view('forum.create');
    }
}
