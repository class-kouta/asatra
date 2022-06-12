<div class="col col-lg-8" id="content">

    <div class="e-heading2 mb-5 pl-3 is-heading_bdb-gray is-heading_color-gray">
    @if($page === 'create')
        伝えたいことをアサーティブに整理しよう！
    @elseif($page === 'edit')
        投稿内容の編集
    @endif
    </div>

    <form action="{{ $page === 'create' ? route('posts.create_confirm') : route('posts.edit_confirm',$post)}}" method="post">
        @csrf
        {{-- タイトル --}}
        <div class="mb-4 px-4">
            <div class="c-form-group__primary">
                <div class="c-form-group__title">タイトル</div>
                <div class="c-form-group__required">［必須］</div>
                <button class="e-btn is-btn_sm is-btn_outline-blue ml-1" type="button" data-toggle="collapse" data-target="#collapseTitleExample" aria-expanded="false" aria-controls="collapseTitleExample">
                    例
                </button>
            </div>
            @error('title')
                <div class="is-text_red mb-2">{{ $message }}</div>
            @enderror
            <div class="collapse" id="collapseTitleExample">
                <div class="c-card is-card_bd-blue my-1">
                    <div class="c-card__body p-2">
                        子育てに協力してほしい。
                    </div>
                </div>
            </div>
            <input type="text" name="title" class="e-form" value="{{ old('title', optional($post)->title) }}">
        </div>

        {{-- カテゴリー --}}
        <div class="col-6 mb-4 px-4">
            <div class="c-form-group__primary">
                <div class="c-form-group__title">カテゴリ</div>
            </div>
            <select name="category_id" class="e-form">
                <option class="e-form" value="">未選択</option>
                @foreach($categories as $id => $category_name)
                    <option value="{{ $id }}" @if(optional($post)->category_id == $id) selected @endif>
                        {{ $category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- 共通のコツ --}}
        <div class="mb-4 pl-4">
            <button class="e-btn is-btn_outline-orange" type="button" data-toggle="collapse" data-target="#collapseCommonTricks" aria-expanded="false" aria-controls="collapseCommonTricks">
                共通のコツ
            </button>
            <div class="collapse" id="collapseCommonTricks">
                <div class="c-card is-card_bd-orange my-1">
                    <div class="c-card__header is-card__header_bg-orange p-2">
                        （可能であれば）相手への共感も示しましょう。
                    </div>
                    <div class="c-card__body">
                        　共感されると、相手は自分の意見を受け入れやすくなります。<br>
                        「あなたの気持ちも分かる」<br>
                        「面倒くさい気持ちも分かる」<br>
                        「あなたが仕事で疲れているのも分かる」etc...<br>
                    </div>
                    <div class="c-card__header is-card__header_bg-orange">
                        「私は」を主語にしましょう。
                    </div>
                    <div class="c-card__body">
                        「あなたは」を主語にすると攻撃的になりやすいです。<br>
                        「あなたはいつも...」「どうしてあなたは...」etc...
                    </div>
                    <div class="c-card__header is-card__header_bg-orange">
                        次のような表現は攻撃的になりやすいので控えましょう。
                    </div>
                    <div class="c-card__body">
                        「どうして」「なんで」「いつも」「あなたは」etc...
                    </div>
                </div>
            </div>
        </div>

        {{-- Describe --}}
        <div class="mb-4 px-4">
            <div class="c-form-group__primary">
                <div class="c-form-group__title">Describe ... 問題や葛藤を描写</div>
                <div class="c-form-group__required">［必須］</div>
                <button class="e-btn is-btn_sm is-btn_outline-orange ml-1" type="button" data-toggle="collapse" data-target="#collapseDescribeTricks" aria-expanded="false" aria-controls="collapseDescribeTricks">
                    コツ
                </button>
                <button class="e-btn is-btn_sm is-btn_outline-blue ml-1" type="button" data-toggle="collapse" data-target="#collapseDescribeExample" aria-expanded="false" aria-controls="collapseDescribeExample">
                    例
                </button>
            </div>
            @error('describe')
                <div class="is-text_red mb-2">{{ $message }}</div>
            @enderror
            <div class="collapse" id="collapseDescribeTricks">
                <div class="c-card is-card_bd-orange my-1">
                    <div class="c-card__header is-card__header_bg-orange">
                        何の話か<span class="is-text_red">具体的</span>に伝えましょう。
                    </div>
                    <div class="c-card__body">
                        具体性に欠けると、何の話をしたいのか相手に伝わりづらくなります。
                    </div>
                </div>
            </div>
            <div class="collapse" id="collapseDescribeExample">
                <div class="c-card is-card_bd-blue my-1">
                    <div class="c-card__body p-2">
                        「赤ちゃんのお世話のことなんだけど，育休後も、赤ちゃんのおむつを替えたり、ミルクをあげたり、あやしたり、お世話は私がやっているでしょう。」
                    </div>
                </div>
            </div>
            <textarea name="describe" class="e-form mb-2" rows="3">{{ old('describe', optional($post)->describe) }}</textarea>
        </div>

        {{-- Explain --}}
        <div class="mb-4 px-4">
            <div class="c-form-group__primary">
                <div class="c-form-group__title">Explain ... 自分の気持ちを説明</div>
                <div class="c-form-group__required">［必須］</div>
                <button class="e-btn is-btn_sm is-btn_outline-orange ml-1" type="button" data-toggle="collapse" data-target="#collapseExplainTricks" aria-expanded="false" aria-controls="collapseExplainTricks">
                    コツ
                </button>
                <button class="e-btn is-btn_sm is-btn_outline-blue ml-1" type="button" data-toggle="collapse" data-target="#collapseExplainExample" aria-expanded="false" aria-controls="collapseExplainExample">
                    例
                </button>
            </div>
            @error('explain')
            <div class="is-text_red mb-2">{{ $message }}</div>
            @enderror
            <div class="collapse" id="collapseExplainTricks">
                <div class="c-card is-card_bd-orange my-1">
                    <div class="c-card__header is-card__header_bg-orange">
                        自分の<span class="is-text_red">主観的</span>な気持ちを、<span class="is-text_red">率直</span>に伝えましょう。
                    </div>
                    <div class="c-card__body">
                        遠慮して遠回しな表現を使うと、相手に自分の気持ちが伝わりづらいです。<br>
                        気持ちをぶつけすぎると、相手も反発してきやすいので注意しましょう。
                    </div>
                </div>
            </div>
            <div class="collapse" id="collapseExplainExample">
                <div class="c-card is-card_bd-blue my-1">
                    <div class="c-card__body p-2">
                        「育休期間はそれでも良かったけど、仕事に復帰してからは正直体力的にきついんだよね。仕事後も土日も赤ちゃんのお世話で自分の時間が取れなくて、疲れがたまる一方。少しでいいから休む時間が欲しいんだ。」
                    </div>
                </div>
            </div>
            <textarea name="explain" class="e-form mb-2" rows="3">{{ old('explain', optional($post)->explain) }}</textarea>
        </div>

        {{-- Specify --}}
        <div class="mb-4 px-4">
            <div class="c-form-group__primary">
                <div class="c-form-group__title">Specify ... 具体的な提案</div>
                <div class="c-form-group__required">［必須］</div>
                <button class="e-btn is-btn_sm is-btn_outline-orange ml-1" type="button" data-toggle="collapse" data-target="#collapseSpecifyTricks" aria-expanded="false" aria-controls="collapseSpecifyTricks">
                    コツ
                </button>
                <button class="e-btn is-btn_sm is-btn_outline-blue ml-1" type="button" data-toggle="collapse" data-target="#collapseSpecifyExample" aria-expanded="false" aria-controls="collapseSpecifyExample">
                    例
                </button>
            </div>
            @error('specify')
            <div class="is-text_red mb-2">{{ $message }}</div>
            @enderror
            <div class="collapse" id="collapseSpecifyTricks">
                <div class="c-card is-card_bd-orange my-1">
                    <div class="c-card__header is-card__header_bg-orange">
                        <span class="is-text_red">具体的</span>で<span class="is-text_red">現実的</span>な提案をしましょう。
                    </div>
                    <div class="c-card__body">
                        具体性に欠けると、相手はどうすればいいのか分からず困惑しやすいです。<br>
                        いきなり大きな提案や、一度にたくさんの提案をされると、実行が困難なので気をつけましょう。
                    </div>
                </div>
            </div>
            <div class="collapse" id="collapseSpecifyExample">
                <div class="c-card is-card_bd-blue my-1">
                    <div class="c-card__body p-2">
                        「あなたも仕事で疲れてると思うけど、土曜の午前中だけでいいから、赤ちゃんのお世話をお願いできないかな。」
                    </div>
                </div>
            </div>
            <textarea name="specify" class="e-form mb-2" rows="3">{{ old('specify', optional($post)->specify) }}</textarea>
        </div>

        {{-- Choose Yes--}}
        <div class="mb-4 px-4">
            <div class="c-form-group__primary">
                <div class="c-form-group__title">Choose ... イエスに対する回答</div>
                <button class="e-btn is-btn_sm is-btn_outline-orange ml-2" type="button" data-toggle="collapse" data-target="#collapseChooseYesTricks" aria-expanded="false" aria-controls="collapseChooseYesTricks">
                    コツ
                </button>
                <button class="e-btn is-btn_sm is-btn_outline-blue ml-1" type="button" data-toggle="collapse" data-target="#collapseChooseYesExample" aria-expanded="false" aria-controls="collapseChooseYesExample">
                    例
                </button>
            </div>
            @error('choose_yes')
            <div class="is-text_red">{{ $message }}</div>
            @enderror
            <div class="collapse" id="collapseChooseYesTricks">
                <div class="c-card is-card_bd-orange my-1">
                    <div class="c-card__body">
                        提案を受け入れてくれたことに<span class="is-text_red">感謝</span>を示しましょう。
                    </div>
                </div>
            </div>
            <div class="collapse" id="collapseChooseYesExample">
                <div class="c-card is-card_bd-blue my-1">
                    <div class="c-card__body p-2">
                        「ありがとう。休める時間ができてうれしい。分からないことがあったらなんでも聞いてくれていいから。」
                    </div>
                </div>
            </div>
            <textarea name="choose_yes" class="e-form mb-2" rows="2">{{ old('choose_yes', optional($post)->choose_yes) }}</textarea>
        </div>

        {{-- Choose No Reply--}}
        <div class="mb-4 px-4">
            <div class="c-form-group__primary">
                <div class="c-form-group__title">Choose ... 想定される否定的な返答</div>
                <button class="e-btn is-btn_sm is-btn_outline-blue ml-1" type="button" data-toggle="collapse" data-target="#collapseChooseNoReplyExample" aria-expanded="false" aria-controls="collapseChooseNoReplyExample">
                    例
                </button>
            </div>
            @error('choose_no_reply')
            <div class="is-text_red">{{ $message }}</div>
            @enderror
            <div class="collapse" id="collapseChooseNoReplyExample">
                <div class="c-card is-card_bd-blue my-1">
                    <div class="c-card__body p-2">
                        「俺も疲れてるんだけどなあ。」
                    </div>
                </div>
            </div>
            <textarea name="choose_no_reply" class="e-form mb-2" rows="1">{{ old('choose_no_reply', optional($post)->choose_no_reply ) }}</textarea>
        </div>

        {{-- Choose No Answer--}}
        <div class="mb-4 px-4">
            <div class="c-form-group__primary">
                <div class="c-form-group__title">Choose ... 返答に対する回答</div>
                <button class="e-btn is-btn_sm is-btn_outline-orange ml-2" type="button" data-toggle="collapse" data-target="#collapseChooseNoAnswerTricks" aria-expanded="false" aria-controls="collapseChooseNoAnswerTricks">
                    コツ
                </button>
                <button class="e-btn is-btn_sm is-btn_outline-blue ml-1" type="button" data-toggle="collapse" data-target="#collapseChooseNoAnswerExample" aria-expanded="false" aria-controls="collapseChooseNoAnswerExample">
                    例
                </button>
            </div>
            @error('choose_no_answer')
            <div class="is-text_red">{{ $message }}</div>
            @enderror
            <div class="collapse" id="collapseChooseNoAnswerTricks">
                <div class="c-card is-card_bd-orange my-1">
                    <div class="c-card__body">
                        相手への共感を示したり、提案のレベルを下げたりしながら、再度提案しましょう。
                    </div>
                </div>
            </div>
            <div class="collapse" id="collapseChooseNoAnswerExample">
                <div class="c-card is-card_bd-blue my-1">
                    <div class="c-card__body p-2">
                        「あなたも仕事で疲れているのは分かるけど、それは私も一緒なの。土曜の午前中じゃなくてもいいから、協力してもらえないかな。」
                    </div>
                </div>
            </div>
            <textarea name="choose_no_answer" class="e-form mb-2" rows="2">{{ old('choose_no_answer', optional($post)->choose_no_answer) }}</textarea>
        </div>

        {{-- Note --}}
        <div class="mb-4 px-4">
            <div class="c-form-group__primary">
                <div class="c-form-group__title">Note ... その他メモ</div>
            </div>
            @error('note')
            <div class="is-text_red">{{ $message }}</div>
            @enderror
            <textarea name="note" class="e-form" rows="3">{{ old('note', optional($post)->note) }}</textarea>
        </div>

        {{-- 非公開設定 --}}
        <div class="col-6 mb-4 px-4">
            <div class="c-form-group__primary">
                <div class="c-form-group__title">公開 or 非公開 or 下書き</div>
            </div>
            <select name="status" id="" class="e-form">
                <option value="{{ PostStatusType::PUBLISHED }}">公開</option>
                <option value="{{ PostStatusType::SECRET }}">非公開</option>
                <option value="{{ PostStatusType::DRAFT }}">下書き</option>
            </select>
        </div>

        <button type="submit" class="e-btn is-btn_blue mb-4 mx-4">入力内容確認</button>

    </form>
</div>
