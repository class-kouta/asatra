@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('profile.edit') }}">プロフィール編集</a>
    <br><br>

    <a href="{{ route('posts.create') }}">追加</a>
    <br><br>

    <a href="{{ route('posts.myposts') }}">自分の投稿を見る</a>
    <br><br>

    <a href="{{ route('delete_confirm') }}">退会する</a>
    <br><br>

    <h2>みんなの投稿</h2>
    @foreach ($posts as $post)
        @if($post->user->sex === (string)1)
            <div class="card border border-primary">
        @elseif($post->user->sex === (string)2)
            <div class="card border border-danger">
        @else
            <div class="card border border-light">
        @endif
                <div class="card-body">

                @if(file_exists(public_path().'/storage/user_img/'.$post->user_id.'.jpg'))
                    <img src="/storage/user_img/{{ $post->user_id }}.jpg"><br>
                @elseif(file_exists(public_path().'/storage/user_img/'.$post->user_id.'.jpeg'))
                    <img src="/storage/user_img/{{ $post->user_id }}.jpeg">
                @elseif(file_exists(public_path().'/storage/user_img/'.$post->user_id.'.png'))
                    <img src="/storage/user_img/{{ $post->user_id }}.png">
                @elseif(file_exists(public_path().'/storage/user_img/'.$post->user_id.'.gif'))
                    <img src="/storage/user_img/{{ $post->user_id }}.gif">
                @else
                    <img src="/storage/user_img/NoImage.png">
                @endif

                    <h5>{{ $post->user->name }}</h5>
                    <ul>
                        <li><a href="{{ route('posts.show',$post) }}">{{ $post->title }}</a></li>
                        <li>{{ $post->describe }}</li>
                        <li>{{ $post->explain }}</li>
                        <li>{{ $post->specify }}</li>
                    </ul>
                </div>
            </div>
    @endforeach

</div>
@endsection
