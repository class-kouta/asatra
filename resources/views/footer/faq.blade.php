@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">

            <div class="text-secondary border-bottom pl-3 pb-1 mb-4 h5">
                FAQ よくある質問
            </div>

            <ul class="">
                <li class="list-unstyled">
                    <a href="{{ route('faq.about_withdraw') }}">退会するにはどうしたらいいですか？</a>
                </li>
            </ul>
        </div>

        @component('components.profilebar')
        @endcomponent

    </div>
</div>
@endsection
