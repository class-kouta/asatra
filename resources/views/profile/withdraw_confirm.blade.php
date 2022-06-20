@extends('layouts.app')

@section('content')
<div class="is-container-column">
    <div class="l-container_primary">
        <div class="e-heading2 mb50 pl16 is-heading_bdb-gray is-heading_color-gray">
            退会確認
        </div>
        <div class="pl16">
            <div class="mb24 e-heading3">本当に退会しますか？</div>
            <ul class="mb50 pl16">
                <li class="mb16">
                    <div class="e-heading4 is-heading_bdb-gray pl8">
                        「投稿」「いいね」「コメント」機能が利用できなくなります。
                    </div>
                </li>
                <li class="mb16">
                    <div class="e-heading4 is-heading_bdb-gray pl8">
                        退会しても投稿したデータは消えずに残ります。
                    </div>
                    <div class="pl8">
                        <div class="pt8">・「みんなの投稿」に「退会したユーザー」として投稿が表示されます。</div>
                        <div class="pt8">・投稿を削除する場合は、退会前にご自身で投稿を削除願います。</div>
                    </div>
                </li>
            </ul>
            <div class="d-flex align-items-center ml48">
                <form method="post" action="{{ route('profile.withdraw' ,Auth::id()) }}" id="delete_{{ Auth::id() }}">
                    @csrf
                    <a href="#" data-id="{{ Auth::id() }}" onclick="deleteUser(this);" class="e-btn is-btn_indigo">退会する</a>
                </form>
                <div class="ml16">
                    <a href="/">トップに戻る</a>
                </div>
            </div>
        </div>
    </div>

    @component('components.profilebar')
    @endcomponent

</div>

<script>

    function deleteUser(e) {
        'use strict';
        if (confirm('本当に退会しますか?')) {
        document.getElementById('delete_' + e.dataset.id).submit();
        }
    }

</script>

@endsection
