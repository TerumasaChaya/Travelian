<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('groups')->truncate();

        DB::table('groups')->insert([
            'id'    => 1,
            'name' => '卒業旅行グループ',
        ]);

        DB::table('groups')->insert([
            'id'    => 2,
            'name' => '聖地巡礼グループ',
        ]);

        DB::table('groups')->insert([
            'id'    => 3,
            'name' => '食べ歩きグループ',
        ]);
    }
}
