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
    public function create(Category $category )
    {
        $categories = $category->getLists();
        $page = 'create';

        return view('posts.create',compact('categories','page'));
    }

    public function createConfirm(StorePost $request)
    {
        $inputs = $request->all();
        $page = 'create';

        return view('posts.create_confirm',compact('inputs','page'));
    }

    public function store(Request $request, Post $post)
    {
        $post->user_id = Auth::id();
        $post->fill($request->all())->save();

        return $this->showMyPosts();
    }

    public function show(Post $post)
    {
        $nice = Nice::where('post_id', $post->id)->where('user_id', Auth::id())->first();

        return view('posts.show',compact('post','nice'));
    }

    public function showGuest(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function showMyPosts()
    {
        $posts = Post::where('user_id', Auth::id())->latest()->get();
        $page_title = '自分の投稿';

        return view('profile.myposts',compact('posts','page_title'));
    }

    public function showMyNicePosts()
    {
        $user = Auth::user();
        $posts = $user->joinNicesPosts()->latest()->get();
        $page_title = 'いいねした投稿';

        return view('profile.myposts',compact('posts','page_title'));
    }

    public function showMyCommentPosts()
    {
        $user = Auth::user();
        $posts = $user->joinCommentsPosts()->latest()->get();

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
        $page_title = 'コメントした投稿';

        return view('profile.myposts',compact('posts','page_title'));
    }

    public function edit(Category $category, Post $post)
    {
        $this->authorize('edit', $post);
        $categories = $category->getLists();
        $page = 'edit';

        return view('posts.edit', compact('post','categories','page'));
    }

    public function editConfirm(StorePost $request, Post $post)
    {
        $inputs = $request->all();
        $page = 'edit';

        return view('posts.edit_confirm', compact('inputs','post','page'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        $post->fill($request->all())->save();

        return $this->showMyPosts();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return $this->showMyPosts();
    }

}
