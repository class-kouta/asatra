<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand text-secondary" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('nopage') }}">アサーションとは</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('nopage') }}">アサトレの使い方</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('nopage') }}">おすすめの書籍</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('nopage') }}">ブログ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('top') }}">みんなの投稿</a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">新規登録</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
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
