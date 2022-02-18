@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8" id="content">

            <div class="text-secondary border-bottom pl-3 pb-1 mb-5 h5">
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
