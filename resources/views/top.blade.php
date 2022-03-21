@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8" id="content">

            <form method="get" action="{{ route('top') }}">
                <div class="form-row mb-4">


                    <div class="form-group col-md-2">
                        <select name="category_id" class="form-control">
                            <option value="">未選択</option>
                            @foreach($categories as $id => $category_name)
                                <option value="{{ $id }}" @if($category_id === "$id") selected @endif>
                                    {{ $category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group col-md-6">
                        <input type="text" name="search" class="form-control" placeholder="キーワード検索" value="@if (isset($search)) {{ $search }} @endif">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">検索</button>
                    </div>

                    <div class="form-group col-md-2">
                        <select name="sorting" class="form-control">
                            <option value="{{ SortType::LATEST }}" @if(request()->sorting == SortType::LATEST) selected @endif>投稿日時が新しい順</option>
                            <option value="{{ SortType::OLDEST }}" @if(request()->sorting == SortType::OLDEST) selected @endif>投稿日時が古い順</option>
                            <option value="{{ SortType::NICE_DESC }}" @if(request()->sorting == SortType::NICE_DESC) selected @endif>いいねが多い順</option>
                        </select>
                    </div>
                </div>
            </form>

            @include('components.post_list')

            <div class="mt-5">{{ $posts->appends(request()->query())->links() }}</div>

            @if(empty($posts[0]))
                検索に一致する投稿はございません。
            @endif
        </div>

        @component('components.profilebar')
        @endcomponent

    </div>
</div>
@endsection
