<?php

use Illuminate\Database\Seeder;

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
            'genrePoint'    => 5
        ]);

        DB::table('genres')->insert([
            'id'    => 2,
            'name' => '聖地巡礼',
            'genrePoint'    => 10
        ]);

        DB::table('genres')->insert([
            'id'    => 3,
            'name' => '食べ歩き',
            'genrePoint'    => 7
        ]);
    }
}
