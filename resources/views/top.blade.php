@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8" id="content">

            <form method="get" action="{{ route('top') }}">
                <div class="form-row mb-4">

                    @foreach($categories as $id => $category_name)
                        @if($loop->first)
                            <div class="form-group col-md-2">
                                <select name="category_id" class="form-control">
                                    <option value="">未選択</option>
                        @endif
                                    <option value="{{ $id }}" @if($category_id === "$id") selected @endif>
                                        {{ $category_name }}
                                    </option>
                        @if($loop->last)
                                </select>
                            </div>
                        @endif
                    @endforeach

                    <div class="form-group col-md-6">
                        <input type="text" name="search" class="form-control" placeholder="キーワード検索" value="@if (isset($search)) {{ $search }} @endif">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">検索</button>
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
