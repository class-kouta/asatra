@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8" id="content">
            @if(!isset($nice_posts[0]) && !isset($comment_posts[0]))
                <div>通知はございません。</div>
            @else
                @foreach($nice_posts as $post)
                    <div><a href="{{ route('posts.show', $post) }}">{{ $post->title }}に新しいいいねがあります。</a></div>
                @endforeach
                @foreach($comment_posts as $post)
                    <div><a href="{{ route('posts.show', $post) }}">{{ $post->title }}に新しいコメントがあります。</a></div>
                @endforeach
            @endif
        </div>
        @component('components.profilebar')
        @endcomponent

    </div>
</div>
@endsection
