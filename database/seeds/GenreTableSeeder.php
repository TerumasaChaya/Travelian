<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('genres')->truncate();

        DB::table('genres')->insert([
            'id'    => 1,
            'name' => '修学旅行',
            'kana' => 'しゅうがくりょこう',
            'genrePoint'    => 5,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('genres')->insert([
            'id'    => 2,
            'name' => '聖地巡礼',
            'kana' => 'せいちじゅんれい',
            'genrePoint'    => 40,
            'created_at'    => Carbon::now(-24)->toDateTimeString(),
            'updated_at'    => Carbon::now(-24)->toDateTimeString()
        ]);

        DB::table('genres')->insert([
            'id'    => 3,
            'name' => '食べ歩き',
            'kana' => 'たべあるき',
            'genrePoint'    => 7,
            'created_at'    => Carbon::now(-48)->toDateTimeString(),
            'updated_at'    => Carbon::now(-48)->toDateTimeString()
        ]);

        DB::table('genres')->insert([
            'id'    => 4,
            'name' => '朝日研究',
            'kana' => 'あさひけんきゅう',
            'genrePoint'    => 15,
            'created_at'    => Carbon::now(-48)->toDateTimeString(),
            'updated_at'    => Carbon::now(-48)->toDateTimeString()
        ]);

        DB::table('genres')->insert([
            'id'    => 5,
            'name' => 'ぶらり旅',
            'kana' => 'ぶらりたび',
            'genrePoint'    => 11,
            'created_at'    => Carbon::now(-48)->toDateTimeString(),
            'updated_at'    => Carbon::now(-48)->toDateTimeString()
        ]);

        DB::table('genres')->insert([
            'id'    => 6,
            'name' => '観光',
            'kana' => 'かんこう',
            'genrePoint'    => 30,
            'created_at'    => Carbon::now(-48)->toDateTimeString(),
            'updated_at'    => Carbon::now(-48)->toDateTimeString()
        ]);

        DB::table('genres')->insert([
            'id'    => 7,
            'name' => '寺・神社',
            'kana' => 'てら・じんじゃ',
            'genrePoint'    => 8,
            'created_at'    => Carbon::now(-48)->toDateTimeString(),
            'updated_at'    => Carbon::now(-48)->toDateTimeString()
        ]);

        DB::table('genres')->insert([
            'id'    => 8,
            'name' => '温泉',
            'kana' => 'おんせん',
            'genrePoint'    => 18,
            'created_at'    => Carbon::now(-48)->toDateTimeString(),
            'updated_at'    => Carbon::now(-48)->toDateTimeString()
        ]);

        DB::table('genres')->insert([
            'id'    => 9,
            'name' => '世界遺産',
            'kana' => 'せかいいさん',
            'genrePoint'    => 50,
            'created_at'    => Carbon::now(-48)->toDateTimeString(),
            'updated_at'    => Carbon::now(-48)->toDateTimeString()
        ]);

        DB::table('genres')->insert([
            'id'    => 10,
            'name' => 'B級グルメ',
            'kana' => 'びーきゅうぐるめ',
            'genrePoint'    => 33,
            'created_at'    => Carbon::now(-48)->toDateTimeString(),
            'updated_at'    => Carbon::now(-48)->toDateTimeString()
        ]);
    }
}
