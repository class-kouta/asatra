@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8">
            <div class="mb-2">ページ作成中...</div>
            <button type="button" onClick="history.back()" class="e-btn is-btn_link">前のページに戻る</button>
        </div>

        @component('components.profilebar')
        @endcomponent
    </div>
</div>
@endsection
