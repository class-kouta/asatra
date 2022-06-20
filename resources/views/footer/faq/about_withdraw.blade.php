@extends('layouts.app')

@section('content')
<div class="is-container-column">
    <div class="l-container_primary">

        <div class="e-heading2 mb50 pl16 is-heading_bdb-gray is-heading_color-gray">
            退会について
        </div>

        <div class="ml16">
            ページ上部「ユーザー名 ▼」<br><br>
            → 「ユーザ情報の変更」<br><br>
            → ページ下部「退会はコチラ」<br><br>
            をご確認ください。
        </div>
    </div>

    @component('components.profilebar')
    @endcomponent
</div>
@endsection
