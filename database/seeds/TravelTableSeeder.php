<?php

use Illuminate\Database\Seeder;

class TravelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('travels')->truncate();

        DB::table('travels')->insert([
            'id'    => 1,
            'genre_id'   => 1,
            'user_id'   => 1,
            'name'      => '梅田食べ歩き',
            'thumbnail'     => 'umeda.jpeg',
            'prefecture'    => '大阪府',
            'travelPoint'   => 5,
            'comment'       => "ラーメン中心に食べ歩きました！",
            'releaseFlg'    => true
        ]);

        DB::table('travels')->insert([
            'id'    => 2,
            'genre_id'   => 2,
            'user_id'   => 1,
            'name'      => '「君の名は。」聖地巡礼',
            'thumbnail'     => 'mizuumi.jpeg',
            'prefecture'    => '岐阜県',
            'travelPoint'   => 15,
            'comment'       => "1日かけて回りました！",
            'releaseFlg'    => true
        ]);

        DB::table('travels')->insert([
            'id'    => 3,
            'genre_id'   => 1,
            'user_id'   => 3,
            'name'      => 'IE4A卒業旅行',
            'thumbnail'     => 'usj.jpeg',
            'prefecture'    => '大阪府',
            'travelPoint'   => 0,
            'comment'       => "クラス全員でUSJ行ってきた！",
            'releaseFlg'    => false
        ]);

    }
}
