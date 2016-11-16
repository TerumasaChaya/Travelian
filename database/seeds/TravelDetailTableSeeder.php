<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
            'latitude'    => 34.698695,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 2,
            'travel_id'   => 2,
            'photo'   => 'gifu.jpeg',
            'longitude'    => 136.760654,
            'latitude'    => 35.423298,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 3,
            'travel_id'   => 2,
            'photo'   => 'mizuumi.jpeg',
            'longitude'    => 137.844843,
            'latitude'    => 36.380761,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 4,
            'travel_id'   => 3,
            'photo'   => 'usj.jpeg',
            'longitude'    => 135.432338,
            'latitude'    =>  34.665442,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 5,
            'travel_id'   => 5,
            'photo'   => '',
            'longitude'    => 135.914231,
            'latitude'    =>  34.996704,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 6,
            'travel_id'   => 5,
            'photo'   => 'kusathu.jpg',
            'longitude'    => 135.917664,
            'latitude'    =>  35.040566,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 7,
            'travel_id'   => 5,
            'photo'   => 'moriyama.JPG',
            'longitude'    => 135.953369,
            'latitude'    =>  35.084967,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 8,
            'travel_id'   => 5,
            'photo'   => '',
            'longitude'    => 135.984268,
            'latitude'    =>  35.135521,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 9,
            'travel_id'   => 5,
            'photo'   => '',
            'longitude'    => 136.047440,
            'latitude'    =>  35.140013,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 10,
            'travel_id'   => 5,
            'photo'   => 'oumi.JPG',
            'longitude'    => 136.093662,
            'latitude'    =>  35.163096,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 11,
            'travel_id'   => 5,
            'photo'   => '',
            'longitude'    => 136.193669,
            'latitude'    =>  35.235927,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 12,
            'travel_id'   => 5,
            'photo'   => 'maibara.jpg',
            'longitude'    => 136.259327,
            'latitude'    =>  35.302513,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 13,
            'travel_id'   => 5,
            'photo'   => '',
            'longitude'    => 136.283504,
            'latitude'    =>  35.368948,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 14,
            'travel_id'   => 5,
            'photo'   => 'nagahama.jpg',
            'longitude'    => 136.203974,
            'latitude'    =>  35.427034,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 15,
            'travel_id'   => 5,
            'photo'   => '',
            'longitude'    => 136.197571,
            'latitude'    =>  35.505796,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 16,
            'travel_id'   => 5,
            'photo'   => '',
            'longitude'    => 136.160550,
            'latitude'    =>  35.522140,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 17,
            'travel_id'   => 5,
            'photo'   => 'nishiasai.jpg',
            'longitude'    => 136.121019,
            'latitude'    =>  35.491493,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 18,
            'travel_id'   => 5,
            'photo'   => 'takashima.jpg',
            'longitude'    => 136.074586,
            'latitude'    =>  35.470543,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 19,
            'travel_id'   => 5,
            'photo'   => '',
            'longitude'    => 136.028780,
            'latitude'    =>  35.431184,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 20,
            'travel_id'   => 5,
            'photo'   => '',
            'longitude'    => 136.030035,
            'latitude'    =>  35.377994,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 21,
            'travel_id'   => 5,
            'photo'   => 'adonegawa.jpg',
            'longitude'    => 136.061265,
            'latitude'    =>  35.322538,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 22,
            'travel_id'   => 5,
            'photo'   => '',
            'longitude'    => 135.994685,
            'latitude'    =>  35.285462,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 23,
            'travel_id'   => 5,
            'photo'   => 'othu.jpg',
            'longitude'    => 135.924971,
            'latitude'    =>  35.208698,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 24,
            'travel_id'   => 5,
            'photo'   => '',
            'longitude'    => 135.899735,
            'latitude'    =>  35.135348,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 25,
            'travel_id'   => 5,
            'photo'   => '',
            'longitude'    => 135.860630,
            'latitude'    =>  35.032150,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 26,
            'travel_id'   => 5,
            'photo'   => '',
            'longitude'    => 135.863153,
            'latitude'    =>  35.003520,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 27,
            'travel_id'   => 5,
            'photo'   => 'kinoshita.JPG',
            'longitude'    => 135.890903,
            'latitude'    =>  34.998207,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

        DB::table('travelDetails')->insert([
            'id'    => 28,
            'travel_id'   => 4,
            'photo'   => 'umeda.jpeg',
            'longitude'    => 135.491583,
            'latitude'    => 34.698695,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString()
        ]);

    }
}
