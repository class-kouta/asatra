@extends('layouts.app')

@section('content')
<div class="is-container-column">
    <div class="l-container_primary">

        <div class="e-heading2 mb50 pl16 is-heading_bdb-gray is-heading_color-gray">
            新規登録
        </div>

        <div class="pl24">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb16">
                    <div class="c-form-group__primary">
                        <div class="c-form-group__title">名前</div>
                    </div>
                    <input id="name" type="text" class="e-form is-form_75" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="is-text_red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb16">
                    <div class="c-form-group__primary">
                        <div class="c-form-group__title">メールアドレス</div>
                    </div>
                    <input id="email" type="email" class="e-form is-form_75" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="is-text_red" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb16">
                    <div class="c-form-group__primary">
                        <div class="c-form-group__title">性別</div>
                    </div>
                    <select name="sex" class="e-form is-form_50">
                        <option value="9">回答しない</option>
                        <option value="1">男性</option>
                        <option value="2">女性</option>
                    </select>
                </div>


                <div class="mb16">
                    <div class="c-form-group__primary">
                        <div class="c-form-group__title">年齢</div>
                    </div>
                    <select name="age" class="e-form is-form_50">
                        <option value="0">回答しない</option>
                        <option value="10">10代</option>
                        <option value="20">20代</option>
                        <option value="30">30代</option>
                        <option value="40">40代</option>
                        <option value="50">50代</option>
                        <option value="60">60代〜</option>
                    </select>
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
                    新規登録
                </button>
                <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="e-btn is-btn_red is-btn_d-block is-btn_50">
                    Googleで登録
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
