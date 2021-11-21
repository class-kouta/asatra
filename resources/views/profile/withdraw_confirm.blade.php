@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="text-secondary border-bottom pl-3 pb-1 mb-5 h4">
                退会確認
            </div>
            <div class="ml-3">
                <div class="mb-4 ml-3 h5">本当に退会しますか？</div>
                <ul class="mb-5">
                    <li class="list-unstyled border-bottom px-3 mb-3">退会すると「投稿」「いいね」「コメント」機能が利用できなくなります。</li>
                    <li class="list-unstyled border-bottom px-3 mb-3">退会しても投稿したデータは消えずに残ります。</li>
                    <li class="ml-5">「みんなの投稿」に「退会したユーザー」として投稿が表示されます。</li>
                    <li class="ml-5">投稿を削除する場合は、退会前にご自身で投稿を削除願います。</li>
                </ul>
                <div class="btn-group d-flex align-items-center ml-5">

                    <form method="post" action="{{ route('profile.withdraw',Auth::user()->id) }}" id="delete_{{ Auth::user()->id }}">
                        @csrf
                        <a href="#" data-id="{{ Auth::user()->id }}" onclick="deleteUser(this);" class="btn btn-secondary">退会する</a>
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
