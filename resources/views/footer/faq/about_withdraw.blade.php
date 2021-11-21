@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8" id="content">

          <div class="text-secondary border-bottom pl-3 pb-1 mb-5 h5">
              退会について
          </div>

          <div class="ml-3">
              ページ上部「ユーザー名 ▼」 → 「ユーザ情報の変更」 → ページ下部「退会はコチラ」<br><br>
              をご確認ください。
          </div>
        </div>

        @component('components.profilebar')
        @endcomponent
  </div>
</div>
@endsection
