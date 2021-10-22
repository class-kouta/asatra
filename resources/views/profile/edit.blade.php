@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
    @csrf
        ニックネーム<br>
        <input type="text" name="name" value="{{ Auth::user()->name }}"><br><br>

        メールアドレス<br>
        <input type="email" name="email" value="{{ Auth::user()->email }}"><br><br>

        性別<br>
        <input id="sex-1" type="radio" name="sex" value="1" {{ Auth::user()->sex === '1' ? 'checked' : '' }}>
        <label for="sex-1">男</label>
        <input id="sex-2" type="radio" name="sex" value="2" {{ Auth::user()->sex === '2' ? 'checked' : '' }}>
        <label for="sex-2">女</label>
        <input id="sex-0" type="radio" name="sex" value="9" {{ Auth::user()->sex === '0' ? 'checked' : '' }}>
        <label for="sex-0">回答しない</label>
        <br><br>

        プロフィール画像<br>
        @if(file_exists(public_path().'/storage/user_img/'. Auth::id().'.jpg'))
            <img src="/storage/user_img/{{ Auth::id() }}.jpg"><br>
        @elseif(file_exists(public_path().'/storage/user_img/'. Auth::id().'.jpeg'))
            <img src="/storage/user_img/{{ Auth::id() }}.jpeg">
        @elseif(file_exists(public_path().'/storage/user_img/'. Auth::id().'.png'))
            <img src="/storage/user_img/{{ Auth::id() }}.png">
        @elseif(file_exists(public_path().'/storage/user_img/'. Auth::id().'.gif'))
            <img src="/storage/user_img/{{ Auth::id() }}.gif">
        @else
            <img src="/storage/user_img/NoImage.png">
        @endif

        <br>
        <input type="file" name="user_img">
        <br><br>

        <button type="submit" class="btn btn-primary">更新</button>

    </form>
</div>
@endsection
