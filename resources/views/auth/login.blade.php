@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="e-heading2 mb-5 pl-3 is-heading_bdb-gray is-heading_color-gray">
                ログイン
            </div>

            <div class="pl-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <div class="c-form-group__primary">
                            <div class="c-form-group__title">メールアドレス</div>
                        </div>
                        <input id="email" type="email" class="e-form w-50 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <div class="c-form-group__primary">
                            <div class="c-form-group__title">パスワード</div>
                        </div>
                        <input id="password" type="password" class="e-form w-50 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            パスワードを忘れた方へ
                        </a>
                        @endif
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <div class="form-check-label" for="remember">
                            ログイン状態を維持
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column mb-5 p-0">
                        <button type="submit" class="e-btn is-btn_orange mb-1">
                            ログイン
                        </button>
                        <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="e-btn is-btn_red mb-1">
                            Googleでログイン
                        </a>
                    </div>
                </form>

                <div>
                    テストユーザー<br>
                    メールアドレス：test@gmail.com<br>
                    パスワード　　：test<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
