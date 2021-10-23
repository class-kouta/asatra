@extends('layouts.app2')

@section('content')
<div class="container">
    <h1>DESC法</h1>
<form action="{{ route('posts.create_confirm') }}" method="post">
        @csrf
        タイトル：例〜<br>
        <input type="text" name="title" value="{{ old('title') }}"><br>
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>

        D 葛藤や問題：例〜<br>
        <textarea name="describe" cols="30" rows="3">{{ old('describe') }}</textarea><br>
        @error('describe')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>

        E 主観的な気持ち：例〜<br>
        <textarea name="explain" cols="30" rows="3">{{ old('explain') }}</textarea><br>
        @error('explain')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>

        S 具体的な提案：例〜<br>
        <textarea name="specify" cols="30" rows="3">{{ old('specify') }}</textarea><br>
        @error('specify')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>

        C 選択（イエスの場合）：例〜<br>
        <textarea name="choose_yes" cols="30" rows="2">{{ old('choose_yes') }}</textarea><br>
        @error('choose_yes')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>

        C 選択（ノーの場合）：例〜<br>
        <textarea name="choose_no" cols="30" rows="2">{{ old('choose_no') }}</textarea><br>
        @error('choose_no')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>

        その他メモ<br>
        <textarea name="note" cols="30" rows="3">{{ old('note') }}</textarea><br>
        @error('note')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>

        <button type="submit" class="btn btn-primary">入力内容確認</button>

    </form>
</div>
@endsection
