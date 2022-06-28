@extends('layouts.app')

@section('content')
<div class="is-container-column">
    <div class="l-container_primary">
        <div class="mb8">ページ作成中...</div>
        <button type="button" onClick="history.back()" class="e-btn is-btn_link">前のページに戻る</button>
    </div>

    @component('components.profilebar')
    @endcomponent
</div>
@endsection
