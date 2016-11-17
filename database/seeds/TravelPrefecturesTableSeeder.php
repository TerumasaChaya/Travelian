<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TravelPrefecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('travelPrefectures')->truncate();

        DB::table('travelPrefectures')->insert([
            'id'    => 1,
            'travel_id'   => 1,
            'prefecture_id'   => 27,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelPrefectures')->insert([
            'id'    => 2,
            'travel_id'   => 2,
            'prefecture_id'   => 20,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelPrefectures')->insert([
            'id'    => 3,
            'travel_id'   => 2,
            'prefecture_id'   => 21,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelPrefectures')->insert([
            'id'    => 4,
            'travel_id'   => 3,
            'prefecture_id'   => 27,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelPrefectures')->insert([
            'id'    => 5,
            'travel_id'   => 4,
            'prefecture_id'   => 27,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelPrefectures')->insert([
            'id'    => 6,
            'travel_id'   => 5,
            'prefecture_id'   => 25,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

    }
}
