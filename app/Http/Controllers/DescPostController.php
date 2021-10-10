<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DescPost;

class DescPostController extends Controller
{
    public function index()
    {
        return view('desc/desc_add');
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
        return view('desc/desc_add_check', [
            'inputs' => $inputs,
        ]);
    }

    public function store(Request $request)
    {
        $desc_post = new DescPost;

        $desc_post->user_id = Auth::id();
        $desc_post->title = $request->input('title');
        $desc_post->describe = $request->input('describe');
        $desc_post->explain = $request->input('explain');
        $desc_post->specify = $request->input('specify');
        $desc_post->choose_yes = $request->input('choose_yes');
        $desc_post->choose_no = $request->input('choose_no');
        $desc_post->note = $request->input('note');

        $desc_post->save();

        return redirect('mypage');
    }
}
