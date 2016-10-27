<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('groups')->insert([
            'id'    => 2,
            'name' => '聖地巡礼グループ',
            'created_at'    => Carbon::now(-24)->toDateTimeString(),
            'updated_at'    => Carbon::now(-24)->toDateTimeString()
        ]);

        DB::table('groups')->insert([
            'id'    => 3,
            'name' => '食べ歩きグループ',
            'created_at'    => Carbon::now(-48)->toDateTimeString(),
            'updated_at'    => Carbon::now(-48)->toDateTimeString()
        ]);
    }
}
