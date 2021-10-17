@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('posts.create') }}">追加</a>
    <br><br>

    <a href="{{ route('posts.myposts') }}">自分の投稿を見る</a>
    <br><br>

    <h2>みんなの投稿</h2>
    @foreach ($posts as $post)
    <ul>
        <li><a href="{{ route('posts.show',$post) }}">{{ $post->title }}</a></li>
        <li>{{ $post->describe }}</li>
        <li>{{ $post->explain }}</li>
        <li>{{ $post->specify }}</li>
    </ul>
    @endforeach

</div>
@endsection
