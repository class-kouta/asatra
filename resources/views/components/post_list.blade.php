@foreach ($posts as $post)

<div class="c-post-list">

    @if($post->status === PostStatusType::SECRET)
    <span class="c-post-list__header__secret">【非公開】</span>
    @endif

    @if($post->user->sex === UserSexType::MALE)
    <div class="c-post-list__header is-post-list__header_male">
    @elseif($post->user->sex === UserSexType::FEMALE)
    <div class="c-post-list__header is-post-list__header_female">
    @else
    <div class="c-post-list__header">
    @endif

        <span class="c-post-list__header__title">{{ $post->title }}</span>

        <span class="c-post-list__header__category">
            @if(!isset($post->category->category_name))
            <span class="e-tag is-tag_gray">カテゴリ未設定</span>
            @else
            <a href="{{ route('top', ['category_id' => $post->category->id ])}}" class="e-tag is-tag_orange">{{ $post->category->category_name }}</a>
            @endif
        </span>

    </div>

    <div class="c-post-list__body">
        @guest
        <a href="{{ route('posts.show_guest',$post) }}">
        @else
        <a href="{{ route('posts.show',$post) }}">
        @endguest
            <ul>
                <li>
                    <div class="c-post-list__body__subtitle">
                        Describe
                    </div>
                    <div class="c-post-list__body__text">
                        {{ $post->describe }}
                    </div>
                </li>
                <li>
                    <div class="c-post-list__body__subtitle">
                        Explain
                    </div>
                    <div class="c-post-list__body__text">
                        {{ $post->explain }}
                    </div>

                </li>
                <li>
                    <div class="c-post-list__body__subtitle">
                        Specify
                    </div>
                    <div class="c-post-list__body__text">
                        {{ $post->specify }}
                    </div>
                </li>
                <li>...続きを読む</li>
            </ul>
        </a>
    </div>

    <div class="c-post-list__footer">
        <div class="c-post-list__footer__nice">
            いいね：{{ $post->nices->count() }}
        </div>
        <div class="c-post-list__footer__comment">
            コメント：{{ $post->comments->count() }}
        </div>
        @if($post->created_at)
        <div class="c-post-list__footer__timestamp">
            {{ $post->created_at->format('Y/n/j H:i') }}
        </div>
        @endif
    </div>

</div>

@endforeach
