@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8" id="content">

            <div class="e-heading2 mb-5 pl-3 is-heading_bdb-gray is-heading_color-gray">
                通知
            </div>

            @if(!isset($notifications[0]))
                <div class="ml-4">
                    新しい通知はありません。
                </div>
            @else
                <ul class="e-list_disc">
                    @foreach ($notifications as $notification)
                    <li>
                        <a href="{{ route('posts.show', $notification->notificationable) }}">
                            「{{ $notification->notificationable->title }}」に{{ $notification->text }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            @endif

        </div>

        @component('components.profilebar')
        @endcomponent

    </div>
</div>
@endsection
