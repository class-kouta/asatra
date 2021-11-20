@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8" id="content">

            <form method="get" action="{{ route('top') }}">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <select name="categoryId" class="form-control">
                            <option value="">未選択</option>
                            @foreach($categories as $id => $category_name)
                                <option value="{{ $id }}" @if($categoryId === "$id") selected @endif>
                                    {{ $category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        {{-- <input type="text" class="form-control" id=""> --}}
                        <input type="text" name="search" class="form-control" placeholder="キーワード検索" value="@if (isset($search)) {{ $search }} @endif">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">検索</button>
                    </div>
                </div>
            </form>

            @foreach ($posts as $post)
                @if($post->user->sex === (string)1)
                    <div class="d-flex align-items-center mt-5 border-bottom border-primary">
                @elseif($post->user->sex === (string)2)
                    <div class="d-flex align-items-center mt-5 border-bottom border-danger">
                @else
                    <div class="d-flex align-items-center mt-5 border-bottom border-dark">
                @endif

                    @guest
                        <h5 class="ml-3 text-truncate"><a href="{{ route('posts.show_guest',$post) }}" class="text-reset">{{ $post->title }}</a></h5>
                    @else
                        <h5 class="ml-3 text-truncate"><a href="{{ route('posts.show',$post) }}" class="text-reset">{{ $post->title }}</a></h5>
                    @endguest

                    @if(!isset($post->category->category_name))
                        <h4 class="ml-3"><span class="badge badge-secondary badge-pill font-weight-light">カテゴリ未設定</span></h4>
                    @else
                        <h4 class="ml-3"><span class="badge badge-info badge-pill font-weight-light text-light">{{ $post->category->category_name }}</span></h4>
                    @endif

                </div>

                <div>
                    <ul class="ml-5 mb-2 p-0 w-75">
                        <li class="list-unstyled text-truncate mt-2">D : {{ $post->describe }}</li>
                        <li class="list-unstyled text-truncate mt-2">E : {{ $post->explain }}</li>
                        <li class="list-unstyled text-truncate mt-2">S : {{ $post->specify }}</li>
                        @guest
                            <li class="list-unstyled text-truncate mt-2"><a href="{{ route('posts.show_guest',$post) }}">...続きを読む</a></li>
                        @else
                            <li class="list-unstyled text-truncate mt-2"><a href="{{ route('posts.show',$post) }}">...続きを読む</a></li>
                        @endguest
                    </ul>

                    <div class="d-flex">
                        <div class="ml-3">
                            いいね：{{ $post->nices->count() }}
                        </div>
                        <div class="ml-3">
                            コメント：{{ $post->comments->count() }}
                        </div>
                    </div>
                </div>

            @endforeach

            <div class="mt-5">{{ $posts->links() }}</div>

            @if(empty($posts[0]))
                検索に一致する投稿はございません。
            @endif
        </div>

        @guest
            <div class="col-3 mx-auto">
                <div class="card p-3 d-md-none d-lg-block" id="sidebar">
                    <div class="d-flex align-items-center mb-4">
                        <img src="/storage/user_img/9.jpeg" class="rounded-circle">
                            <div class="h4 ml-3">ゲスト</div>
                    </div>

                    <div class="ml-2">
                        <div class="mb-3">
                            自分の投稿： - 件
                        </div>
                        <div class="mb-3">
                            いいねした投稿： - 件
                        </div>
                        <div class="mb-4">
                            コメントした回数： - 回
                        </div>
                        <a class="btn btn-primary mb-4" href="{{ route('login') }}">ログインして投稿</a>
                    </div>
                </div>
            </div>
        @else
            <div class="col-3 mx-auto">
                <div class="card p-3 d-md-none d-lg-block" id="sidebar">
                    <div class="d-flex align-items-center mb-4">
                        <img src="/storage/user_img/{{ Auth::user()->sex }}.jpeg" class="rounded-circle">
                        <div class="ml-3">
                            <div class="h4">{{ Auth::user()->name }}</div>
                            <div class="">
                                <div>
                                    @if(Auth::user()->age === 0)
                                        年代未設定
                                    @else
                                        {{ Auth::user()->age }} 代
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ml-2">
                        <div class="mb-3">
                            自分の投稿： <a class="" href="{{ route('profile.myposts') }}">{{ Auth::user()->post->count() }}</a> 件
                        </div>
                        <div class="mb-3">
                            いいねした投稿： <a class="" href="{{ route('profile.myniceposts') }}">{{ Auth::user()->joinNicesPosts()->count() }}</a> 件
                        </div>
                        <div class="mb-4">
                            コメントした回数： <a class="" href="{{ route('profile.mycommentposts') }}">{{ Auth::user()->joinCommentsPosts()->count() }}</a> 回
                        </div>
                        <a class="btn btn-primary mb-4" href="{{ route('posts.create') }}">投稿する</a>
                    </div>

                    <div class="ml-2"><a href="{{ route('profile.edit') }}">ユーザ情報の変更</a></div>
                </div>
            </div>
        @endguest
    </div>

    <div class="my-5 py-5"></div>
    <div class="bg-primary" id="footer">
        <ul class="nav justify-content-center py-4">
            <li class="nav-item">
                <u><a class="nav-link text-light h5" href="{{ route('nopage') }}">製作者について</a></u>
            </li>
            <li class="nav-item">
                <u><a class="nav-link text-light h5" href="{{ route('footer.faq') }}">FAQ</a></u>
            </li>
            <li class="nav-item">
                <u><a class="nav-link text-light h5" href="{{ route('nopage') }}">お問い合わせ</a></u>
            </li>
        </ul>
        <div id="copy">
            <p class="text-center pb-5">&copy; 2021 Kouta Sasaki</p>
        </div>
    </div>

</div>
@endsection
