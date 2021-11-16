@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            {{-- アイコン・名前・年代・編集・削除 --}}
            {{-- <div class="d-flex"> --}}
                <div class="d-flex align-items-center mb-4">
                    <img src="/storage/user_img/{{ $post->user->sex }}.jpeg" class="rounded-circle">
                    <div class="ml-2">
                    @if($post->user->deleted_at === null)
                        <div class="h5 ml-2">{{ $post->user->name }}</div>
                    @else
                        <div class="h5 ml-2">{{ $post->user->name }}（退会したユーザー）</div>
                    @endif
                        @if($post->user->age === 0)
                        <div class="ml-2">未設定</div>
                        @else
                        <div class="ml-2">{{ $post->user->age }} 代</div>
                        @endif
                    </div>
                </div>


            {{-- </div> --}}

            {{-- 投稿内容 --}}
            <div>
                @if($post->user->sex === (string)1)
                    <div class="d-flex align-items-center justify-content-between mb-4 border-bottom border-primary">
                @elseif($post->user->sex === (string)2)
                    <div class="d-flex align-items-center justify-content-between mb-4 border-bottom border-danger">
                @else
                    <div class="d-flex align-items-center justify-content-between mb-4 border-bottom border-dark">
                @endif
                    <div class="d-flex align-items-center">
                        <h4 class="ml-3 text-truncate">{{ $post->title }}</h4>
                        @if(!isset($post->category->category_name))
                            <h4 class="ml-3"><span class="badge badge-secondary badge-pill font-weight-light">カテゴリ未設定</span></h4>
                        @else
                            <h4 class="ml-3"><span class="badge badge-info badge-pill font-weight-light text-light">{{ $post->category->category_name }}</span></h4>
                        @endif
                    </div>
                    <div class="ml-5">
                        @can('edit',$post)
                            <a href="{{ route('posts.edit',$post) }}">編集</a>
                        @endcan

                        @can('delete',$post)
                            <form method="post" action="{{ route('posts.destroy',$post) }}" id="delete_{{ $post->id }}">
                                @csrf
                                <a href="#" data-id="{{ $post->id }}" onclick="deletePost(this);">削除</a>
                            </form>
                        @endcan
                    </div>
                </div>

                <ul>
                    <li class="list-unstyled">
                        <div class="mb-4">
                            <div class="mb-2 text-secondary border-bottom">Describe ... 問題や葛藤を描写</div>
                            <div class="ml-3">{{ $post->describe }}</div>
                        </div>
                    </li>
                    <li class="list-unstyled">
                        <div class="mb-4">
                            <div class="mb-2 text-secondary border-bottom">Explain ... 自分の気持ちを説明</div>
                            <div class="ml-3">{{ $post->explain }}</div>
                        </div>
                    </li>
                    <li class="list-unstyled">
                        <div class="mb-4">
                            <div class="mb-2 text-secondary border-bottom">Specify ... 具体的な提案</div>
                            <div class="ml-3">{{ $post->specify }}</div>
                        </div>
                    </li>
                    <li class="list-unstyled">
                        <div class="mb-4">
                            <div class="mb-2 text-secondary border-bottom">Choose ... イエスに対する回答</div>
                            <div class="ml-3">{{ $post->choose_yes }}</div>
                        </div>
                    </li>
                    <li class="list-unstyled">
                        <div class="mb-4">
                            <div class="mb-2 text-secondary border-bottom">Choose ... ノーに対する回答</div>
                            <div class="ml-3">{{ $post->choose_no }}</div>
                        </div>
                    </li>
                    <li class="list-unstyled">
                        <div class="mb-4">
                            <div class="mb-2 text-secondary border-bottom">Note ... その他メモ</div>
                            @if(empty($post->note))
                                <div class="ml-3 text-secondary">未設定</div>
                            @else
                                <div class="ml-3">{{ $post->note }}</div>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>


            {{-- いいね --}}
            <div class="mb-5 float-right">
                @guest
                    <span>
                        いいね：{{ $post->nices->count() }}
                    </span>
                @else
                    @if($nice)
                    <a href="{{ route('unnice', $post) }}" class="btn btn-danger btn-sm">
                        いいね
                    </a>
                    <span>
                        {{ $post->nices->count() }}
                    </span>
                    @else
                    <a href="{{ route('nice', $post) }}" class="btn btn-outline-danger btn-sm">
                        いいね
                    </a>
                    <span>
                        {{ $post->nices->count() }}
                    </span>
                    @endif
                @endguest
            </div>

            {{-- コメント追加 --}}
            @auth
                <form class="" method="post" action="{{ route('comments.store' ,$post) }}">
                    @csrf
                        <div class="form-group mb-1">
                            <textarea name="comment" class="form-control" rows="3">{{ old('comment') }}</textarea>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <button class="btn btn-outline-secondary">コメント</button>
                            @error('comment')
                                <div class="text-danger ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                @endAuth

            {{-- コメント一覧 --}}
            {{-- <ul> --}}
                @foreach ($post->comments as $comment)
                    <div class="d-flex mb-5">
                        <div>
                            <img src="/storage/user_img/{{ $comment->user->sex }}.jpeg" class="rounded-circle">
                        </div>
                        <div>
                            <div class="d-flex align-items-center ml-2 mb-2">
                                <div>{{ $comment->user->name }}</div>
                                <div>
                                    @if( $post->user_id === Auth::id() || $comment->user_id === Auth::id() )
                                    {{-- コメント削除 --}}
                                        <form method="post" action="{{ route('comments.destroy',['comment' => $comment, 'post' => $post] ) }}">
                                        @csrf
                                            <button type="submit" class="btn btn-outline-dark btn-sm ml-3">削除</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <div class="ml-2">
                                {{ $comment->comment }}
                            </div>
                        </div>
                    </div>
                @endforeach
            {{-- </ul> --}}

        </div>
    </div>

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
