@extends('layouts.app')

@section('content')

<div class="is-container-column">
    <div class="l-container_primary">

        <div class="e-heading2 mb50 pl16 is-heading_bdb-gray is-heading_color-gray">
            パスワード再設定
        </div>

        <div class="pl24">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb16">
                    <div class="c-form-group__primary">
                        <div class="c-form-group__title">メールアドレス</div>
                    </div>
                    <input id="email" type="email" class="e-form is-form_75" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="is-text_red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb16">
                    <div class="c-form-group__primary">
                        <div class="c-form-group__title">パスワード</div>
                    </div>
                    <input id="password" type="password" class="e-form is-form_75" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="is-text_red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb24">
                    <div class="c-form-group__primary">
                        <div class="c-form-group__title">パスワード（再確認）</div>
                    </div>
                    <input id="password-confirm" type="password" class="e-form is-form_75" name="password_confirmation" required autocomplete="new-password">
                </div>

                <button type="submit" class="e-btn is-btn_orange is-btn_d-block is-btn_50 mb4">
                    パスワードを再設定する
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
