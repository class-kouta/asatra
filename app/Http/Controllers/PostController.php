<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Nice;
use App\Models\Category;
use App\Http\Requests\StorePost;

class PostController extends Controller
{
    public function create()
    {
        $category = new Category;
        $categories = $category->getLists();

        return view('posts.create',compact('categories'));
    }

    public function createConfirm(StorePost $request)
    {
        $inputs = $request->all();

        return view('posts.create_confirm',compact('inputs'));
    }

    public function store(Request $request)
    {
        $post = new Post;

        $post->user_id = Auth::id();
        $post->category_id = $request->input('categoryId');
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

        return view('posts.show',compact('post','nice'));
    }

    public function showGuest(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function showMyPosts()
    {
        $id = Auth::id();
        $posts = Post::where('user_id',$id)->get();

        return view('profile.myposts',compact('posts'));
    }

    public function showMyNicePosts()
    {
        $user = Auth::user();
        $posts = $user->joinNicesPosts;
        return view('profile.myniceposts',compact('posts'));
    }

    public function showMyCommentPosts()
    {
        $user = Auth::user();
        $posts = $user->joinCommentsPosts;

        function myArrayUnique($array) {
            $uniqueArray = [];
            foreach($array as $key => $value) {
                if (!in_array($value, $uniqueArray)) {
                    $uniqueArray[$key] = $value;
                }
            }
            return $uniqueArray;
        }
        $posts = myArrayUnique($posts);

        return view('profile.myniceposts',compact('posts'));
    }

    public function edit(Post $post)
    {
        $this->authorize('edit', $post);

        $category = new Category;
        $categories = $category->getLists();

        return view('posts.edit', compact('post','categories'));
    }

    public function editConfirm(StorePost $request, Post $post)
    {
        $inputs = $request->all();

        return view('posts.edit_confirm', compact('inputs','post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->user_id = Auth::id();
        $post->category_id = $request->input('categoryId');
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
