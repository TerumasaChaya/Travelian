<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'id'    => 1,
            'name' => '田中',
            'email' => 'tanaka@ecc.com',
            'password' => bcrypt('tanaka'),
            'token'    => str_random(50),
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('users')->insert([
            'id'    => 2,
            'name' => '鈴木',
            'email' => 'suzuki@ecc.com',
            'password' => bcrypt('suziki'),
            'token'    => str_random(50),
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('users')->insert([
            'id'    => 3,
            'name' => '山田',
            'email' => 'yamada@ecc.com',
            'password' => bcrypt('yamada'),
            'token'    => str_random(50),
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

    }
}
