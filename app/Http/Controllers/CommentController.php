<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()
            ->route('posts.show', $post);
    }

    public function destroy(Post $post,$comment_id)
    {
        $comment = Comment::find($comment_id);
        $comment->delete();

        return redirect()
            ->route('posts.show', $post);
    }

}
