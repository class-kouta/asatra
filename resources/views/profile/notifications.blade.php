@extends('layouts.app')

@section('content')
<div class="is-container-column">
    <div class="l-container_primary">

        <div class="e-heading2 mb50 pl16 is-heading_bdb-gray is-heading_color-gray">
            通知
        </div>

        @if(!isset($notifications[0]))
            <div class="ml24">
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
@endsection
