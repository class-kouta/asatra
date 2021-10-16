<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        // dd($post);
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()
            ->route('posts.show', $id);
    }

    public function destroy($post_id,$comment_id)
    {
        $comment = Comment::find($comment_id);
        $comment->delete();

        return redirect()
            ->route('posts.show', $post_id);
    }

}
