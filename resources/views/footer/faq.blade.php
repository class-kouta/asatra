@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">

            <div class="e-heading2 mb-5 pl-3 is-heading_bdb-gray is-heading_color-gray">
                FAQ よくある質問
            </div>

            <ul class="e-list_disc">
                <li>
                    <a href="{{ route('footer.faq.about_withdraw') }}">退会するにはどうしたらいいですか？</a>
                </li>
            </ul>
        </div>

        @component('components.profilebar')
        @endcomponent

    </div>
</div>
@endsection
