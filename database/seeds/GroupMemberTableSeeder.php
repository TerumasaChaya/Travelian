<?php

use Illuminate\Database\Seeder;

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
            'user_id'   => 1,
            'group_id'   => 1,
            'leaderFlg'  => false
        ]);

        DB::table('groupMembers')->insert([
            'user_id'   => 2,
            'group_id'   => 2,
            'leaderFlg'  => true
        ]);

        DB::table('groupMembers')->insert([
            'user_id'   => 3,
            'group_id'   => 2,
            'leaderFlg'  => true
        ]);
    }
}
