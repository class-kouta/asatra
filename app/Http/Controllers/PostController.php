<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('posts/create');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'describe' => 'required|string|max:200',
            'explain' => 'required|string|max:200',
            'specify' => 'required|string|max:200',
            'choose_yes' => 'required|string|max:200',
            'choose_no' => 'required|string|max:200',
            'note' => 'nullable|string|max:200',
        ],[
            'title.required' => '入力必須です',
            'title.max' => '50文字以内で入力してください',
            'describe.required' => '入力必須です',
            'describe.max' => '200文字以内で入力してください',
            'explain.required' => '入力必須です',
            'explain.max' => '200文字以内で入力してください',
            'specify.required' => '入力必須です',
            'specify.max' => '200文字以内で入力してください',
            'choose_yes.required' => '入力必須です',
            'choose_yes' => '200文字以内で入力してください',
            'choose_no.required' => '入力必須です',
            'choose_no.max' => '200文字以内で入力してください',
            'note.max' => '200文字以内で入力してください',
        ]);

        $inputs = $request->all();

        return view('posts/create_confirm', [
            'inputs' => $inputs,
        ]);
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

        return redirect('mypage');
    }

    public function show($id)
    {
        $post = Post::find($id);
        $data = ['post' => $post];
        return view('posts.show', $data);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $data = ['post' => $post];
        return view('posts.edit', $data);
    }

    public function edit_confirm(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'describe' => 'required|string|max:200',
            'explain' => 'required|string|max:200',
            'specify' => 'required|string|max:200',
            'choose_yes' => 'required|string|max:200',
            'choose_no' => 'required|string|max:200',
            'note' => 'nullable|string|max:200',
        ],[
            'title.required' => '入力必須です',
            'title.max' => '50文字以内で入力してください',
            'describe.required' => '入力必須です',
            'describe.max' => '200文字以内で入力してください',
            'explain.required' => '入力必須です',
            'explain.max' => '200文字以内で入力してください',
            'specify.required' => '入力必須です',
            'specify.max' => '200文字以内で入力してください',
            'choose_yes.required' => '入力必須です',
            'choose_yes' => '200文字以内で入力してください',
            'choose_no.required' => '入力必須です',
            'choose_no.max' => '200文字以内で入力してください',
            'note.max' => '200文字以内で入力してください',
        ]);

        $inputs = $request->all();

        return view('posts/edit_confirm', [
            'inputs' => $inputs,
            'post_id' => $id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->user_id = Auth::id();
        $post->title = $request->input('title');
        $post->describe = $request->input('describe');
        $post->explain = $request->input('explain');
        $post->specify = $request->input('specify');
        $post->choose_yes = $request->input('choose_yes');
        $post->choose_no = $request->input('choose_no');
        $post->note = $request->input('note');

        $post->save();

        return redirect('/mypage');

    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('mypage');
    }
}
