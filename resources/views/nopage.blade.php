@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="ml-3 d-flex align-items-center">
                <div>ページ作成中...</div>
                <button type="button" onClick="history.back()" class="btn btn-link">前のページに戻る</button>
            </div>
        </div>

        @component('components.profilebar')
        @endcomponent
    </div>
</div>
@endsection
