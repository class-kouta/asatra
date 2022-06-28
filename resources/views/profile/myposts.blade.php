@extends('layouts.app')

@section('content')
<div class="is-container-column">
    <div class="l-container_primary">

        <div class="e-heading2 mb50 pl16 is-heading_bdb-gray is-heading_color-gray">
            {{ $page_title }}
        </div>

        @include('components.post_list')

        @if(!isset($posts[0]))
            <div class="ml24">
                まだ投稿がありません。
            </div>
        @endif

    </div>

    @component('components.profilebar')
    @endcomponent

</div>
@endsection
