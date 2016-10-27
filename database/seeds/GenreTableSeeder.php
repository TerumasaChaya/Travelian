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
            'genrePoint'    => 5,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('genres')->insert([
            'id'    => 2,
            'name' => '聖地巡礼',
            'genrePoint'    => 10,
            'created_at'    => Carbon::now(-24)->toDateTimeString(),
            'updated_at'    => Carbon::now(-24)->toDateTimeString()
        ]);

        DB::table('genres')->insert([
            'id'    => 3,
            'name' => '食べ歩き',
            'genrePoint'    => 7,
            'created_at'    => Carbon::now(-48)->toDateTimeString(),
            'updated_at'    => Carbon::now(-48)->toDateTimeString()
        ]);
    }
}
