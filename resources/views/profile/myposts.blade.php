@extends('layouts.app2')

@section('content')
<div class="container">

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
