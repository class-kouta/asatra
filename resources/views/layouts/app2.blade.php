<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        <br><br>

        @guest
            <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
            @if (Route::has('register'))
                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @endif
        @else
            <p>{{ Auth::user()->name }}</p>
            <a href="{{ route('profile.edit') }}">プロフィール編集</a>
            <br>
            <a href="{{ route('posts.create') }}">追加</a>
            <br>
            <a href="{{ route('posts.myposts') }}">自分の投稿を見る</a>
            <br>
            <a href="{{ route('delete_confirm') }}">退会する</a>
            <br>

            <div aria-labelledby="navbarDropdown">
                <a  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

        @endguest
    <div class="container">

    <main class="py-4">
      @yield('content')
    </main>
</body>
</html>
