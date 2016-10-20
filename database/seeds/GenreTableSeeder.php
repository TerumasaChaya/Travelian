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
            'name' => '修学旅行',
            'genrePoint'    => 5
        ]);

        DB::table('groups')->insert([
            'name' => '聖地巡礼',
            'genrePoint'    => 10
        ]);

        DB::table('groups')->insert([
            'name' => '食べ歩き',
            'genrePoint'    => 7
        ]);
    }
}
