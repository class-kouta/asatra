@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8">
            <div class="e-heading2 mb-5 pl-3 is-heading_bdb-gray is-heading_color-gray">
                退会確認
            </div>
            <div class="pl-3">
                <div class="mb-4 e-heading3">本当に退会しますか？</div>
                <ul class="mb-5 pl-3">
                    <li class="mb-3">
                        <div class="e-heading4 is-heading_bdb-gray pl-2">
                            「投稿」「いいね」「コメント」機能が利用できなくなります。
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="e-heading4 is-heading_bdb-gray pl-2">
                            退会しても投稿したデータは消えずに残ります。
                        </div>
                        <div class="pl-2">
                            <div class="pt-2">・「みんなの投稿」に「退会したユーザー」として投稿が表示されます。</div>
                            <div class="pt-2">・投稿を削除する場合は、退会前にご自身で投稿を削除願います。</div>
                        </div>
                    </li>
                </ul>
                <div class="d-flex align-items-center ml-5">
                    <form method="post" action="{{ route('profile.withdraw' ,Auth::id()) }}" id="delete_{{ Auth::id() }}">
                        @csrf
                        <a href="#" data-id="{{ Auth::id() }}" onclick="deleteUser(this);" class="e-btn is-btn_indigo">退会する</a>
                    </form>
                    <div class="ml-3">
                        <a href="/">トップに戻る</a>
                    </div>
                </div>
            </div>
        </div>

        @component('components.profilebar')
        @endcomponent

    </div>
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
