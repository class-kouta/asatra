@guest
    <div class="col-3 mx-auto d-none d-lg-block">
        <div class="card p-3 " id="sidebar">
            <div class="d-flex align-items-center mb-4">
                <img src="/storage/user_img/9.jpeg" class="rounded-circle">
                    <div class="h4 ml-3">ゲスト</div>
            </div>

            <div class="ml-2">
                <div class="mb-3">
                    自分の投稿： - 件
                </div>
                <div class="mb-3">
                    いいねした投稿： - 件
                </div>
                <div class="mb-4">
                    書いたコメント： - 件
                </div>
                <a class="btn btn-primary mb-4" href="{{ route('login') }}">ログインして投稿</a>
            </div>
        </div>
    </div>
@else
    <div class="col-3 mx-auto d-none d-lg-block">
        <div class="card p-3" id="sidebar">
            <div class="d-flex align-items-center mb-4">
                <img src="/storage/user_img/{{ Auth::user()->sex }}.jpeg" class="rounded-circle">
                <div class="ml-3">
                    <div class="h4">{{ Auth::user()->name }}</div>
                    <div class="">
                        <div>
                            @if(Auth::user()->age === 0)
                                年代未設定
                            @else
                                {{ Auth::user()->age }} 代
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="ml-2">
                <div class="mb-3">
                    自分の投稿： <a class="" href="{{ route('profile.myposts') }}">{{ Auth::user()->post->count() }}</a> 件
                </div>
                <div class="mb-3">
                    いいねした投稿： <a class="" href="{{ route('profile.myniceposts') }}">{{ Auth::user()->joinNicesPosts()->count() }}</a> 件
                </div>
                <div class="mb-4">
                    書いたコメント： <a class="" href="{{ route('profile.mycommentposts') }}">{{ Auth::user()->joinCommentsPosts()->count() }}</a> 件
                </div>
                <a class="btn btn-primary mb-4" href="{{ route('posts.create') }}">投稿する</a>
            </div>

            <div class="ml-2">
                <a href="{{ route('profile.edit') }}">ユーザ情報の変更</a>
            </div>
        </div>
    </div>
@endguest
