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
                'name' => 'ko-ta',
                'sex' => '1',
                'age' => '20',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'けい',
                'sex' => '1',
                'age' => '20',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'ふくし',
                'sex' => '1',
                'age' => '30',
                'email' => 'user3@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '春人',
                'sex' => '1',
                'age' => '30',
                'email' => 'user4@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'ひであき',
                'sex' => '1',
                'age' => '30',
                'email' => 'user5@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'HIRO',
                'sex' => '1',
                'age' => '30',
                'email' => 'user6@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '井上',
                'sex' => '1',
                'age' => '30',
                'email' => 'user7@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '純',
                'sex' => '1',
                'age' => '30',
                'email' => 'user8@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '雄太',
                'sex' => '1',
                'age' => '30',
                'email' => 'user9@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'カズ',
                'sex' => '1',
                'age' => '30',
                'email' => 'user10@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '秀明',
                'sex' => '1',
                'age' => '40',
                'email' => 'user11@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'ともひろ',
                'sex' => '1',
                'age' => '40',
                'email' => 'user12@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'Y.K',
                'sex' => '1',
                'age' => '20',
                'email' => 'user13@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '湊',
                'sex' => '1',
                'age' => '20',
                'email' => 'user14@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '雄太',
                'sex' => '1',
                'age' => '20',
                'email' => 'user15@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'U',
                'sex' => '1',
                'age' => '20',
                'email' => 'user16@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'コウヘイ',
                'sex' => '1',
                'age' => '30',
                'email' => 'user17@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'こんた',
                'sex' => '1',
                'age' => '30',
                'email' => 'user18@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'おー',
                'sex' => '1',
                'age' => '30',
                'email' => 'user19@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'コウ',
                'sex' => '1',
                'age' => '30',
                'email' => 'user20@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'ハジ',
                'sex' => '1',
                'age' => '30',
                'email' => 'user21@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'りょう',
                'sex' => '1',
                'age' => '30',
                'email' => 'user22@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '順一',
                'sex' => '1',
                'age' => '30',
                'email' => 'user23@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '猫好き',
                'sex' => '1',
                'age' => '30',
                'email' => 'user24@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'さこた',
                'sex' => '1',
                'age' => '30',
                'email' => 'user25@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '櫻井',
                'sex' => '1',
                'age' => '30',
                'email' => 'user26@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'アキトシ',
                'sex' => '1',
                'age' => '30',
                'email' => 'user27@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'こうき',
                'sex' => '1',
                'age' => '30',
                'email' => 'user28@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '芦塚',
                'sex' => '1',
                'age' => '30',
                'email' => 'user29@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'さとう',
                'sex' => '1',
                'age' => '30',
                'email' => 'user30@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'shoichi',
                'sex' => '1',
                'age' => '40',
                'email' => 'user31@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'kei',
                'sex' => '1',
                'age' => '30',
                'email' => 'user32@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'ゆい',
                'sex' => '2',
                'age' => '30',
                'email' => 'user33@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '井口',
                'sex' => '2',
                'age' => '40',
                'email' => 'user34@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'mai',
                'sex' => '2',
                'age' => '20',
                'email' => 'user35@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'oochan',
                'sex' => '2',
                'age' => '20',
                'email' => 'user36@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'neko',
                'sex' => '2',
                'age' => '20',
                'email' => 'user37@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'aki',
                'sex' => '2',
                'age' => '20',
                'email' => 'user38@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'non',
                'sex' => '2',
                'age' => '20',
                'email' => 'user39@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'さくらい',
                'sex' => '2',
                'age' => '20',
                'email' => 'user40@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'yu-',
                'sex' => '2',
                'age' => '20',
                'email' => 'user41@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '名無し１',
                'sex' => '2',
                'age' => '20',
                'email' => 'user42@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'なぎさ',
                'sex' => '2',
                'age' => '30',
                'email' => 'user43@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '咲',
                'sex' => '2',
                'age' => '30',
                'email' => 'user44@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'maki',
                'sex' => '2',
                'age' => '30',
                'email' => 'user45@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'S.S',
                'sex' => '2',
                'age' => '30',
                'email' => 'user46@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'しょーこ',
                'sex' => '2',
                'age' => '30',
                'email' => 'user47@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'harada',
                'sex' => '2',
                'age' => '30',
                'email' => 'user48@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'みき',
                'sex' => '2',
                'age' => '30',
                'email' => 'user49@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '彩',
                'sex' => '2',
                'age' => '30',
                'email' => 'user50@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'みゆき',
                'sex' => '2',
                'age' => '30',
                'email' => 'user51@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '美咲',
                'sex' => '2',
                'age' => '30',
                'email' => 'user52@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'まーちん',
                'sex' => '2',
                'age' => '40',
                'email' => 'user53@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '香奈',
                'sex' => '2',
                'age' => '40',
                'email' => 'user54@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '218',
                'sex' => '2',
                'age' => '40',
                'email' => 'user55@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '名無子',
                'sex' => '2',
                'age' => '40',
                'email' => 'user56@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'chisako',
                'sex' => '2',
                'age' => '20',
                'email' => 'user57@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'ayu',
                'sex' => '2',
                'age' => '20',
                'email' => 'user58@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'まいか',
                'sex' => '2',
                'age' => '20',
                'email' => 'user59@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'みけねこ',
                'sex' => '2',
                'age' => '20',
                'email' => 'user60@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'miyu',
                'sex' => '2',
                'age' => '20',
                'email' => 'user61@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'まいか',
                'sex' => '2',
                'age' => '20',
                'email' => 'user62@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '甘党',
                'sex' => '2',
                'age' => '20',
                'email' => 'user63@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'toko',
                'sex' => '2',
                'age' => '20',
                'email' => 'user64@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'emi',
                'sex' => '2',
                'age' => '20',
                'email' => 'user65@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'K子',
                'sex' => '2',
                'age' => '20',
                'email' => 'user66@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '姐さん',
                'sex' => '2',
                'age' => '20',
                'email' => 'user67@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '犬子',
                'sex' => '2',
                'age' => '20',
                'email' => 'user68@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'utada',
                'sex' => '2',
                'age' => '20',
                'email' => 'user69@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '葵',
                'sex' => '2',
                'age' => '30',
                'email' => 'user70@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'haru',
                'sex' => '2',
                'age' => '30',
                'email' => 'user71@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'まー',
                'sex' => '2',
                'age' => '30',
                'email' => 'user72@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'huyu',
                'sex' => '2',
                'age' => '30',
                'email' => 'user73@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'そのか',
                'sex' => '2',
                'age' => '30',
                'email' => 'user74@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '三久',
                'sex' => '2',
                'age' => '30',
                'email' => 'user75@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'お茶',
                'sex' => '2',
                'age' => '30',
                'email' => 'user76@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'ゆーみん',
                'sex' => '2',
                'age' => '40',
                'email' => 'user77@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'さかな',
                'sex' => '2',
                'age' => '40',
                'email' => 'user78@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'りくまま',
                'sex' => '2',
                'age' => '40',
                'email' => 'user79@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'mimi',
                'sex' => '2',
                'age' => '40',
                'email' => 'user80@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'aiko',
                'sex' => '2',
                'age' => '40',
                'email' => 'user81@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '犬好き嫁',
                'sex' => '2',
                'age' => '40',
                'email' => 'user82@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'Y.O',
                'sex' => '2',
                'age' => '40',
                'email' => 'user83@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '恩田',
                'sex' => '2',
                'age' => '40',
                'email' => 'user84@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'endo',
                'sex' => '2',
                'age' => '40',
                'email' => 'user85@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'さなえ',
                'sex' => '2',
                'age' => '50',
                'email' => 'user86@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '広香',
                'sex' => '2',
                'age' => '50',
                'email' => 'user87@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '志保',
                'sex' => '2',
                'age' => '50',
                'email' => 'user88@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'O太',
                'sex' => '1',
                'age' => '20',
                'email' => 'user89@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'miyoko',
                'sex' => '2',
                'age' => '40',
                'email' => 'user90@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'たしこ',
                'sex' => '2',
                'age' => '30',
                'email' => 'user91@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'U.M',
                'sex' => '1',
                'age' => '30',
                'email' => 'user92@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'otoko',
                'sex' => '1',
                'age' => '30',
                'email' => 'user93@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '黒',
                'sex' => '1',
                'age' => '20',
                'email' => 'user94@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => '春',
                'sex' => '2',
                'age' => '20',
                'email' => 'user95@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'tomo',
                'sex' => '1',
                'age' => '20',
                'email' => 'user96@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'misaki',
                'sex' => '2',
                'age' => '30',
                'email' => 'user97@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'A.S',
                'sex' => '2',
                'age' => '30',
                'email' => 'user98@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'satsuki',
                'sex' => '2',
                'age' => '30',
                'email' => 'user99@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'サン',
                'sex' => '1',
                'age' => '30',
                'email' => 'user100@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'tomoko',
                'sex' => '2',
                'age' => '30',
                'email' => 'user101@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'テスト',
                'sex' => '9',
                'age' => '0',
                'email' => 'test@gmail.com',
                'password' => Hash::make('test'),
            ]
        ]);
    }
}
