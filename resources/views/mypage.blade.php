@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('posts.create') }}">追加</a>
    <br><br>

    <h2>全てのデータ</h2>
    @foreach ($posts as $post)
    <ul>
        <li><a href="{{ route('posts.show',['id' => $post->id]) }}">{{ $post->title }}</a></li>
        <li>{{ $post->describe }}</li>
        <li>{{ $post->explain }}</li>
        <li>{{ $post->specify }}</li>
    </ul>
    @endforeach

</div>
@endsection
