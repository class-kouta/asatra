<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TopController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('top',compact('posts'));
    }
}
