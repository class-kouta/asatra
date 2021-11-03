@extends('layouts.app2')

@section('content')
<div class="container">
    <form action="{{ route('posts.update',$post) }}" method="post">
        @csrf
        タイトル：例〜<br>
        {{ $inputs['title'] }}<br><br>
        <input name="title" value="{{ $inputs['title'] }}" type="hidden">

        D 葛藤や問題：例〜<br>
        {{ $inputs['describe'] }}<br><br>
        <input name="describe" value="{{ $inputs['describe'] }}" type="hidden">

        E 主観的な気持ち：例〜<br>
        {{ $inputs['explain'] }}<br><br>
        <input name="explain" value="{{ $inputs['explain'] }}" type="hidden">

        S 具体的な提案：例〜<br>
        {{ $inputs['specify'] }}<br><br>
        <input name="specify" value="{{ $inputs['specify'] }}" type="hidden">

        C 選択（イエスの場合）：例〜<br>
        {{ $inputs['choose_yes'] }}<br><br>
        <input name="choose_yes" value="{{ $inputs['choose_yes'] }}" type="hidden">

        C 選択（ノーの場合）：例〜<br>
        {{ $inputs['choose_no'] }}<br><br>
        <input name="choose_no" value="{{ $inputs['choose_no'] }}" type="hidden">

        カテゴリー：<br>
        {{-- {{$inputs['categoryId']}}<br><br> --}}
        @if($inputs['categoryId'] == 1)
        結婚
        <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
        @elseif($inputs['categoryId'] == 2)
        育児・家事
        <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
        @elseif($inputs['categoryId'] == 3)
        お金
        <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
        @elseif($inputs['categoryId'] == 4)
        人間関係
        <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
        @elseif($inputs['categoryId'] == 5)
        性生活
        <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
        @elseif($inputs['categoryId'] == 6)
        コミュニケーション
        <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
        @elseif($inputs['categoryId'] == 7)
        習慣
        <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
        @elseif($inputs['categoryId'] == 8)
        仕事
        <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
        @elseif($inputs['categoryId'] == 9)
        健康
        <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
        @elseif($inputs['categoryId'] == 10)
        モラハラ
        <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
        @elseif($inputs['categoryId'] == 11)
        その他
        <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
        @else
        未設定
        <input name="categoryId" value="" type="hidden">
        @endif
        <br><br>

        その他メモ<br>
        {{ $inputs['note'] }}<br><br>
        <input name="note" value="{{ $inputs['note'] }}" type="hidden">

        <button type="submit" class="btn btn-primary">更新</button>

    </form>
</div>
@endsection
