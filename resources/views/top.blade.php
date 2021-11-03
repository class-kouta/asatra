@extends('layouts.app2')

@section('content')
<div class="container">

    <form method="get" action="{{ route('top') }}">
        {{-- カテゴリ検索 --}}
        <select name="categoryId" class="form-control">
            <option value="">未選択</option>
            @foreach($categories as $id => $category_name)
            <option value="{{ $id }}">
                {{ $category_name }}
            </option>
            @endforeach
        </select>
        {{-- キーワード検索 --}}
        <input type="text" name="search" class="form-control" aria-label="Text input with dropdown button" placeholder="キーワード検索" value="@if (isset($search)) {{ $search }} @endif">
        <div class="input-group-append">
            <button type="submit" class="btn btn-outline-dark">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>

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

                @if($post->user->age === 0)
                <p>未設定</p>
                @else
                <p>{{ $post->user->age }} 代</p>
                @endif

                @if(!isset($post->category->category_name))
                <p>カテゴリ：未設定</p>
                @else
                <p>カテゴリ：{{ $post->category->category_name }}</p>
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

    @if(empty($posts[0]))
    検索に一致する投稿はございません。
    @endif

</div>
@endsection
