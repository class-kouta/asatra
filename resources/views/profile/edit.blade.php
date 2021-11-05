@extends('layouts.app2')

@section('content')
<div class="container">
    <form action="{{ route('profile.update') }}" method="post">
    @csrf
        ニックネーム<br>
        <input type="text" name="name" value="{{ Auth::user()->name }}"><br>
        @error('name')
        <div class="error">{{ $message }}</div>
        @enderror
        <br>

        メールアドレス<br>
        <input type="email" name="email" value="{{ Auth::user()->email }}"><br>
        @error('email')
        <div class="error">{{ $message }}</div>
        @enderror
        <br>

        性別<br>
        <select name="sex" class="form-select">
            <option value="9" {{ Auth::user()->sex === '9' ? 'selected' : '' }}>回答しない</option>
            <option value="1" {{ Auth::user()->sex === '1' ? 'selected' : '' }}>男性</option>
            <option value="2" {{ Auth::user()->sex === '2' ? 'selected' : '' }}>女性</option>
        </select>
        <br>
        @error('sex')
        <div class="error">{{ $message }}</div>
        @enderror
        <br>

        年代<br>
        <select name="age" class="form-select">
            <option value="0" {{ Auth::user()->age === 0 ? 'selected' : '' }}>回答しない</option>
            <option value="10" {{ Auth::user()->age === 10 ? 'selected' : '' }}>10代</option>
            <option value="20" {{ Auth::user()->age === 20 ? 'selected' : '' }}>20代</option>
            <option value="30" {{ Auth::user()->age === 30 ? 'selected' : '' }}>30代</option>
            <option value="40" {{ Auth::user()->age === 40 ? 'selected' : '' }}>40代</option>
            <option value="50" {{ Auth::user()->age === 50 ? 'selected' : '' }}>50代</option>
            <option value="60" {{ Auth::user()->age === 60 ? 'selected' : '' }}>60代〜</option>
        </select>
        <br><br>
        @error('age')
        <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">更新</button>

    </form>
</div>
@endsection
