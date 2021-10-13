@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('posts.create') }}">追加</a>
    <br><br>

    <h2>全てのデータ</h2>
    @foreach ($posts as $post)
    <ul>
        <li><h4>{{ $post->title }}</h4></li>
        <li>{{ $post->describe }}</li>
        <li>{{ $post->explain }}</li>
        <li>{{ $post->specify }}</li>
    </ul>
    @endforeach

</div>
@endsection
