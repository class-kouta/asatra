@foreach ($posts as $post)
    @if($post->user->sex === (string)1)
        <div class="d-flex align-items-center mt-5 border-bottom border-primary">
    @elseif($post->user->sex === (string)2)
        <div class="d-flex align-items-center mt-5 border-bottom border-danger">
    @else
        <div class="d-flex align-items-center mt-5 border-bottom border-dark">
    @endif

        @guest
            <span class="ml-3 h5 text-truncate"><a href="{{ route('posts.show_guest',$post) }}" class="text-reset">{{ $post->title }}</a></span>
        @else
            <span class="ml-3 h5 text-truncate"><a href="{{ route('posts.show',$post) }}" class="text-reset">{{ $post->title }}</a></span>
        @endguest

        @if(!isset($post->category->category_name))
            <span class="ml-3 h4"><span class="badge badge-secondary badge-pill font-weight-light">カテゴリ未設定</span></span>
        @else
            <span class="ml-3 h4"><a href="{{ route('top', ['category_id' =>  $post->category->id ])}}" class="badge badge-info badge-pill font-weight-light text-light">{{ $post->category->category_name }}</a></span>
        @endif

        @if($post->status === PostStatusType::SECRET)
            <div>非公開</div>
        @endif

    </div>

    <div>
        <ul class="ml-5 mb-2 p-0 w-75">
            <li class="list-unstyled mt-2">
                <div class="d-flex row">
                    <div class="col-2 text-secondary">
                        Describe
                    </div>
                    <div class="col-10 text-truncate">
                        {{ $post->describe }}
                    </div>
                </div>
            </li>
            <li class="list-unstyled mt-2">
                <div class="d-flex row">
                    <div class="col-2 text-secondary">
                        Explain
                    </div>
                    <div class="col-10 text-truncate">
                        {{ $post->explain }}
                    </div>
                </div>
            </li>
            <li class="list-unstyled mt-2">
                <div class="d-flex row">
                    <div class="col-2 text-secondary">
                        Specify
                    </div>
                    <div class="col-10 text-truncate">
                        {{ $post->specify }}
                    </div>
                </div>
            </li>
            @guest
                <li class="list-unstyled text-truncate mt-2"><a href="{{ route('posts.show_guest',$post) }}">...続きを読む</a></li>
            @else
                <li class="list-unstyled text-truncate mt-2"><a href="{{ route('posts.show',$post) }}">...続きを読む</a></li>
            @endguest
        </ul>

        <div class="d-flex">
            <div class="ml-3">
                いいね：{{ $post->nices->count() }}
            </div>
            <div class="ml-3">
                コメント：{{ $post->comments->count() }}
            </div>
            @if($post->created_at)
                <div class="ml-4 text-secondary">
                    {{ $post->created_at->format('Y/n/j H:i') }}
                </div>
            @endif
        </div>
    </div>

@endforeach
