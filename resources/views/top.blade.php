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

        @component('components.profilebar')
        @endcomponent

    </div>
</div>
@endsection
