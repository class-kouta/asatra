@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8" id="content">

            <div class="text-secondary border-bottom pl-3 pb-1 mb-4 h5">
                伝えたいことをアサーティブに整理しよう！
            </div>

            <form action="{{ route('posts.create_confirm') }}" method="post">
                @csrf
                    {{-- タイトル・カテゴリ --}}
                    <div class="d-flex mb-4 px-4 row">
                        <div class="form-group col-8 mb-0">
                            <div class="d-flex align-items-center mb-1">
                                <div class="text-secondary">タイトル</div>
                                <div class="">［必須］</div>
                                <button class="btn btn-sm btn-outline-info ml-1" type="button" data-toggle="collapse" data-target="#collapseTitleExample" aria-expanded="false" aria-controls="collapseTitleExample">
                                    例
                                </button>
                            </div>
                            @error('title')
                                <div class="text-danger mb-2">{{ $message }}</div>
                            @enderror
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            <div class="collapse" id="collapseTitleExample">
                                <div class="card mt-1">
                                    <div class="card-header p-2">
                                        【 例 】
                                    </div>
                                    <div class="card-body p-2">
                                        子育てに協力してほしい。
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-4 mb-0">
                            <div class="text-secondary mb-2">カテゴリ</div>
                            <select name="categoryId" class="form-control">
                                <option class="form-control" value="">未選択</option>
                                @foreach($categories as $id => $category_name)
                                    <option value="{{ $id }}">
                                        {{ $category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Describe --}}
                    <div class="form-group mb-4 px-4">
                        <div class="d-flex align-items-center mb-1">
                            <div class="text-secondary">Describe ... 問題や葛藤を描写</div>
                            <div class="">［必須］</div>
                            <button class="btn btn-sm btn-outline-info ml-1" type="button" data-toggle="collapse" data-target="#collapseDescribeTricks" aria-expanded="false" aria-controls="collapseDescribeTricks">
                                コツ
                            </button>
                            <button class="btn btn-sm btn-outline-info ml-1" type="button" data-toggle="collapse" data-target="#collapseDescribeExample" aria-expanded="false" aria-controls="collapseDescribeExample">
                                例
                            </button>
                        </div>
                        @error('describe')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror
                        <textarea name="describe" class="form-control mb-2" rows="3">{{ old('describe') }}</textarea>
                        <div class="collapse" id="collapseDescribeTricks">
                            <div class="card mt-1">
                                <div class="card-header p-2">
                                    【 コツ 】
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        何の話か<span class="text-danger">具体的</span>に伝えましょう。
                                    </li>
                                    <li class="list-group-item">
                                        具体性に欠けると、何の話をしたいのか相手に伝わりづらくなります。
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="collapse" id="collapseDescribeExample">
                            <div class="card mt-1">
                                <div class="card-header p-2">
                                    【 例 】
                                </div>
                                <div class="card-body p-2">
                                    <p class="card-text">
                                        「赤ちゃんのお世話のことなんだけど，育休後も、赤ちゃんのおむつを替えたり、ミルクをあげたり、あやしたり、お世話は私がやっているでしょう。」
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Explain --}}
                    <div class="form-group mb-4 px-4">
                        <div class="d-flex align-items-center mb-1">
                            <div class="text-secondary">Explain ... 自分の気持ちを説明</div>
                            <div class="">［必須］</div>
                            <button class="btn btn-sm btn-outline-info ml-1" type="button" data-toggle="collapse" data-target="#collapseExplainTricks" aria-expanded="false" aria-controls="collapseExplainTricks">
                                コツ
                            </button>
                            <button class="btn btn-sm btn-outline-info ml-1" type="button" data-toggle="collapse" data-target="#collapseExplainExample" aria-expanded="false" aria-controls="collapseExplainExample">
                                例
                            </button>
                        </div>
                        @error('explain')
                            <div class="text-danger  mb-2">{{ $message }}</div>
                        @enderror
                        <textarea name="explain" class="form-control mb-2" rows="3">{{ old('explain') }}</textarea>
                        <div class="collapse" id="collapseExplainTricks">
                            <div class="card mt-1">
                                <div class="card-header p-2">
                                    【 コツ 】
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        自分の<span class="text-danger">主観的</span>な気持ちを、<span class="text-danger">率直</span>に伝えましょう。
                                    </li>
                                    <li class="list-group-item">
                                        遠慮して遠回しな表現を使うと、相手に自分の気持ちが伝わりづらいです。
                                    </li>
                                    <li class="list-group-item">
                                        気持ちをぶつけすぎると、相手も反発してきやすいので注意しましょう。
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="collapse" id="collapseExplainExample">
                            <div class="card mt-1">
                                <div class="card-header p-2">
                                    【 例 】
                                </div>
                                <div class="card-body p-2">
                                    <p class="card-text">
                                        「育休期間はそれでも良かったけど、仕事に復帰してからは正直体力的にきついんだよね。仕事後も土日も赤ちゃんのお世話で自分の時間が取れなくて、疲れがたまる一方。少しでいいから休む時間が欲しいんだ。」
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Specify --}}
                    <div class="form-group mb-4 px-4">
                        <div class="d-flex align-items-center mb-1">
                            <div class="text-secondary">Specify ... 具体的な提案</div>
                            <div class="">［必須］</div>
                            <button class="btn btn-sm btn-outline-info ml-1" type="button" data-toggle="collapse" data-target="#collapseSpecifyTricks" aria-expanded="false" aria-controls="collapseSpecifyTricks">
                                コツ
                            </button>
                            <button class="btn btn-sm btn-outline-info ml-1" type="button" data-toggle="collapse" data-target="#collapseSpecifyExample" aria-expanded="false" aria-controls="collapseSpecifyExample">
                                例
                            </button>
                        </div>
                        @error('specify')
                            <div class="text-danger  mb-2">{{ $message }}</div>
                        @enderror
                        <textarea name="specify" class="form-control mb-2" rows="3">{{ old('specify') }}</textarea>
                        <div class="collapse" id="collapseSpecifyTricks">
                            <div class="card mt-1">
                                <div class="card-header p-2">
                                    【 コツ 】
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="text-danger">具体的</span>で<span class="text-danger">現実的</span>な提案をしましょう。
                                    </li>
                                    <li class="list-group-item">
                                        具体性に欠けると、相手はどうすればいいのか分からず困惑しやすいです。
                                    </li>
                                    <li class="list-group-item">
                                        いきなり大きな提案や、一度にたくさんの提案をされると、実行が困難なので気をつけましょう。
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="collapse" id="collapseSpecifyExample">
                            <div class="card mt-1">
                                <div class="card-header p-2">
                                    【 例 】
                                </div>
                                <div class="card-body p-2">
                                    <p class="card-text">
                                        「あなたも仕事で疲れてると思うけど、土曜の午前中だけでいいから、赤ちゃんのお世話をお願いできないかな。」
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Choose Yes--}}
                    <div class="form-group mb-4 px-4">
                        <div class="d-flex align-items-center mb-1">
                            <div class="text-secondary">Choose ... イエスに対する回答</div>
                            <button class="btn btn-sm btn-outline-info ml-2" type="button" data-toggle="collapse" data-target="#collapseChooseYesTricks" aria-expanded="false" aria-controls="collapseChooseYesTricks">
                                コツ
                            </button>
                            <button class="btn btn-sm btn-outline-info ml-1" type="button" data-toggle="collapse" data-target="#collapseChooseYesExample" aria-expanded="false" aria-controls="collapseChooseYesExample">
                                例
                            </button>
                            @error('choose_yes')
                                <div class="text-danger ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <textarea name="choose_yes" class="form-control mb-2" rows="2">{{ old('choose_yes') }}</textarea>
                        <div class="collapse" id="collapseChooseYesTricks">
                            <div class="card mt-1">
                                <div class="card-header p-2">
                                    【 コツ 】
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        提案を受け入れてくれたことに<span class="text-danger">感謝</span>を示しましょう。
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="collapse" id="collapseChooseYesExample">
                            <div class="card mt-1">
                                <div class="card-header p-2">
                                    【 例 】
                                </div>
                                <div class="card-body p-2">
                                    <p class="card-text">
                                        「ありがとう。休める時間ができてうれしい。分からないことがあったらなんでも聞いてくれていいから。」
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Choose No Reply--}}
                    <div class="form-group mb-4 px-4">
                        <div class="d-flex align-items-center mb-1">
                            <div class="text-secondary">Choose ... 想定される否定的な返答</div>
                            <button class="btn btn-sm btn-outline-info ml-1" type="button" data-toggle="collapse" data-target="#collapseChooseNoReplyExample" aria-expanded="false" aria-controls="collapseChooseNoReplyExample">
                                例
                            </button>
                            @error('choose_no_reply')
                                <div class="text-danger ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <textarea name="choose_no_reply" class="form-control mb-2" rows="1">{{ old('choose_no_reply') }}</textarea>

                        <div class="collapse" id="collapseChooseNoReplyExample">
                            <div class="card mt-1">
                                <div class="card-header p-2">
                                    【 例 】
                                </div>
                                <div class="card-body p-2">
                                    <p class="card-text">
                                        「俺も疲れてるんだけどなあ。」
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Choose No Answer--}}
                    <div class="form-group mb-4 px-4">
                        <div class="d-flex align-items-center mb-1">
                            <div class="text-secondary">Choose ... 返答に対する回答</div>
                            <button class="btn btn-sm btn-outline-info ml-2" type="button" data-toggle="collapse" data-target="#collapseChooseNoAnswerTricks" aria-expanded="false" aria-controls="collapseChooseNoAnswerTricks">
                                コツ
                            </button>
                            <button class="btn btn-sm btn-outline-info ml-1" type="button" data-toggle="collapse" data-target="#collapseChooseNoAnswerExample" aria-expanded="false" aria-controls="collapseChooseNoAnswerExample">
                                例
                            </button>
                            @error('choose_no_answer')
                                <div class="text-danger ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <textarea name="choose_no_answer" class="form-control mb-2" rows="2">{{ old('choose_no_answer') }}</textarea>
                        <div class="collapse" id="collapseChooseNoAnswerTricks">
                            <div class="card mt-1">
                                <div class="card-header p-2">
                                    【 コツ 】
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        相手への共感を示したり、提案のレベルを下げたりしながら、再度提案しましょう。
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="collapse" id="collapseChooseNoAnswerExample">
                            <div class="card mt-1">
                                <div class="card-header p-2">
                                    【 例 】
                                </div>
                                <div class="card-body p-2">
                                    <p class="card-text">
                                        「あなたも仕事で疲れているのは分かるけど、それは私も一緒なの。土曜の午前中じゃなくてもいいから、協力してもらえないかな。」
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Note --}}
                    <div class="form-group mb-4 px-4">
                        <div class="d-flex align-items-center mb-1">
                            <div class="text-secondary">Note ... その他メモ</div>
                            @error('note')
                                <div class="text-danger ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <textarea name="note" class="form-control" rows="3">{{ old('note') }}</textarea>
                    </div>


                    {{-- 共通のコツ --}}
                    <div class="mb-4 pl-4">
                        <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseCommonTricks" aria-expanded="false" aria-controls="collapseCommonTricks">
                            共通のコツ
                        </button>
                        <div class="collapse" id="collapseCommonTricks">
                            <div class="card mt-1">
                                <div class="card-header p-2">
                                    （可能であれば）相手への共感も示しましょう。
                                </div>
                                <div class="card-body p-2">
                                    <p class="card-text">
                                        共感されると、相手は自分の意見を受け入れやすくなります。
                                    </p>
                                </div>
                                <div class="card-body p-2">
                                    <p class="card-text">
                                        【 例 】<br>
                                        「あなたの気持ちも分かる」<br>
                                        「面倒くさい気持ちも分かる」<br>
                                        「あなたが仕事で疲れているのも分かる」etc...<br>
                                    </p>
                                </div>
                                <div class="card-header p-2">
                                    「私は」を主語にしましょう。
                                </div>
                                <div class="card-body p-2">
                                    <p class="card-text">
                                        「あなたは」を主語にすると攻撃的になりやすいです。
                                    </p>
                                </div>
                                <div class="card-body p-2">
                                    <p class="card-text">
                                        【 例 】<br>
                                        「あなたはいつも...」「どうしてあなたは...」etc...<br>
                                    </p>
                                </div>
                                <div class="card-header p-2">
                                    次のような表現は攻撃的になりやすいので控えましょう。
                                </div>
                                <div class="card-body p-2">
                                    <p class="card-text">
                                        【 例 】<br>
                                        「どうして」「なんで」「いつも」「あなたは」etc...
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mb-4 mx-4">入力内容確認</button>

            </form>
        </div>

        @component('components.profilebar')
        @endcomponent

    </div>
</div>
@endsection
