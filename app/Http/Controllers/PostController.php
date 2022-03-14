<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Nice;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Notification;
use App\Http\Requests\StorePost;
use App\Enums\PostStatusType;
use App\Enums\PostListType;

class PostController extends Controller
{
    public function create()
    {
        $categories = Category::pluck('category_name', 'id');
        $page = 'create';

        return view('posts.create',compact('categories','page'));
    }

    public function createConfirm(StorePost $request)
    {
        $category = Category::find($request->category_id);
        $inputs = $request->all();
        $page = 'create';

        return view('posts.create_confirm', compact('category', 'inputs', 'page'));
    }

    public function store(StorePost $request, Post $post)
    {
        $post->user_id = Auth::id();
        $post->fill($request->all())->save();

        $request->session()->regenerateToken();
        return redirect()->route('profile.myposts',PostListType::MY_POST);
    }

    public function show(Post $post)
    {
        if($post->user_id === Auth::id()){
            $notifications = Notification::where('notificationable_id', $post->id)
                ->update(['read' => true]);
        }
        $nice = Nice::where('post_id', $post->id)->where('user_id', Auth::id())->first();

        return view('posts.show',compact('post','nice'));
    }

    public function showGuest(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function showMyPosts(int $page)
    {
        if ($page === PostListType::MY_POST) {
            $page_title = '自分の投稿';
            $posts = Post::where('user_id', Auth::id())
                ->where('status', '<>', PostStatusType::DRAFT)
                ->latest()->get();
        } elseif ($page === PostListType::MY_NICE) {
            $page_title = 'いいねした投稿';
            $posts = Post::whereIn('id', Nice::select('post_id')
                ->where('user_id', Auth::id())
            )
            ->whereNotIn('status', [PostStatusType::SECRET, PostStatusType::DRAFT])
            ->latest()->get();
        } elseif ($page === PostListType::MY_COMMENT) {
            $page_title = 'コメントした投稿';
            $posts = Post::whereIn('id', Comment::select('post_id')
                ->where('user_id', Auth::id())
            )
            ->whereNotIn('status', [PostStatusType::SECRET, PostStatusType::DRAFT])
            ->latest()->get();
        } elseif ($page === PostListType::MY_DRAFT) {
            $page_title = '下書きリスト';
            $posts = Post::where('user_id', Auth::id())
                ->where('status', PostStatusType::DRAFT)
                ->latest()->get();
        }else{
            abort(404);
        }

        return view('profile.myposts',compact('page_title','posts'));
    }

    public function edit(Post $post)
    {
        $this->authorize('edit', $post);
        $categories = Category::pluck('category_name', 'id');
        $page = 'edit';

        return view('posts.edit', compact('post','categories','page'));
    }

    public function editConfirm(StorePost $request, Post $post)
    {
        $category = Category::find($request->category_id);
        $inputs = $request->all();
        $page = 'edit';

        return view('posts.edit_confirm', compact('category', 'inputs', 'post', 'page'));
    }

    public function update(StorePost $request, Post $post)
    {
        $this->authorize('update', $post);
        $post->fill($request->all())->save();

        return redirect()->route('profile.myposts',PostListType::MY_POST);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('profile.myposts',PostListType::MY_POST);
    }

}
