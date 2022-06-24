@extends('layouts.app')

@section('content')
<div class="is-container-column">
    <div class="l-container_primary">

        <div class="e-heading2 mb50 pl16 is-heading_bdb-gray is-heading_color-gray">
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
@endsection
