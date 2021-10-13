<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class MypageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        $data = ['posts' => $posts];
        return view('mypage',$data);
    }

    public function showAll()
    {
        $id = Auth::id();
        $posts = Post::where('user_id',$id)->get();
        $data = ['posts' => $posts];
        return view('myposts',$data);
    }
}
