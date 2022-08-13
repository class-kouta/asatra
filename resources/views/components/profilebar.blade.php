@guest
<div class="l-container_secondary">
    <div class="c-profilebar">

    <div class="c-profilebar__card">
        <div class="c-user-status">
            <img src="/storage/user_img/9.jpeg" class="c-user-status__img">
            <div class="c-user-status__name">ゲスト</div>
        </div>

        <ul>
            <li>
                自分の投稿： - 件
            </li>
            <li>
                いいねした投稿： - 件
            </li>
            <li>
                書いたコメント： - 件
            </li>
        </ul>

        <a class="e-btn is-btn_orange" href="{{ route('login') }}">ログイン</a>
    </div>
</div>
@else
<div class="l-container_secondary">
    <div class="c-profilebar">
    <div class="c-profilebar__card">
        <div class="c-user-status">
            <img src="/storage/user_img/{{ Auth::user()->sex }}.jpeg" class="c-user-status__img">
            <div>
                <div class="c-user-status__name">{{ Auth::user()->name }}</div>
                <div class="c-user-status__age">
                    @if(Auth::user()->age === 0)
                        年代未設定
                    @else
                        {{ Auth::user()->age }} 代
                    @endif
                </div>
            </div>
        </div>

        <ul>
            <li>
                自分の投稿　　： <a href="{{ route('profile.myposts', PostListType::MY_POST) }}">{{ User::getPostsCountExceptDraft() }}</a> 件
            </li>
            <li>
                いいねした投稿： <a href="{{ route('profile.myposts',PostListType::MY_NICE) }}">{{ Auth::user()->joinNicesPosts()->count() }}</a> 件
            </li>
            <li>
                書いたコメント： <a href="{{ route('profile.myposts', PostListType::MY_COMMENT) }}">{{ Auth::user()->joinCommentsPosts()->count() }}</a> 件
            </li>
            <li>
                下書き　　　　： <a href="{{ route('profile.myposts', PostListType::MY_DRAFT) }}">{{ User::getPostsCountDraft() }}</a> 件
            </li>
            <li>
                通知　　　　　： <a href="{{ route('profile.notifications') }}">{{ User::getNotificationsCount() }}</a> 件
            </li>
            <li>
                <a href="{{ route('profile.edit') }}">ユーザ情報の変更</a>
            </li>
        </ul>

        <a class="e-btn is-btn_orange" href="{{ route('posts.create') }}">投稿する</a>
    </div>
</div>
@endguest
