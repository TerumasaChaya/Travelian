<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  テーブル定義を変更する
        Schema::table('groupMembers', function (Blueprint $table){

            // 新規カラムを追加する
            $table->boolean('requestFlg')->after('leaderFlg');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
