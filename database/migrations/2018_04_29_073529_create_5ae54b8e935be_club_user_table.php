<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5ae54b8e935beClubUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('club_user')) {
            Schema::create('club_user', function (Blueprint $table) {
                $table->integer('club_id')->unsigned()->nullable();
                $table->foreign('club_id', 'fk_p_151182_151177_user_c_5ae54b8e93702')->references('id')->on('clubs')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_151177_151182_club_u_5ae54b8e9379e')->references('id')->on('users')->onDelete('cascade');
                $table->integer('like')->unsigned()->nullable();
                $table->integer('follow')->unsigned()->nullable();
                $table->integer('leader')->unsigned()->nullable();
                $table->integer('admin')->unsigned()->nullable();
                $table->integer('member')->unsigned()->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('club_user');
    }
}
