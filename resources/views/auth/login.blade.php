@extends('layouts.app')

@section('content')
<div class="is-container-column">
    <div class="l-container_primary">

        <div class="e-heading2 mb50 pl16 is-heading_bdb-gray is-heading_color-gray">
            ログイン
        </div>

        <div class="pl24">
            <form method="POST" action="{{ route('login') }}">
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

                <div class="mb8">
                    <div class="c-form-group__primary">
                        <div class="c-form-group__title">パスワード</div>
                    </div>
                    <input id="password" type="password" class="e-form is-form_75" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="is-text_red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        パスワードを忘れた方へ
                    </a>
                    @endif
                </div>

                <div class="form-check mb16">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <div class="form-check-label" for="remember">
                        ログイン状態を維持
                    </div>
                </div>

                <button type="submit" class="e-btn is-btn_orange is-btn_d-block is-btn_50 mb4">
                    ログイン
                </button>
                <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="e-btn is-btn_red is-btn_d-block is-btn_50 mb4">
                    Googleでログイン
                </a>
            </form>

            <div class="mt24">
                テストユーザー<br>
                メールアドレス：test@gmail.com<br>
                パスワード　　：test<br>
            </div>
            <div class="mt24">
                テストユーザー２<br>
                メールアドレス：test2@gmail.com<br>
                パスワード　　：test2<br>
            </div>
        </div>
    </div>
</div>
@endsection
