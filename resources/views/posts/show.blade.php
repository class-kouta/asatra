@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('posts.edit',['id' => $post->id]) }}">編集</a>
    <form method="post" action="{{ route('posts.destroy',['id' => $post->id ])}}" id="delete_{{ $post->id }}">
        @csrf
        <a href="#" class="btn btn-danger" data-id="{{ $post->id }}" onclick="deletePost(this);">削除する</a>
    </form>
    <ul>
        <li><h4>{{ $post->title }}<h4></li>
        <li>{{ $post->describe }}</li>
        <li>{{ $post->explain }}</li>
        <li>{{ $post->specify }}</li>
        <li>{{ $post->choose_yes }}</li>
        <li>{{ $post->choose_no }}</li>
        <li>{{ $post->note }}</li>
    </ul>

    <h4>Comments</h4>
    <ul>
        @foreach ($post->comments as $comment)
            <li>
                {{ $comment->comment }}
            </li>

            <form method="post" action="{{ route('comments.destroy',['comment_id' => $comment->id , 'post_id' => $post->id] ) }}">
                @csrf
                <button>削除</button>
            </form>
        @endforeach
    </ul>

    <form method="post" action="{{ route('comments.store' ,['id' => $post->id]) }}">
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
