@extends('layouts.app')

@section('content')
<div class="container">
    <h1>DESC法</h1>
<form action="{{ route('posts.create_confirm') }}" method="post">
        @csrf
        タイトル：例〜<br>
        <input type="text" name="title" ><br><br>
        D 葛藤や問題：例〜<br>
        <textarea name="describe" cols="30" rows="3"></textarea><br><br>
        E 主観的な気持ち：例〜<br>
        <textarea name="explain" cols="30" rows="3"></textarea><br><br>
        S 具体的な提案：例〜<br>
        <textarea name="specify" cols="30" rows="3"></textarea><br><br>
        C 選択（イエスの場合）：例〜<br>
        <textarea name="choose_yes" cols="30" rows="2"></textarea><br><br>
        C 選択（ノーの場合）：例〜<br>
        <textarea name="choose_no" cols="30" rows="2"></textarea><br><br>
        その他メモ<br>
        <textarea name="note" cols="30" rows="3"></textarea><br><br>
        <button type="submit" class="btn btn-primary">入力内容確認</button>

    </form>
</div>
@endsection
