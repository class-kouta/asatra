@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($posts as $post)
    <ul>
        <li><a href="{{ route('posts.show',['id' => $post->id, 'post' => $post]) }}">{{ $post->title }}</a></li>
        <li>{{ $post->describe }}</li>
        <li>{{ $post->explain }}</li>
        <li>{{ $post->specify }}</li>
    </ul>
    @endforeach

</div>
@endsection
