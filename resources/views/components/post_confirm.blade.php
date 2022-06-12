<div class="col col-lg-8">

    <div class="e-heading2 mb-5 pl-3 is-heading_bdb-gray is-heading_color-gray">
        入力内容の確認
    </div>

    @if($page === 'create')
    <form action="{{ route('posts.store') }}" method="post">
    @elseif($page === 'edit')
    <form action="{{ route('posts.update',$post) }}" method="post">
    @endif
        @csrf
        <div class="px-4">

            <div class="pb-3">
                <div class="e-heading4 is-heading_bdb-gray is-heading_color-gray mb-1">
                    タイトル
                </div>
                <div class="ml-3">
                    {{ $inputs['title'] }}
                </div>
                <input name="title" value="{{ $inputs['title'] }}" type="hidden">
            </div>

            <div class="pb-3">
                <div class="e-heading4 is-heading_bdb-gray is-heading_color-gray mb-1">
                    カテゴリ
                </div>

                <div class="ml-3">
                    @if(empty($inputs['category_id']))
                    未設定
                    <input name="category_id" value="" type="hidden">
                    @else
                    {{ $category->category_name }}
                    <input name="category_id" value="{{ $inputs['category_id'] }}" type="hidden">
                    @endif
                </div>
            </div>

            <div class="pb-3">
                <div class="e-heading4 is-heading_bdb-gray is-heading_color-gray mb-1">
                    Describe ... 問題や葛藤を描写
                </div>
                <div class="pl-3">
                    @if(empty($inputs['describe']))
                        未設定
                    @else
                        {!! nl2br(e($inputs['describe'])) !!}
                    @endif
                </div>
                <input name="describe" value="{{ $inputs['describe'] }}" type="hidden">
            </div>

            <div class="pb-3">
                <div class="e-heading4 is-heading_bdb-gray is-heading_color-gray mb-1">
                    Explain ... 自分の気持ちを説明
                </div>
                <div class="pl-3">
                    @if(empty($inputs['explain']))
                        未設定
                    @else
                        {!! nl2br(e($inputs['explain'])) !!}
                    @endif
                </div>
                <input name="explain" value="{{ $inputs['explain'] }}" type="hidden">
            </div>

            <div class="pb-3">
                <div class="e-heading4 is-heading_bdb-gray is-heading_color-gray mb-1">
                    Specify ... 具体的な提案
                </div>
                <div class="pl-3">
                    @if(empty($inputs['specify']))
                        未設定
                    @else
                        {!! nl2br(e($inputs['specify'])) !!}
                    @endif
                </div>
                <input name="specify" value="{{ $inputs['specify'] }}" type="hidden">
            </div>

            <div class="pb-3">
                <div class="e-heading4 is-heading_bdb-gray is-heading_color-gray mb-1">
                    Choose ... イエスに対する回答
                </div>
                <div class="pl-3">
                    @if(empty($inputs['choose_yes']))
                        未設定
                    @else
                        {!! nl2br(e($inputs['choose_yes'])) !!}
                    @endif
                </div>
                <input name="choose_yes" value="{{ $inputs['choose_yes'] }}" type="hidden">
            </div>

            <div class="pb-3">
                <div class="e-heading4 is-heading_bdb-gray is-heading_color-gray mb-1">
                    Choose ... 想定される否定的な返答
                </div>
                <div class="pl-3">
                    @if(empty($inputs['choose_no_reply']))
                        未設定
                    @else
                        {!! nl2br(e($inputs['choose_no_reply'])) !!}
                    @endif
                </div>
                <input name="choose_no_reply" value="{{ $inputs['choose_no_reply'] }}" type="hidden">
            </div>

            <div class="pb-3">
                <div class="e-heading4 is-heading_bdb-gray is-heading_color-gray mb-1">
                    Choose ... 返答に対する回答
                </div>
                <div class="pl-3">
                    @if(empty($inputs['choose_no_answer']))
                        未設定
                    @else
                        {!! nl2br(e($inputs['choose_no_answer'])) !!}
                    @endif
                </div>
                <input name="choose_no_answer" value="{{ $inputs['choose_no_answer'] }}" type="hidden">
            </div>

            <div class="pb-3">
                <div class="e-heading4 is-heading_bdb-gray is-heading_color-gray mb-1">
                    Note ... その他メモ
                </div>
                <div class="pl-3">
                    @if(empty($inputs['note']))
                        未設定
                    @else
                        {!! nl2br(e($inputs['note'])) !!}
                    @endif
                </div>
                <input name="note" value="{{ $inputs['note'] }}" type="hidden">
            </div>

            <div class="mb-5">
                <div class="e-heading4 is-heading_bdb-gray is-heading_color-gray mb-1">
                    公開 or 非公開 or 下書き
                </div>
                <div class="pl-3">
                    @if($inputs['status'] == PostStatusType::PUBLISHED)
                    みんなに公開
                    @elseif($inputs['status'] == PostStatusType::SECRET)
                    非公開
                    @elseif($inputs['status'] == PostStatusType::DRAFT)
                    下書き
                    @endif
                </div>
                <input name="status" value="{{ $inputs['status'] }}" type="hidden">
            </div>

            <div class="mb-4">
                @if($page === 'create')
                    以上の内容で投稿します（投稿後に編集可能です）
                @elseif($page === 'edit')
                    以上の内容で修正します。
                @endif
            </div>

            <div class="d-flex align-items-center mb-4">
                <button type="submit" class="e-btn is-btn_orange">
                    @if($page === 'create')
                        投稿する
                    @elseif($page === 'edit')
                        修正する
                    @endif
                </button>
                <button type="button" onClick="history.back()" class="e-btn is-btn_link ml-3">入力画面に戻る</button>
            </div>
        </div>
    </form>
</div>
