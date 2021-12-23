@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-lg-8">

            <div class="text-secondary border-bottom pl-3 pb-1 mb-4 h4">
                入力内容の確認
            </div>

            <form action="{{ route('posts.update',$post) }}" method="post">
                @csrf
                    <div class="mx-4">

                        <div class="mb-3">
                            <div class="mb-2 text-secondary border-bottom">
                                タイトル
                            </div>
                            <div class="ml-3">
                                {{ $inputs['title'] }}
                            </div>
                            <input name="title" value="{{ $inputs['title'] }}" type="hidden">
                        </div>

                        <div class="mb-3">
                            <div class="mb-2 text-secondary border-bottom">
                                カテゴリ
                            </div>
                            <div class="ml-3">
                                @if($inputs['categoryId'] == 1)
                                    結婚
                                    <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
                                @elseif($inputs['categoryId'] == 2)
                                    育児・家事
                                    <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
                                @elseif($inputs['categoryId'] == 3)
                                    お金
                                    <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
                                @elseif($inputs['categoryId'] == 4)
                                    人間関係
                                    <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
                                @elseif($inputs['categoryId'] == 5)
                                    性生活
                                    <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
                                @elseif($inputs['categoryId'] == 6)
                                    コミュニケーション
                                    <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
                                @elseif($inputs['categoryId'] == 7)
                                    習慣
                                    <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
                                @elseif($inputs['categoryId'] == 8)
                                    仕事
                                    <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
                                @elseif($inputs['categoryId'] == 9)
                                    健康
                                    <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
                                @elseif($inputs['categoryId'] == 10)
                                    モラハラ
                                    <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
                                @elseif($inputs['categoryId'] == 11)
                                    その他
                                    <input name="categoryId" value="{{ $inputs['categoryId'] }}" type="hidden">
                                @else
                                    未設定
                                    <input name="categoryId" value="" type="hidden">
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="mb-2 text-secondary border-bottom">
                                Describe ... 問題や葛藤を描写
                            </div>
                            <div class="ml-3">
                                {!! nl2br(e($inputs['describe'])) !!}
                            </div>
                            <input name="describe" value="{{ $inputs['describe'] }}" type="hidden">
                        </div>

                        <div class="mb-3">
                            <div class="mb-2 text-secondary border-bottom">
                                Explain ... 自分の気持ちを説明
                            </div>
                            <div class="ml-3">
                                {!! nl2br(e($inputs['explain'])) !!}
                            </div>
                            <input name="explain" value="{{ $inputs['explain'] }}" type="hidden">
                        </div>

                        <div class="mb-3">
                            <div class="mb-2 text-secondary border-bottom">
                                Specify ... 具体的な提案
                            </div>
                            <div class="ml-3">
                                {!! nl2br(e($inputs['specify'])) !!}
                            </div>
                            <input name="specify" value="{{ $inputs['specify'] }}" type="hidden">
                        </div>

                        <div class="mb-3">
                            <div class="mb-2 text-secondary border-bottom">
                                Choose ... イエスに対する回答
                            </div>
                            <div class="ml-3">
                                @if(empty($inputs['choose_yes']))
                                    未設定
                                @else
                                    {!! nl2br(e($inputs['choose_yes'])) !!}
                                @endif
                            </div>
                            <input name="choose_yes" value="{{ $inputs['choose_yes'] }}" type="hidden">
                        </div>

                        <div class="mb-3">
                            <div class="mb-2 text-secondary border-bottom">
                                Choose ... 想定される否定的な返答
                            </div>
                            <div class="ml-3">
                                @if(empty($inputs['choose_no_reply']))
                                    未設定
                                @else
                                    {!! nl2br(e($inputs['choose_no_reply'])) !!}
                                @endif
                            </div>
                            <input name="choose_no_reply" value="{{ $inputs['choose_no_reply'] }}" type="hidden">
                        </div>

                        <div class="mb-3">
                            <div class="mb-2 text-secondary border-bottom">
                                Choose ... 返答に対する回答
                            </div>
                            <div class="ml-3">
                                @if(empty($inputs['choose_no_answer']))
                                    未設定
                                @else
                                    {!! nl2br(e($inputs['choose_no_answer'])) !!}
                                @endif
                            </div>
                            <input name="choose_no_answer" value="{{ $inputs['choose_no_answer'] }}" type="hidden">
                        </div>

                        <div class="mb-5">
                            <div class="mb-2 text-secondary border-bottom">
                                Note ... その他メモ
                            </div>
                            <div class="ml-3">
                                @if(empty($inputs['note']))
                                    未設定
                                @else
                                    {!! nl2br(e($inputs['note'])) !!}
                                @endif
                            </div>
                            <input name="note" value="{{ $inputs['note'] }}" type="hidden">
                        </div>

                        <div class="mb-4">
                            以上の内容で修正します。
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <button type="submit" class="btn btn-primary">修正する</button>
                            <button type="button" onClick="history.back()" class="btn btn-link ml-3">入力画面に戻る</button>
                        </div>
                </div>
            </form>
        </div>

        @component('components.profilebar')
        @endcomponent

    </div>
</div>
@endsection
