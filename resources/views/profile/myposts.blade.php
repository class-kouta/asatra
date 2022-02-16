@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8" id="content">

            <div class="text-secondary border-bottom pl-3 pb-1 mb-5 h5">
                {{ $page_title }}
            </div>

                @foreach ($posts as $post)
                    <div class="mx-4 mb-5">
                        {{-- タイトル・カテゴリ --}}
                        @if($post->user->sex === (string)1)
                            <div class="d-flex align-items-center border-bottom border-primary">
                        @elseif($post->user->sex === (string)2)
                            <div class="d-flex align-items-center border-bottom border-danger">
                        @else
                            <div class="d-flex align-items-center border-bottom border-dark">
                        @endif

                        <h5 class="ml-3 text-truncate"><a href="{{ route('posts.show',$post) }}" class="text-reset">{{ $post->title }}</a></h5>

                        @if(!isset($post->category->category_name))
                            <h4 class="ml-3"><span class="badge badge-secondary badge-pill font-weight-light">カテゴリ未設定</span></h4>
                        @else
                            <h4 class="ml-3"><span class="badge badge-info badge-pill font-weight-light text-light">{{ $post->category->category_name }}</span></h4>
                        @endif
                        </div>

                        {{-- 投稿内容・いいね&コメント数 --}}
                        <div>
                            <ul class="ml-5 mb-2 p-0 w-75">
                                <li class="list-unstyled mt-2">
                                    <div class="d-flex row">
                                        <div class="col-2 text-secondary">
                                            Describe
                                        </div>
                                        <div class="col-10 text-truncate">
                                            {{ $post->describe }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-unstyled mt-2">
                                    <div class="d-flex row">
                                        <div class="col-2 text-secondary">
                                            Explain
                                        </div>
                                        <div class="col-10 text-truncate">
                                            {{ $post->explain }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-unstyled mt-2">
                                    <div class="d-flex row">
                                        <div class="col-2 text-secondary">
                                            Specify
                                        </div>
                                        <div class="col-10 text-truncate">
                                            {{ $post->specify }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-unstyled text-truncate mt-2"><a href="{{ route('posts.show',$post) }}">...続きを読む</a></li>
                            </ul>

                            <div class="d-flex">
                                <div class="ml-3">
                                    いいね：{{ $post->nices->count() }}
                                </div>
                                <div class="ml-3">
                                    コメント：{{ $post->comments->count() }}
                                </div>
                                @if($post->created_at)
                                    <div class="ml-4 text-secondary">
                                        {{ $post->created_at->format('Y/n/j H:i') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach


                @if(!isset($posts[0]))
                <div class="ml-4">
                    まだ投稿がありません。
                </div>
                @endif

        </div>

        @component('components.profilebar')
        @endcomponent

    </div>
</div>
@endsection
