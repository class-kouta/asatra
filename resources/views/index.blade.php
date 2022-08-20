@extends('layouts.app')

@section('content')
<div class="px32 line-height32">
    <div class="e-heading2 mb50 pl16 is-heading_bdb-gray is-heading_color-gray">
        アサトレについて
    </div>

    <div class="pb50 px24">
        <div class="mb8">
            早速アサトレを利用する場合は<a href="{{ route('posts.create') }}">こちら</a>
        </div>
        <div>
            まずみんなの投稿をみたい方は<a href="{{ route('search') }}">こちら</a>
        </div>
    </div>

    <div class="e-heading3 mb20 pl16 is-heading_bdb-gray is-heading_color-gray">はじめに</div>
    <div class="pb50 px24">
        <div class="mb32">
            　本アプリの説明の前に、一つ質問させてください。<br>
            　今のパートナー、または以前付き合っていたパートナーに対して、次のような悩みを抱えたことはありませんか。<br>
        </div>
        <ul class="mb32">
            <li>「家事をしてくれない」</li>
            <li>「帰りが遅い」</li>
            <li>「些細なことでいつも喧嘩になる」</li>
            <li>「私の気持ちを分かってくれない」</li>
            <li>「モラハラが辛い」</li>
            <li>「性生活に不満がある」</li>
            <li>「金遣いが荒い」</li>
            <li>「一緒に過ごす時間が少ない」</li>
            <li>「もっと自分の時間が欲しい」</li>
            <li>「育児をしてくれない」</li>
            <li>「自分の意見を理解してくれない」　etc...</li>
        </ul>
        <div>
            　おそらく、誰しもが経験したことがあると思います。<br>
            　恋愛初期はお互いが好き同士だったはずが、関係が長くなればなるほど、相手の嫌な部分が見えてきたり、パートナーへの気遣いが薄れてきたり、我慢することが多くなったり...<br>
            　このような恋愛の悩みにアプローチし、良好な関係を維持し続ける方法の一つが「アサーション」です。<br>
        </div>
    </div>

    <div class="e-heading3 mb20 pl16 is-heading_bdb-gray is-heading_color-gray">アサーションについて</div>
    <div class="pb50 px24">
        <div class="mb32">
            　アサーションとは一言で表すと、「自分も相手も大切にする自己表現」です。
            （引用「<a href="https://www.amazon.co.jp/%E5%A4%AB%E5%A9%A6%E3%83%BB%E3%82%AB%E3%83%83%E3%83%97%E3%83%AB%E3%81%AE%E3%81%9F%E3%82%81%E3%81%AE%E3%82%A2%E3%82%B5%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3-%E9%87%8E%E6%9C%AB%E6%AD%A6%E7%BE%A9-ebook/dp/B08FCDW7M8/ref=sr_1_4?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&crid=OFRNRXPCU1QI&keywords=%E3%82%A2%E3%82%B5%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3&qid=1660861018&sprefix=%E3%82%A2%E3%82%B5%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%2Caps%2C279&sr=8-4">夫婦・カップルのためのアサーション</a>」）<br>
            　実際に例を見てみましょう。例えば、旦那に「育児を手伝ってほしい」と伝えるとします。<br>
        </div>
        <div class="mb16">【悪い例】</div>
        <ul class="mb32">
            <li><span class="is-text_pink">自分</span>「どうしてあなたは子育てしないの？私ばっかりやらせて。」</li>
            <li><span class="is-text_blue">旦那</span>「お前は育休とってるんだから子育てして当然だろ。俺は仕事で疲れてるんだよ。」</li>
            <li><span class="is-text_pink">自分</span>「私だって子育てで疲れてるのよ。ずっと赤ちゃんを見てなきゃいけないから外に出かけることもできないし、寝てても夜泣きですぐ起こされるしもうたくさん！あなたなんて仕事から帰ってきてからテレビ見てるだけで何もしていないじゃない。」</li>
            <li><span class="is-text_blue">旦那</span>「疲れてるんだからテレビくらい見させてくれよ。お前もそんなにテレビが見たいなら子どもの面倒みながらテレビ観ればいいだろ？」</li>
            <li><span class="is-text_pink">自分</span>「なんなの。全然育児の大変さ理解してないよね。友達の旦那さんは仕事から帰ってきて育児手伝ってくれるのよ。あなたもそれくらいしてよ！」</li>
            <li><span class="is-text_blue">旦那</span>「俺が悪いのかよ！」</li>
        </ul>
        <div class="mb16">【アサーションを使った例】</div>
        <ul class="mb32">
            <li><span class="is-text_pink">自分</span>「赤ちゃんのお世話のことなんだけど，赤ちゃんのおむつを替えたり、ミルクをあげたり、あやしたり、基本的には私がやっているでしょう。」</li>
            <li><span class="is-text_pink">自分</span>「ずっと面倒をみていると、お出かけすることもできないし、夜中は夜泣きで起こされてろくに睡眠もとれてなくて、疲れがたまる一方。少しでいいから自分がゆっくりできる時間が欲しい。」</li>
            <li><span class="is-text_pink">自分</span>「あなたも仕事で疲れてると思うけど、土曜の午前中だけでいいから、赤ちゃんのお世話をあなたにお願いできないかな。」</li>
            <li><span class="is-text_blue">旦那</span>「俺も仕事で疲れてるし、土曜の午前はたくさん寝たいんだよね。」</li>
            <li><span class="is-text_pink">自分</span>「あなたも仕事で疲れているのは分かるけど、疲れているのは私も一緒なの。土曜の午前中じゃなくてもいいから、私のために時間を作ってくれない？」</li>
        </ul>
        <div>　どうでしょう。文章が柔らかくなり、伝えられる側も相手の要望を受け入れやすくなっているように感じませんか。</div>
    </div>

    <div class="e-heading3 mb20 pl16 is-heading_bdb-gray is-heading_color-gray">具体的なやり方</div>
    <div class="pb50 px24">
        <div class="mb32">
            　先の例をもとに、アサーションの具体的なやり方について解説します。<br>
            　アサーションは「<span class="is-text_red">DESC</span>」と呼ばれる、セリフ作りの４ステップを踏んでいきます。<br>
        </div>
        <ul class="mb32">
            <li><span class="is-text_red">Describe</span> ... 話したいことを描写</li>
            <li><span class="is-text_red">Explain</span> ... 自分の気持ちを説明</li>
            <li><span class="is-text_red">Specify</span> ... 具体的で現実的な提案</li>
            <li><span class="is-text_red">Choose</span> ... 相手が「yes」の場合と、「No」の場合に返答するセリフを用意</li>
        </ul>
        <div class="mb32">　先の例は、この４ステップを踏んでいます</div>
        <ul class="mb32">
            <li><span class="is-text_pink">Describe</span>「赤ちゃんのお世話のことなんだけど，赤ちゃんのおむつを替えたり、ミルクをあげたり、あやしたり、基本的には私がやっているでしょう。」</li>
            <li><span class="is-text_pink">Explain</span> 「ずっと面倒をみていると、お出かけすることもできないし、夜中は夜泣きで起こされてろくに睡眠もとれてなくて、疲れがたまる一方。少しでいいから自分がゆっくりできる時間が欲しい。」</li>
            <li><span class="is-text_pink">Specify</span> 「あなたも仕事で疲れてると思うけど、土曜の午前中だけでいいから、赤ちゃんのお世話をあなたにお願いできないかな。」</li>
            <li><span class="is-text_blue">旦那</span>　   「俺も仕事で疲れてるし、土曜の午前はたくさん寝たいんだよね。」</li>
            <li><span class="is-text_pink">Choose</span>  「あなたも仕事で疲れているのは分かるけど、疲れているのは私も一緒なの。土曜の午前中じゃなくてもいいから、私のために時間を作ってくれない？」</li>
        </ul>

        <div class="e-heading4 mb20 pl16 is-heading_bdb-gray">１　Describe ... 話したいことを描写</div>
        <div class="mb32">
            　ここではまず、「今から何の話をするのか」について、「<span class="is-text_red">具体的</span>」に伝えます。<br>
            　「赤ちゃんのお世話のことなんだけど，赤ちゃんのおむつを替えたり、ミルクをあげたり、あやしたり、基本的には私がやっているでしょう。」<br>
            　聞き手は「赤ちゃんのお世話の話なんだな」と、話を聞く体制ができます。<br>
        </div>
        <div class="e-heading4 mb20 pl16 is-heading_bdb-gray">２　Explain ... 自分の気持ちを説明</div>
        <div class="mb32">
            　ここでは、自分の「<span class="is-text_red">気持ち</span>」を、「<span class="is-text_red">率直</span>」に伝えましょう。<br>
            　例の場合、「疲れがたまる」「ゆっくりできる時間が欲しい」が、自分の気持ちになります。<br>
            　遠回しな表現を使うと相手に伝わりづらくなりますが、かと言ってあまり強い表現を使うと、悪い例のように相手が反発してしまい、感情をぶつけあうだけの不毛な会話になってしまいます。<br>
        </div>
        <div class="e-heading4 mb20 pl16 is-heading_bdb-gray">３　Specify ... 具体的で現実的な提案</div>
        <div class="mb32">
            　ここでは、「<span class="is-text_red">具体的</span>」で「<span class="is-text_red">現実的</span>」な提案をしましょう。<br>
            　例の場合、「土曜の午前中だけでいいから、赤ちゃんのお世話をあなたにお願いできないかな」と、具体的であり、かつ現実的な提案をしております。<br>
            　悪い例の場合のように、「手伝って」だけだと、何をどれくらい手伝っていいのかわかりづらく、相手が困惑しやすいです。<br>
        </div>
        <div class="e-heading4 mb20 pl16 is-heading_bdb-gray">４　Choose ... 相手が「yes」の場合と、「No」の場合に返答するセリフを用意</div>
        <div>
            　ここでは、相手が自分の提案に「yes」の場合と、「No」の場合に返答するセリフをあらかじめ想定して用意します。<br>
            　「yes」の場合、提案を飲んでくれた相手に「<span class="is-text_red">感謝</span>」を示しましょう。例えば次のような感じです。<br>
            　「ありがとう。休める時間ができてうれしい。分からないことがあったらなんでも聞いてくれていいから。」<br>
            　「No」の場合、「<span class="is-text_red">相手への共感</span>」を示したり、「<span class="is-text_red">提案のレベルを下げ</span>」たりしながら、再度提案しましょう。<br>
            　例では「（共感）あなたも仕事で疲れているのは分かるけど」「（再提案）土曜の午前中じゃなくてもいいから、私のために時間を作ってくれない？」と、共感を示しつつ、提案のレベルを下げて再提案しています。<br>
        </div>
    </div>

    <div class="e-heading3 mb20 pl16 is-heading_bdb-gray is-heading_color-gray">【 アサトレでできること 】</div>
    <div class="pb32 px24">
        <div class="mb32">　アサトレでできることは大きく分けて以下の３つです。</div>

            <div class="e-heading4 mb20 pl16 is-heading_bdb-gray">１　アサーションのトレーニング</div>
            <ul class="mb40">
                <li class="mb24">悩んでいることについて、「コツ」「例」を参照しながらフォームに入力するだけで、アサーティブな言い回しを作成できます。<li>
                <li>（イメージ）</li>
                <li><img src="/storage/screen_img/screen1.png"></li>
            </ul>

            <div class="e-heading4 mb20 pl16 is-heading_bdb-gray">２　他のユーザーからフィードバックをもらえる</div>
            <ul class="mb32">
                <li>コメント機能により、他ユーザーから応援メッセージやアドバイスを受け取れます。</li>
            </ul>

            <div class="e-heading4 mb20 pl16 is-heading_bdb-gray">３　他のユーザーの投稿を参照できる</div>
            <ul>
                <li>カテゴリー・キーワード検索により、同じ悩みを抱えている人の投稿を検索できます。</li>
                <li>実際に<a href="{{ route('search') }}">こちら</a>から確認できます。</li>
            </ul>
    </div>

    <div class="px24">
        <div class="mb32">皆さんがアサトレを通じて、パートナーと良好な関係を長きに渡って築いていくことを願っております。</div>
        <div><a href="{{ route('posts.create') }}">アサトレを利用してみる（無料）</a></div>
        <div><a href="{{ route('search') }}">みんなの投稿をみてみる（登録不要）</a></div>
    </div>
</div>
@endsection
