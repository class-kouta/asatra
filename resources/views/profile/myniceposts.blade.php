@extends('layouts.app2')

@section('content')
<div class="container">

    {{-- {{ dd($posts) }} --}}
    @if(!isset($posts[0]))
    まだ投稿がありません
    @else
        @foreach ($posts as $post)
        <ul>
            <li><a href="{{ route('posts.show',$post) }}">{{ $post->title }}</a></li>
            <li>{{ $post->describe }}</li>
            <li>{{ $post->explain }}</li>
            <li>{{ $post->specify }}</li>
        </ul>
        @endforeach
    @endif

</div>
@endsection
