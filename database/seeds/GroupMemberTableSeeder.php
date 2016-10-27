<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class GroupMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('groupMembers')->truncate();

        DB::table('groupMembers')->insert([
            'id'    => 1,
            'user_id'   => 1,
            'group_id'   => 1,
            'leaderFlg'  => false,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('groupMembers')->insert([
            'id'    => 2,
            'user_id'   => 2,
            'group_id'   => 2,
            'leaderFlg'  => true,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('groupMembers')->insert([
            'id'    => 3,
            'user_id'   => 3,
            'group_id'   => 2,
            'leaderFlg'  => true,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('groupMembers')->insert([
            'id'    => 4,
            'user_id'   => 1,
            'group_id'   => 3,
            'leaderFlg'  => false,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

    }
}
