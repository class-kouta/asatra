<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => '1',
                'category_name' => '結婚',
            ],[
                'id' => '2',
                'category_name' => '育児・家事',
            ],[
                'id' => '3',
                'category_name' => 'お金',
            ],[
                'id' => '4',
                'category_name' => '人間関係',
            ],[
                'id' => '5',
                'category_name' => '性生活',
            ],[
                'id' => '6',
                'category_name' => 'コミュニケーション',
            ],[
                'id' => '7',
                'category_name' => '習慣',
            ],[
                'id' => '8',
                'category_name' => '仕事',
            ],[
                'id' => '9',
                'category_name' => '健康',
            ],[
                'id' => '10',
                'category_name' => 'モラハラ',
            ],[
                'id' => '11',
                'category_name' => 'その他',
            ]
        ]);
    }
}
