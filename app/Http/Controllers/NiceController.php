<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Nice;

class NiceController extends Controller
{
    public function nice(Post $post, Request $request){
        $nice = new Nice();
        $nice->post_id = $post->id;
        $nice->user_id = Auth::user()->id;
        $nice->save();
        return back();
    }

    public function unnice(Post $post, Request $request){
        $user_id = Auth::user()->id;
        $nice = Nice::where('post_id', $post->id)->where('user_id', $user_id)->first();
        $nice->delete();
        return back();
    }
}
