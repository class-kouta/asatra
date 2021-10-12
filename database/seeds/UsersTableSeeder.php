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
                'name' => '康太',
                'sex' => '1',
                'profile_image' => '',
                'email' => 'kouta@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'あゆみ',
                'sex' => '2',
                'profile_image' => '',
                'email' => 'ayumi@gmail.com',
                'password' => Hash::make('password'),
            ]
        ]);
    }
}
