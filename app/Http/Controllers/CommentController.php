<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\StoreComment;

class CommentController extends Controller
{
    public function store(Post $post, StoreComment $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->comment = $request->comment;
        $comment->save();

        $post->comment_notice = 1;
        $post->save();

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
