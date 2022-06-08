@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8" id="content">

            <div class="e-heading2 mb-5 pl-3 is-heading_bdb-gray is-heading_color-gray">
                ユーザ情報の変更
            </div>

            <div class="ml-4 mb-5">
                <form action="{{ route('profile.update') }}" method="post" class="">
                @csrf
                    <div class="mb-3">
                        <div class="c-form-group__primary">
                            <div class="c-form-group__title">ユーザ名</div>
                        </div>
                        @error('name')
                        <div class="is-text_red">{{ $message }}</div>
                        @enderror
                        <input type="text" name="name" class="e-form w-50" id="name" value="{{ Auth::user()->name }}">
                    </div>

                    {{-- 現在、Googleアカウントで登録したユーザーがメールアドレスを修正するとログインできなくなる仕様になっているため、一時コメントアウト --}}
                    {{-- <div class="mb-3">
                        <div class="c-form-group__primary">
                            <div class="c-form-group__title">メールアドレス</div>
                        </div>
                        @error('email')
                        <div class="is-text_red">{{ $message }}</div>
                        @enderror
                        <input type="email" name="email" class="e-form w-50" id="email" value="{{ Auth::user()->email }}">
                    </div> --}}

                    <div class="mb-3">
                        <div class="c-form-group__primary">
                            <div class="c-form-group__title">性別</div>
                        </div>
                        <select name="sex" id="sex" class="e-form col-4">
                            <option value="{{ UserSexType::NOT_APPLICABLE }}" {{ Auth::user()->sex === UserSexType::NOT_APPLICABLE ? 'selected' : '' }}>回答しない</option>
                            <option value="{{ UserSexType::MALE }}" {{ Auth::user()->sex === UserSexType::MALE ? 'selected' : '' }}>男性</option>
                            <option value="{{ UserSexType::FEMALE }}" {{ Auth::user()->sex === UserSexType::FEMALE ? 'selected' : '' }}>女性</option>
                        </select>
                        @error('sex')
                        <div class="is-text_red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="c-form-group__primary">
                            <div class="c-form-group__title">年代</div>
                        </div>
                        <select name="age" id="age" class="e-form col-4">
                            <option value="0" {{ Auth::user()->age === 0 ? 'selected' : '' }}>回答しない</option>
                            <option value="10" {{ Auth::user()->age === 10 ? 'selected' : '' }}>10代</option>
                            <option value="20" {{ Auth::user()->age === 20 ? 'selected' : '' }}>20代</option>
                            <option value="30" {{ Auth::user()->age === 30 ? 'selected' : '' }}>30代</option>
                            <option value="40" {{ Auth::user()->age === 40 ? 'selected' : '' }}>40代</option>
                            <option value="50" {{ Auth::user()->age === 50 ? 'selected' : '' }}>50代</option>
                            <option value="60" {{ Auth::user()->age === 60 ? 'selected' : '' }}>60代〜</option>
                        </select>
                        @error('age')
                        <div class="is-text_red">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="e-btn is-btn_orange">更新</button>

                </form>
            </div>

            <div class="ml-4">
                <a href="{{ '/profile/withdraw_confirm' }}">退会はコチラから</a>
            </div>
        </div>

        @component('components.profilebar')
        @endcomponent

    </div>
</div>
@endsection
