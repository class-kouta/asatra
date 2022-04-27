<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Nice;
use App\Models\Notification;

class NiceController extends Controller
{
    public function nice(Post $post){

        logger('test');

        $nice = new Nice();
        $nice->post_id = $post->id;
        $nice->user_id = Auth::id();
        $nice->save();

        $notification = new Notification();
        $notification->user_id = $post->user_id;
        $notification->target_user_id = Auth::id();
        $notification->text = '新しいいいねが付きました';
        $post->notifications()->save($notification);

        // 同期
        // return back();

        // 非同期
        return [
            'id' => $post->id,
            'countNices' => $post->count_nices,
        ];
    }

    public function unnice(Post $post){
        $user_id = Auth::id();
        $nice = Nice::where('post_id', $post->id)->where('user_id', $user_id)->first();
        $nice->delete();

        // 同期
        // return back();

        // 非同期
        return [
            'id' => $post->id,
            'countNices' => $post->count_nices,
        ];
    }
}
