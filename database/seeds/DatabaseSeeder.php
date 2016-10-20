<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(GroupMemberTableSeeder::class);
        $this->call(TravelTableSeeder::class);
        $this->call(TravelDetailTableSeeder::class);

    }
}
