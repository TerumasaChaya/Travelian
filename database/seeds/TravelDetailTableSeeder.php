<?php

use Illuminate\Database\Seeder;

class TravelDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('travelDetails')->truncate();

        DB::table('travelDetails')->insert([
            'id'    => 1,
            'travel_id'   => 1,
            'photo'   => 'umeda.jpeg',
            'longitude'    => 135.491583,
            'latitude'    => 34.698695
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 2,
            'travel_id'   => 2,
            'photo'   => 'gifu.jpeg',
            'longitude'    => 136.760654,
            'latitude'    => 35.423298
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 3,
            'travel_id'   => 2,
            'photo'   => 'mizuumi.jpeg',
            'longitude'    => 137.844843,
            'latitude'    => 36.380761
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 4,
            'travel_id'   => 3,
            'photo'   => 'usj.jpeg',
            'longitude'    => 135.432338,
            'latitude'    =>  34.665442
        ]);


    }
}
