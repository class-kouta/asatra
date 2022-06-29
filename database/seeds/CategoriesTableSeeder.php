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
                'name' => '結婚',
            ],[
                'id' => '2',
                'name' => '育児・家事',
            ],[
                'id' => '3',
                'name' => 'お金',
            ],[
                'id' => '4',
                'name' => '人間関係',
            ],[
                'id' => '5',
                'name' => '性生活',
            ],[
                'id' => '6',
                'name' => 'コミュニケーション',
            ],[
                'id' => '7',
                'name' => '習慣',
            ],[
                'id' => '8',
                'name' => '仕事',
            ],[
                'id' => '9',
                'name' => '健康',
            ],[
                'id' => '10',
                'name' => 'モラハラ',
            ],[
                'id' => '11',
                'name' => 'その他',
            ]
        ]);
    }
}
