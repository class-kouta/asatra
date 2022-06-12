@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8" id="content">

            <div class="e-heading2 mb-5 pl-3 is-heading_bdb-gray is-heading_color-gray">
                退会について
            </div>

            <div class="ml-3">
                ページ上部「ユーザー名 ▼」<br><br>
                → 「ユーザ情報の変更」<br><br>
                → ページ下部「退会はコチラ」<br><br>
                をご確認ください。
            </div>
        </div>

        @component('components.profilebar')
        @endcomponent
  </div>
</div>
@endsection
