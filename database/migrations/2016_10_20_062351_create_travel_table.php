<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('genre_id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('thumbnail');
            $table->string('prefecture');
            $table->integer('travelPoint');
            $table->string('comment');
            $table->boolean('releaseFlg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('travels');
    }
}
