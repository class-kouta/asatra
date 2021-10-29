@extends('layouts.app2')

@section('content')
<div class="container">
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
                <img src="/storage/user_img/{{ $post->user->sex }}.jpeg">

                @if($post->user->deleted_at === null)
                <h5>{{ $post->user->name }}</h5>
                @else
                <h5>{{ $post->user->name }}（退会したユーザー）</h5>
                @endif
                <ul>
                    @guest
                    <li><a href="{{ route('posts.show_guest',$post) }}">{{ $post->title }}</a></li>
                    @else
                    <li><a href="{{ route('posts.show',$post) }}">{{ $post->title }}</a></li>
                    @endguest
                    <li>{{ $post->describe }}</li>
                    <li>{{ $post->explain }}</li>
                    <li>{{ $post->specify }}</li>
                </ul>
                <div>
                    いいね：{{ $post->nices->count() }}
                </div>
                <div>
                    コメント：{{ $post->comments->count() }}
                </div>
            </div>
        </div>
    @endforeach

    {{ $posts->links() }}

</div>
@endsection
