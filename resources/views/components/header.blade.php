<nav class="l-header__nav">
    <a class="l-header__nav__top" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="l-header__nav__icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="l-header__nav__contents ml-auto">
            <li><a class="l-header__nav__contents__link" href="{{ route('nopage') }}">アサーションとは</a></li>
            <li><a class="l-header__nav__contents__link" href="{{ route('nopage') }}">アサトレの使い方</a></li>
            <li><a class="l-header__nav__contents__link" href="{{ route('nopage') }}">おすすめの書籍</a></li>
            <li><a class="l-header__nav__contents__link" href="{{ route('nopage') }}">ブログ</a></li>
            <li><a class="l-header__nav__contents__link" href="{{ route('top') }}">みんなの投稿</a></li>
            @guest
                <li><a class="l-header__nav__contents__link" href="{{ route('login') }}">ログイン</a></li>
                <li><a class="l-header__nav__contents__link" href="{{ route('register') }}">新規登録</a></li>
            @else
                <li class="dropdown">
                    <a class="l-header__nav__contents__link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">ユーザ情報の変更</a>
                        <a class="dropdown-item" href="{{ route('posts.create') }}">投稿する</a>
                        <a class="dropdown-item" href="{{ route('profile.myposts',PostListType::MY_DRAFT) }}">下書きリスト</a>
                        <a class="dropdown-item" href="{{ route('profile.myposts',PostListType::MY_POST) }}">自分の投稿</a>
                        <a class="dropdown-item" href="{{ route('profile.myposts', PostListType::MY_NICE) }}">いいねした投稿</a>
                        <a class="dropdown-item" href="{{ route('profile.myposts',PostListType::MY_COMMENT) }}">コメントした投稿</a>
                    </div>
                </li>
                <li>
                    <a class="l-header__nav__contents__link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    ログアウト
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</nav>
