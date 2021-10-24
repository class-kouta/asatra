<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TopController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        // dd($posts);
        $data = ['posts' => $posts];
        return view('top',$data);
    }
}
