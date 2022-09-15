@extends('layouts.app')

@section('content')
<div class="is-container-column">
    <div class="l-container_primary">

        <div class="e-heading2 mb50 pl16 is-heading_bdb-gray is-heading_color-gray">
            パスワード再設定
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="pl24">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb16">
                    <div class="c-form-group__primary">
                        <div class="c-form-group__title">メールアドレス</div>
                    </div>
                    <input id="email" type="email" class="e-form is-form_75" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="is-text_red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="e-btn is-btn_orange is-btn_d-block is-btn_50 mb4">
                    パスワード再設定用メールを送信
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
