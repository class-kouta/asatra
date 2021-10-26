<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Nice;
use App\Http\Requests\StorePost;

class PostController extends Controller
{
    public function create()
    {
        return view('posts/create');
    }

    public function createConfirm(StorePost $request)
    {
        $inputs = $request->all();

        return view('posts/create_confirm', ['inputs' => $inputs,]);
    }

    public function store(Request $request)
    {
        $post = new Post;

        $post->user_id = Auth::id();
        $post->title = $request->input('title');
        $post->describe = $request->input('describe');
        $post->explain = $request->input('explain');
        $post->specify = $request->input('specify');
        $post->choose_yes = $request->input('choose_yes');
        $post->choose_no = $request->input('choose_no');
        $post->note = $request->input('note');

        $post->save();

        return $this->showMyPosts();
    }

    public function show(Post $post)
    {
        $nice = Nice::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
        return view('posts.show', ['post' => $post , 'nice' => $nice]);
    }

    public function showGuest(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function showMyPosts()
    {
        $id = Auth::id();
        $posts = Post::where('user_id',$id)->get();
        return view('profile.myposts',['posts' => $posts]);
    }

    public function edit(Post $post)
    {
        $this->authorize('edit', $post);

        return view('posts.edit', ['post' => $post]);
    }

    public function editConfirm(StorePost $request, Post $post)
    {
        $inputs = $request->all();

        return view('posts/edit_confirm', ['inputs' => $inputs,'post' => $post,]);
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->user_id = Auth::id();
        $post->title = $request->input('title');
        $post->describe = $request->input('describe');
        $post->explain = $request->input('explain');
        $post->specify = $request->input('specify');
        $post->choose_yes = $request->input('choose_yes');
        $post->choose_no = $request->input('choose_no');
        $post->note = $request->input('note');

        $post->save();

        return $this->showMyPosts();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return $this->showMyPosts();
    }

}
