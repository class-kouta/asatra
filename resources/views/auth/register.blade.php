@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="text-secondary border-bottom pl-3 pb-1 mb-5 h5">
                新規登録
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- 名前の入力欄 --}}
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">ニックネーム</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- メールの入力欄 --}}
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                {{-- 性別の入力欄 --}}
                <div class="form-group row mb-2">
                    <label for="sex" class="col-md-4 col-form-label text-md-right">性別</label>
                    <div class="col-md-6" style="padding-top: 8px">
                        <select name="sex" class="">
                            <option value="9">回答しない</option>
                            <option value="1">男性</option>
                            <option value="2">女性</option>
                        </select>
                    </div>
                </div>

                {{-- 年代の入力欄 --}}
                <div class="form-group row mb-3">
                    <label for="age" class="col-md-4 col-form-label text-md-right">年齢</label>
                    <div class="col-md-6" style="padding-top: 8px">
                        <select name="age" class="">
                            <option value="0">回答しない</option>
                            <option value="10">10代</option>
                            <option value="20">20代</option>
                            <option value="30">30代</option>
                            <option value="40">40代</option>
                            <option value="50">50代</option>
                            <option value="60">60代〜</option>
                        </select>
                    </div>
                </div>

                {{-- パスワードの入力欄 --}}
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- パスワード二回目の入力欄 --}}
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード（再確認）</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            新規登録
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
