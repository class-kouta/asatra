<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'ゆい',
                'sex' => '2',
                'age' => '30',
                'email' => 'yui@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'chisako',
                'sex' => '2',
                'age' => '20',
                'email' => 'chisako@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'Y.K',
                'sex' => '1',
                'age' => '20',
                'email' => 'y.k@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'さこた',
                'sex' => '1',
                'age' => '30',
                'email' => 'sakota@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'ハジ',
                'sex' => '1',
                'age' => '30',
                'email' => 'hazi@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'miyu',
                'sex' => '2',
                'age' => '20',
                'email' => 'miyu@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'まー',
                'sex' => '2',
                'age' => '30',
                'email' => 'maa@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'こんた',
                'sex' => '1',
                'age' => '30',
                'email' => 'konta@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'ayu',
                'sex' => '2',
                'age' => '40',
                'email' => 'ayu@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'りくママ',
                'sex' => '2',
                'age' => '40',
                'email' => 'rikumama@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'RYU',
                'sex' => '1',
                'age' => '30',
                'email' => 'ryu@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'さかな',
                'sex' => '2',
                'age' => '30',
                'email' => 'sakana@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'まいか',
                'sex' => '2',
                'age' => '20',
                'email' => 'maika@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'そのか',
                'sex' => '2',
                'age' => '30',
                'email' => 'sonoka@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'こーた',
                'sex' => '1',
                'age' => '30',
                'email' => 'kota@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'mimi',
                'sex' => '2',
                'age' => '40',
                'email' => 'mimi@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'ばろり',
                'sex' => '1',
                'age' => '30',
                'email' => 'barori@gmail.com',
                'password' => Hash::make('password'),
            ]
        ]);
    }
}
