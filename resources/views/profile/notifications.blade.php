@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8" id="content">

            <div class="text-secondary border-bottom pl-3 pb-1 mb-5 h5">
                通知
            </div>

            @if(!isset($notifications[0]))
                <div class="ml-4">
                    新しい通知はありません。
                </div>
            @else
                @foreach ($notifications as $notification)
                    <div>
                        <a href="{{ route('posts.show', $notification->notificationable) }}">
                            「{{ $notification->notificationable->title }}」に{{ $notification->text }}
                        </a>
                    </div>
                @endforeach
            @endif

        </div>

        @component('components.profilebar')
        @endcomponent

    </div>
</div>
@endsection
