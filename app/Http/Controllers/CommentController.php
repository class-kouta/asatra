<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Notification;
use App\Http\Requests\StoreComment;
use App\Enums\PostReadType;

class CommentController extends Controller
{
    public function store(Post $post, StoreComment $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->comment = $request->comment;
        $comment->save();

        $notification = new Notification();
        $notification->user_id = $post->user_id;
        $notification->target_user_id = Auth::id();
        $notification->post_id = $post->id;
        $notification->text = '新しいコメントが付きました';
        $notification->read = PostReadType::UNREAD;
        $comment->notification()->save($notification);

        return redirect()
            ->route('posts.show', $post);
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return redirect()
            ->route('posts.show', $post);
    }

}
