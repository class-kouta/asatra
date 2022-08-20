@extends('layouts.app')

@section('content')
<div class="is-container-column">
    <div class="l-container_primary">
        {{-- アイコン・名前・年代・編集・削除 --}}
        <div class="c-user-status">
            <img src="/storage/user_img/{{ $post->user->sex }}.jpeg" class="c-user-status__img">
            <div>
                <div class="c-user-status__name">
                    @if($post->user->deleted_at === null)
                    {{ $post->user->name }}
                    @else
                    {{ $post->user->name }}（退会したユーザー）
                    @endif
                </div>
                <div class="c-user-status__age">
                    @if($post->user->age === 0)
                    年代未設定
                    @else
                    {{ $post->user->age }} 代
                    @endif
                </div>
            </div>
        </div>

        {{-- 投稿内容 --}}
        <div class="c-show-detail">
            <div class="c-show-detail__header">
                <span class="c-show-detail__header__category">
                    @if(!isset($post->category->name))
                    <span class="e-tag is-tag_gray">
                        カテゴリ未設定
                    </span>
                    @else
                    <a href="{{ route('search', ['category_id' => $post->category->id]) }}" class="e-tag is-tag_orange">
                        {{ $post->category->name }}
                    </a>
                    @endif
                </span>

                <div class="c-show-detail__header__buttons">
                    @can('edit',$post)
                    <a href="{{ route('posts.edit',$post) }}" class="e-btn is-btn_outline-indigo is-btn_sm">編集</a>
                    @endcan

                    @can('delete',$post)
                    <form method="post" action="{{ route('posts.destroy',$post) }}" id="delete_{{ $post->id }}">
                        @csrf
                        <a href="#" data-id="{{ $post->id }}" onclick="deletePost(this);" class="e-btn is-btn_outline-indigo is-btn_sm">削除</a>
                    </form>
                    @endcan
                </div>
            </div>

            <div class="c-show-detail__title">{{ $post->title }}</div>

            <ul>
                <li>
                    <div class="c-show-detail__list__title">Describe ... 問題や葛藤を描写</div>
                    @if(empty($post->describe))
                    <div class="c-show-detail__list__body-gray">未設定</div>
                    @else
                    <div class="c-show-detail__list__body-dark-gray">{!! nl2br(e($post->describe)) !!}</div>
                    @endif
                </li>
                <li>
                    <div class="c-show-detail__list__title">Explain ... 自分の気持ちを説明</div>
                    @if(empty($post->explain))
                    <div class="c-show-detail__list__body-gray">未設定</div>
                    @else
                    <div class="c-show-detail__list__body-dark-gray">{!! nl2br(e($post->explain)) !!}</div>
                    @endif

                </li>
                <li>
                    <div class="c-show-detail__list__title">Specify ... 具体的な提案</div>
                    @if(empty($post->specify))
                    <div class="c-show-detail__list__body-gray">未設定</div>
                    @else
                    <div class="c-show-detail__list__body-dark-gray">{!! nl2br(e($post->specify)) !!}</div>
                    @endif
                </li>
                <li>
                    <div class="c-show-detail__list__title">Choose ... イエスに対する回答</div>
                    @if(empty($post->choose_yes))
                    <div class="c-show-detail__list__body-gray">未設定</div>
                    @else
                    <div class="c-show-detail__list__body-dark-gray">{!! nl2br(e($post->choose_yes)) !!}</div>
                    @endif
                </li>
                <li>
                    <div class="c-show-detail__list__title">Choose ... 想定される否定的な返答</div>
                    @if(empty($post->choose_no_reply))
                    <div class="c-show-detail__list__body-gray">未設定</div>
                    @else
                    <div class="c-show-detail__list__body-dark-gray">{!! nl2br(e($post->choose_no_reply)) !!}</div>
                    @endif
                </li>
                <li>
                    <div class="c-show-detail__list__title">Choose ... 返答に対する回答</div>
                    @if(empty($post->choose_no_answer))
                    <div class="c-show-detail__list__body-gray">未設定</div>
                    @else
                    <div class="c-show-detail__list__body-dark-gray">{!! nl2br(e($post->choose_no_answer)) !!}</div>
                    @endif
                </li>
                <li>
                    <div class="c-show-detail__list__title">Note ... その他メモ</div>
                    @if(empty($post->note))
                    <div class="c-show-detail__list__body-gray">未設定</div>
                    @else
                    <div class="c-show-detail__list__body-dark-gray">{!! nl2br(e($post->note)) !!}</div>
                    @endif
                </li>
            </ul>
        </div>

        <div class="c-show-detail__footer">
            {{-- いいね --}}
            <div class="c-show-detail__footer__nice">
                @guest
                    <a href="{{ route('login') }}" class="e-btn is-btn_outline-pink is-btn_sm">
                        いいね
                    </a>
                    <span>
                        {{ $post->nices->count() }}
                    </span>
                @else
                    @if($nice)
                    <a href="{{ route('unnice', $post) }}" class="e-btn is-btn_pink is-btn_sm">
                        いいね
                    </a>
                    <span>
                        {{ $post->nices->count() }}
                    </span>
                    @else
                    <a href="{{ route('nice', $post) }}" class="e-btn is-btn_outline-pink is-btn_sm">
                        いいね
                    </a>
                    <span>
                        {{ $post->nices->count() }}
                    </span>
                    @endif
                @endguest
            </div>

            @if($post->created_at)
            <div class="c-show-detail__footer__timestamp">
                {{ $post->created_at->format('Y/n/j H:i') }}
            </div>
            @endif
        </div>

        {{-- コメント追加 --}}
        <div class="c-show-comment__form">
            @guest
            <textarea disabled name="comment" class="e-form mb4" rows="3"></textarea>
            <a href="{{ route('login') }}" class="e-btn is-btn_orange">
                ログインしてコメント
            </a>
            @else
            <form method="post" action="{{ route('comments.store' ,$post) }}">
                @csrf
                <textarea name="comment" class="e-form mb4" rows="3">{{ old('comment') }}</textarea>
                <div class="c-show-comment__form__primary">
                    <button class="e-btn is-btn_outline-indigo">コメント</button>
                    @error('comment')
                    <div class="c-show-comment__form__error">{{ $message }}</div>
                    @enderror
                </div>
            </form>
            @endguest
        </div>

        {{-- コメント一覧 --}}
        <div class="c-show-comment__list">
            @if(!isset($post->comments[0]))
            <div>まだコメントはありません。</div>
            @endif

            @foreach ($post->comments as $comment)
            <div class="c-post-comment">
                <div>
                    <img src="/storage/user_img/{{ $comment->user->sex }}.jpeg" class="c-post-comment__img">
                </div>
                <div>
                    <div class="c-post-comment__primary">
                        <div class="c-post-comment__name">
                            {{ $comment->user->name }}
                        </div>
                        <div class="c-post-comment__timestamp">
                            {{ $comment->created_at->format('Y/n/j H:i') }}
                        </div>
                        <div class="c-post-comment__button">
                            @if( $post->user_id === Auth::id() || $comment->user_id === Auth::id() )
                            {{-- コメント削除 --}}
                            <form method="post" action="{{ route('comments.destroy',['comment' => $comment, 'post' => $post] ) }}">
                            @csrf
                                <button type="submit" class="e-btn is-btn_outline-indigo is-btn_sm">削除</button>
                            </form>
                            @endif
                        </div>
                    </div>
                    <div class="c-post-comment__text">
                        {!! nl2br(e($comment->comment)) !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

    @component('components.profilebar')
    @endcomponent

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
