@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8">
            {{-- アイコン・名前・年代・編集・削除 --}}
                <div class="d-flex align-items-center mb-4">
                    <img src="/storage/user_img/{{ $post->user->sex }}.jpeg" class="rounded-circle">
                    <div class="ml-2">
                    @if($post->user->deleted_at === null)
                        <div class="h5 ml-2">{{ $post->user->name }}</div>
                    @else
                        <div class="h5 ml-2">{{ $post->user->name }}（退会したユーザー）</div>
                    @endif
                        @if($post->user->age === 0)
                        <div class="ml-2">年代未設定</div>
                        @else
                        <div class="ml-2">{{ $post->user->age }} 代</div>
                        @endif
                    </div>
                </div>

            {{-- 投稿内容 --}}
            <div>
                @if($post->user->sex === (string)1)
                    <div class="mb-4 border-bottom border-primary">
                @elseif($post->user->sex === (string)2)
                    <div class="mb-4 border-bottom border-danger">
                @else
                    <div class="mb-4 border-bottom border-dark">
                @endif
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        @if(!isset($post->category->category_name))
                            <h4 class="ml-3"><span class="badge badge-secondary badge-pill font-weight-light">カテゴリ未設定</span></h4>
                        @else
                            <h4 class="ml-3"><a href="/?category_id={{ $post->category->id }}" class="badge badge-info badge-pill font-weight-light text-light">{{ $post->category->category_name }}</a></h4>
                        @endif
                        <div class="d-flex">
                            @can('edit',$post)
                                <a href="{{ route('posts.edit',$post) }}" class="btn btn-outline-secondary btn-sm">編集</a>
                            @endcan

                            @can('delete',$post)
                                <form method="post" action="{{ route('posts.destroy',$post) }}" id="delete_{{ $post->id }}">
                                    @csrf
                                    <a href="#" data-id="{{ $post->id }}" onclick="deletePost(this);" class="btn btn-outline-secondary btn-sm ml-1">削除</a>
                                </form>
                            @endcan
                        </div>
                    </div>
                    <h4 class="ml-3">{{ $post->title }}</h4>
                </div>

                <ul>
                    <li class="list-unstyled">
                        <div class="mb-4">
                            <div class="mb-2 text-secondary border-bottom">Describe ... 問題や葛藤を描写</div>
                            <div class="ml-3">{!! nl2br(e($post->describe)) !!}</div>
                        </div>
                    </li>
                    <li class="list-unstyled">
                        <div class="mb-4">
                            <div class="mb-2 text-secondary border-bottom">Explain ... 自分の気持ちを説明</div>
                            <div class="ml-3">{!! nl2br(e($post->explain)) !!}</div>
                        </div>
                    </li>
                    <li class="list-unstyled">
                        <div class="mb-4">
                            <div class="mb-2 text-secondary border-bottom">Specify ... 具体的な提案</div>
                            <div class="ml-3">{!! nl2br(e($post->specify)) !!}</div>
                        </div>
                    </li>
                    <li class="list-unstyled">
                        <div class="mb-4">
                            <div class="mb-2 text-secondary border-bottom">Choose ... イエスに対する回答</div>
                            @if(empty($post->choose_yes))
                                <div class="ml-3 text-secondary">未設定</div>
                            @else
                                <div class="ml-3">{!! nl2br(e($post->choose_yes)) !!}</div>
                            @endif
                        </div>
                    </li>
                    <li class="list-unstyled">
                        <div class="mb-4">
                            <div class="mb-2 text-secondary border-bottom">Choose ... 想定される否定的な返答</div>
                            @if(empty($post->choose_no_reply))
                                <div class="ml-3 text-secondary">未設定</div>
                            @else
                                <div class="ml-3">{!! nl2br(e($post->choose_no_reply)) !!}</div>
                            @endif
                        </div>
                    </li>
                    <li class="list-unstyled">
                        <div class="mb-4">
                            <div class="mb-2 text-secondary border-bottom">Choose ... 返答に対する回答</div>
                            @if(empty($post->choose_no_answer))
                                <div class="ml-3 text-secondary">未設定</div>
                            @else
                                <div class="ml-3">{!! nl2br(e($post->choose_no_answer)) !!}</div>
                            @endif
                        </div>
                    </li>
                    <li class="list-unstyled">
                        <div class="mb-4">
                            <div class="mb-2 text-secondary border-bottom">Note ... その他メモ</div>
                            @if(empty($post->note))
                                <div class="ml-3 text-secondary">未設定</div>
                            @else
                                <div class="ml-3">{!! nl2br(e($post->note)) !!}</div>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>

            {{-- いいね --}}
            <div class="mb-5 float-right">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-danger btn-sm">
                        いいね
                    </a>
                    <span>
                        {{ $post->nices->count() }}
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
            @guest
                <div class="form-group mb-1">
                    <textarea name="comment" class="form-control" rows="3"></textarea>
                </div>
                <a href="{{ route('login') }}" class="btn btn-outline-secondary mb-4">
                    ログインしてコメント
                </a>

            @else
                <form class="" method="post" action="{{ route('comments.store' ,$post) }}">
                    @csrf
                        <div class="form-group mb-1">
                            <textarea name="comment" class="form-control" rows="3">{{ old('comment') }}</textarea>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <button class="btn btn-outline-secondary">コメント</button>
                            @error('comment')
                                <div class="text-danger ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                @endguest

            {{-- コメント一覧 --}}
            @if(!isset($post->comments[0]))
                <div class="ml-3 mb-4">まだコメントはありません。</div>
            @endif
            @foreach ($post->comments as $comment)
                <div class="d-flex mb-4">
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
                            {!! nl2br(e($comment->comment)) !!}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        @component('components.profilebar')
        @endcomponent

    </div>

</div>

<script>

    function deletePost(e) {
        'use strict';
        if (confirm('本当に削除していいですか?')) {
        document.getElementById('delete_' + e.dataset.id).submit();
        }
    }

</script>

@endsection
