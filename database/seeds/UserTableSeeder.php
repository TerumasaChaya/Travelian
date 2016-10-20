<?php

use Illuminate\Database\Seeder;

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
            'name' => '田中',
            'email' => 'tanaka@ecc.com',
            'password' => bcrypt('tanaka'),
        ]);

        DB::table('users')->insert([
            'name' => '鈴木',
            'email' => 'suzuki@ecc.com',
            'password' => bcrypt('suziki'),
        ]);

        DB::table('users')->insert([
            'name' => '山田',
            'email' => 'yamada@ecc.com',
            'password' => bcrypt('yamada'),
        ]);

    }
}
