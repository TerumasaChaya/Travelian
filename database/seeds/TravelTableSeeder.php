<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'group_id' => '1',
            'name'      => '梅田食べ歩き',
            'thumbnail'     => 'umeda.jpeg',
            'travelPoint'   => 5,
            'comment'       => "ラーメン中心に食べ歩きました！",
            'releaseFlg'    => true,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travels')->insert([
            'id'    => 2,
            'genre_id'   => 2,
            'user_id'   => 1,
            'group_id' => '2',
            'name'      => '「君の名は。」聖地巡礼',
            'thumbnail'     => 'mizuumi.jpeg',
            'travelPoint'   => 15,
            'comment'       => "1日かけて回りました！",
            'releaseFlg'    => true,
            'created_at'    => Carbon::now(-24)->toDateTimeString(),
            'updated_at'    => Carbon::now(-24)->toDateTimeString()
        ]);

        DB::table('travels')->insert([
            'id'    => 3,
            'genre_id'   => 1,
            'user_id'   => 3,
            'group_id' => '',
            'name'      => 'IE4A卒業旅行',
            'thumbnail'     => 'usj.jpeg',
            'travelPoint'   => 15,
            'comment'       => "クラス全員でUSJ行ってきた！",
            'releaseFlg'    => false,
            'created_at'    => Carbon::now(-48)->toDateTimeString(),
            'updated_at'    => Carbon::now(-48)->toDateTimeString()
        ]);

        DB::table('travels')->insert([
            'id'    => 4,
            'genre_id'   => 3,
            'user_id'   => 1,
            'group_id' => '',
            'name'      => '梅田ショッピング',
            'thumbnail'     => 'umeda.jpeg',
            'travelPoint'   => 0,
            'comment'       => "ショッピング！",
            'releaseFlg'    => true,
            'created_at'    => Carbon::now(-72)->toDateTimeString(),
            'updated_at'    => Carbon::now(-72)->toDateTimeString()
        ]);

        DB::table('travels')->insert([
            'id'    => 5,
            'genre_id'   => 2,
            'user_id'   => 2,
            'group_id' => '',
            'name'      => '琵琶湖一周の旅',
            'thumbnail'     => 'takashima.jpg',
            'travelPoint'   => 50,
            'comment'       => "聖地琵琶湖を一周してきました！",
            'releaseFlg'    => true,
            'created_at'    => Carbon::now(-72)->toDateTimeString(),
            'updated_at'    => Carbon::now(-72)->toDateTimeString()
        ]);

    }
}
