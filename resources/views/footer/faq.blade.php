@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">

            <div class="text-secondary border-bottom pl-3 pb-1 mb-4 h5">
                FAQ よくある質問
            </div>

            <a href="{{ '/profile/withdraw_confirm' }}">退会について</a>
        </div>

        @component('components.profilebar')
        @endcomponent

    </div>
</div>
@endsection
