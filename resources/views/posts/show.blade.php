@extends('layouts.app')

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
        <li><h4>{{ $post->title }}<h4></li>
        <li>{{ $post->describe }}</li>
        <li>{{ $post->explain }}</li>
        <li>{{ $post->specify }}</li>
        <li>{{ $post->choose_yes }}</li>
        <li>{{ $post->choose_no }}</li>
        <li>{{ $post->note }}</li>
    </ul>

<span>

{{-- いいね --}}
<!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
@if($nice)
<!-- 「いいね」取消用ボタンを表示 -->
    <a href="{{ route('unnice', $post) }}" class="btn btn-success btn-sm">
        いいね
        <!-- 「いいね」の数を表示 -->
        <span class="badge">
            {{ $post->nices->count() }}
        </span>
    </a>
@else
<!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
    <a href="{{ route('nice', $post) }}" class="btn btn-secondary btn-sm">
        いいね
        <!-- 「いいね」の数を表示 -->
        <span class="badge">
            {{ $post->nices->count() }}
        </span>
    </a>
@endif
</span>

    {{-- コメント一覧 --}}
    <h4>Comments</h4>
    <ul>
        @foreach ($post->comments as $comment)
            <li>{{ $comment->comment }}</li>

            {{-- コメント削除 --}}
            <form method="post" action="{{ route('comments.destroy',['comment' => $comment, 'post' => $post] ) }}">
                @csrf
                <button>削除</button>
            </form>
        @endforeach
    </ul>

    {{-- コメント追加 --}}
    <form method="post" action="{{ route('comments.store' ,$post) }}">
        @csrf
        <input type="text" name="comment">
        <button>Add</button>
    </form>

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
