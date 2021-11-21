@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8" id="content">

            <div class="text-secondary border-bottom pl-3 pb-1 mb-4 h5">
                投稿内容の編集
            </div>

            <form action="{{ route('posts.edit_confirm',$post) }}" method="post">
                @csrf
                    {{-- タイトル・カテゴリ --}}
                    <div class="d-flex mb-4 px-4 row">
                        <div class="form-group col-8 mb-0">
                            <div class="d-flex">
                                <div class="text-secondary">タイトル</div>
                                <div class="">［必須］</div>
                                @error('title')
                                    <div class="text-danger ml-3">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                        </div>
                        <div class="form-group col-4 mb-0">
                            <div class="text-secondary">カテゴリ</div>
                            <select name="categoryId" class="form-control">
                                @if(!isset($post->category->id))
                                    <option class="form-control" value="" selected>未選択</option>
                                    <option class="form-control" value="1" >結婚</option>
                                    <option class="form-control" value="2" >育児・家事</option>
                                    <option class="form-control" value="3" >お金</option>
                                    <option class="form-control" value="4" >人間関係</option>
                                    <option class="form-control" value="5" >性生活</option>
                                    <option class="form-control" value="6" >コミュニケーション</option>
                                    <option class="form-control" value="7" >習慣</option>
                                    <option class="form-control" value="8" >仕事</option>
                                    <option class="form-control" value="9" >健康</option>
                                    <option class="form-control" value="10">モラハラ</option>
                                    <option class="form-control" value="11">その他</option>
                                @else
                                    <option class="form-control" value="">未選択</option>
                                    <option class="form-control" value="1" {{ $post->category->id == "1" ? 'selected' : '' }}>結婚</option>
                                    <option class="form-control" value="2" {{ $post->category->id == "2" ? 'selected' : '' }}>育児・家事</option>
                                    <option class="form-control" value="3" {{ $post->category->id == "3" ? 'selected' : '' }}>お金</option>
                                    <option class="form-control" value="4" {{ $post->category->id == "4" ? 'selected' : '' }}>人間関係</option>
                                    <option class="form-control" value="5" {{ $post->category->id == "5" ? 'selected' : '' }}>性生活</option>
                                    <option class="form-control" value="6" {{ $post->category->id == "6" ? 'selected' : '' }}>コミュニケーション</option>
                                    <option class="form-control" value="7" {{ $post->category->id == "7" ? 'selected' : '' }}>習慣</option>
                                    <option class="form-control" value="8" {{ $post->category->id == "8" ? 'selected' : '' }}>仕事</option>
                                    <option class="form-control" value="9" {{ $post->category->id == "9" ? 'selected' : '' }}>健康</option>
                                    <option class="form-control" value="10" {{ $post->category->id == "10" ? 'selected' : '' }}>モラハラ</option>
                                    <option class="form-control" value="11" {{ $post->category->id == "11" ? 'selected' : '' }}>その他</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    {{-- Describe --}}
                    <div class="form-group mb-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="text-secondary">Describe ... 問題や葛藤を描写</div>
                            <div class="">［必須］</div>
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDescribe" aria-expanded="false" aria-controls="collapseDescribe">
                                コツを見る
                            </button>
                        </div>
                        @error('describe')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror
                        <textarea name="describe" class="form-control mb-2" rows="3">{{ $post->describe }}</textarea>
                        <div class="collapse" id="collapseDescribe">
                            <div class="">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                            </div>
                        </div>
                    </div>

                    {{-- Explain --}}
                    <div class="form-group mb-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="text-secondary">Explain ... 自分の気持ちを説明</div>
                            <div class="">［必須］</div>
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseExplain" aria-expanded="false" aria-controls="collapseExplain">
                                コツを見る
                            </button>
                        </div>
                        @error('explain')
                            <div class="text-danger  mb-2">{{ $message }}</div>
                        @enderror
                        <textarea name="explain" class="form-control mb-2" rows="3">{{ $post->explain }}</textarea>

                        <div class="collapse" id="collapseExplain">
                            <div class="">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                            </div>
                        </div>
                    </div>

                    {{-- Specify --}}
                    <div class="form-group mb-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="text-secondary">Specify ... 具体的な提案</div>
                            <div class="">［必須］</div>
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSpecify" aria-expanded="false" aria-controls="collapseSpecify">
                                コツを見る
                            </button>
                        </div>
                        @error('specify')
                            <div class="text-danger  mb-2">{{ $message }}</div>
                        @enderror
                        <textarea name="specify" class="form-control mb-2" rows="3">{{ $post->specify }}</textarea>
                        <div class="collapse" id="collapseSpecify">
                            <div class="">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                            </div>
                        </div>
                    </div>

                    {{-- Choose Yes--}}
                    <div class="form-group mb-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="text-secondary">Choose ... イエスに対する回答</div>
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseChooseYes" aria-expanded="false" aria-controls="collapseChooseYes">
                                コツを見る
                            </button>
                            @error('choose_yes')
                                <div class="text-danger ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <textarea name="choose_yes" class="form-control mb-2" rows="2">{{ $post->choose_yes }}</textarea>
                        <div class="collapse" id="collapseChooseYes">
                            <div class="">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                            </div>
                        </div>
                    </div>

                    {{-- Choose No --}}
                    <div class="form-group mb-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="text-secondary">Choose ... ノーに対する回答</div>
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseChooseNo" aria-expanded="false" aria-controls="collapseChooseNo">
                                コツを見る
                            </button>
                            @error('choose_no')
                                <div class="text-danger ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <textarea name="choose_no" class="form-control mb-2" rows="2">{{$post->choose_no }}</textarea>
                        <div class="collapse" id="collapseChooseNo">
                            <div class="">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                            </div>
                        </div>
                    </div>

                    {{-- Note --}}
                    <div class="form-group mb-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="text-secondary">Note ... その他メモ</div>
                            @error('note')
                                <div class="text-danger ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <textarea name="note" class="form-control" rows="3">{{ $post->note }}</textarea>
                    </div>

                <button type="submit" class="btn btn-primary mb-4 mx-4">入力内容確認</button>

            </form>
        </div>

        @component('components.profilebar')
        @endcomponent

    </div>
</div>
@endsection
