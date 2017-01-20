<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Genre;

class GenrePoint extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'genrePoint';

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
        $genres = Genre::all();

        foreach ($genres as $genre){

            //現在の旅ポイントの1/3を減算
            $genre->genrePoint = (int)($genre->genrePoint - ( $genre->genrePoint / 3 ));
            $genre->save();
            var_dump($genre->genrePoint);

        }
    }
}
