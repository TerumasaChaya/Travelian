<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Travel;

class TravelPoint extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'travelPoint';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $travels = Travel::all();

        foreach ($travels as $travel){

            //現在の旅ポイントの1/3を減算
            $travel->travelPoint = (int)($travel->travelPoint - ( $travel->travelPoint / 3 ));
            $travel->save();
            var_dump($travel->travelPoint);

        }
    }
}
