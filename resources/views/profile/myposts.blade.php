@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8" id="content">

            <div class="e-heading2 mb-5 pl-3 is-heading_bdb-gray is-heading_color-gray">
                {{ $page_title }}
            </div>

            @include('components.post_list')

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
