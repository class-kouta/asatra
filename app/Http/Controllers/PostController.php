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
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        // $request->validate([
        //     'email' => 'required|email',
        //     'title' => 'required',
        //     'body'  => 'required',
        // ]);

        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();

        //入力内容確認ページのviewに変数を渡して表示
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
}
