<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Nice;
use App\Models\Notification;

class NiceController extends Controller
{
    public function nice(Post $post){
        $nice = new Nice();
        $nice->post_id = $post->id;
        $nice->user_id = Auth::id();
        $nice->save();

        $notification = new Notification();
        $notification->user_id = $post->user_id;
        $notification->target_user_id = Auth::id();
        $notification->text = '新しいいいねが付きました';
        $post->notifications()->save($notification);

        return back();
    }

    public function unnice(Post $post){
        $user_id = Auth::id();
        $nice = Nice::where('post_id', $post->id)->where('user_id', $user_id)->first();
        $nice->delete();
        return back();
    }
}
