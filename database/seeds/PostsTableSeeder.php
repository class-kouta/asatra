<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => '1',
                'title' => '時間を守って欲しい',
                'describe' => '約束の時間に遅れることが多い',
                'explain' => '貴重な時間をできるだけ有効に使いたいと思っている。待っている時間が煩わしい。',
                'specify' => '遅れてもいいから、遅れることがわかったら早めに教えて欲しい。',
                'choose_yes' => 'ありがとう。助かるよ。',
                'choose_no' => '約束の時間どおり来れなくてもいいんだ。遅れるときは早めに連絡してほしいだけなんだ。早く教えてもらえれば、その分時間を有効に使えるからさ。',
                'note' => '',
            ],[
                'user_id' => '2',
                'title' => 'トイレは座ってして欲しい',
                'describe' => 'いつも立ってトイレをしている',
                'explain' => '結構飛び跳ねてる。猫ちゃんの健康管理上よくないんだよね。',
                'specify' => '今までは良かったけど、猫ちゃんがきてからは気をつけて欲しい。',
                'choose_yes' => 'ありがとう。協力してくれてうれしい。',
                'choose_no' => '男の人は毎回座ってトイレするの面倒なのはわかるけど、猫ちゃんのために協力してくれないかな。私の家だけでいいの。',
                'note' => '',
            ]
        ]);
    }
}
