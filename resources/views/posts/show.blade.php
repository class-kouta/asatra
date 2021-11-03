@extends('layouts.app2')

@section('content')
<div class="container">

    {{-- post編集 --}}
    @can('edit',$post)
        <a href="{{ route('posts.edit',$post) }}">編集</a>
    @endcan

    {{-- post削除 --}}
    @can('delete',$post)
        <form method="post" action="{{ route('posts.destroy',$post) }}" id="delete_{{ $post->id }}">
            @csrf
            <a href="#" class="btn btn-danger" data-id="{{ $post->id }}" onclick="deletePost(this);">削除する</a>
        </form>
    @endcan

    {{-- post詳細 --}}
    <ul>
        <li>{{ $post->category->category_name }}</li>
        <li><h4>{{ $post->title }}<h4></li>
        <li>{{ $post->describe }}</li>
        <li>{{ $post->explain }}</li>
        <li>{{ $post->specify }}</li>
        <li>{{ $post->choose_yes }}</li>
        <li>{{ $post->choose_no }}</li>
        <li>{{ $post->note }}</li>
    </ul>

<span>

@guest
    <span>
        いいね：{{ $post->nices->count() }}
    </span>
@else
    @if($nice)
    <a href="{{ route('unnice', $post) }}" class="btn btn-success btn-sm">
        いいね
        <span class="badge">
            {{ $post->nices->count() }}
        </span>
    </a>
    @else
    <a href="{{ route('nice', $post) }}" class="btn btn-secondary btn-sm">
        いいね
        <span class="badge">
            {{ $post->nices->count() }}
        </span>
    </a>
    @endif

@endguest
</span>

    {{-- コメント一覧 --}}
    <h4>Comments</h4>
    <ul>
        @foreach ($post->comments as $comment)
            <li>{{ $comment->comment }}</li>
            @if( $post->user_id === Auth::id() || $comment->user_id === Auth::id() )
            {{-- コメント削除 --}}
            <form method="post" action="{{ route('comments.destroy',['comment' => $comment, 'post' => $post] ) }}">
                @csrf
                <button>削除</button>
            </form>
            @endif
        @endforeach
    </ul>

    {{-- コメント追加 --}}
    @auth
    <form method="post" action="{{ route('comments.store' ,$post) }}">
        @csrf
        <textarea name="comment" cols="30" rows="3">{{ old('comment') }}</textarea><br>
        @error('comment')
            <div class="error">{{ $message }}</div>
        @enderror
        <br>
        <button>Add</button>
    </form>
    @endAuth

</div>

<script>

    /************************************
    削除ボタンを押してすぐにレコードが削除
    されるのも問題なので、一旦javascriptで
    確認メッセージを流します。
    *************************************/

    function deletePost(e) {
        'use strict';
        if (confirm('本当に削除していいですか?')) {
        document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>

@endsection
