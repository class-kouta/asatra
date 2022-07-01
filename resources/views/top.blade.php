@extends('layouts.app')

@section('content')
<div class="is-container-column">
    <div class="l-container_primary">

        <form method="get" action="{{ route('top') }}">
            <div class="c-search-form">

                <div class="c-search-form__category">
                    <select name="category_id" class="e-form">
                        <option value="">未選択</option>
                        @foreach($categories as $id => $name)
                            <option value="{{ $id }}" @if($category_id === "$id") selected @endif>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="c-search-form__keyword">
                    <input type="text" name="search" class="e-form" placeholder="キーワード検索" value="@if (isset($search)) {{ $search }} @endif">
                </div>

                <button type="submit" class="e-btn is-btn_blue">検索</button>
            </div>

            <select name="sorting" class="e-form is-form_50" onchange="submit(this.form)">
                <option value="{{ SortType::LATEST }}" @if(request()->sorting == SortType::LATEST) selected @endif>投稿日時が新しい順</option>
                <option value="{{ SortType::OLDEST }}" @if(request()->sorting == SortType::OLDEST) selected @endif>投稿日時が古い順</option>
                <option value="{{ SortType::NICE_DESC }}" @if(request()->sorting == SortType::NICE_DESC) selected @endif>いいねが多い順</option>
            </select>
        </form>

        @include('components.post_list')

        <div class="mt50">{{ $posts->appends(request()->query())->links('vendor.pagination.custom_pagination_view') }}</div>

        @if(empty($posts[0]))
            検索に一致する投稿はございません。
        @endif
    </div>

    @component('components.profilebar')
    @endcomponent

</div>
@endsection
