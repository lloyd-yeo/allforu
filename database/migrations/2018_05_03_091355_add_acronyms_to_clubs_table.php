<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAcronymsToClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->string('club_acronym')->nullable();
            $table->string('organisation')->nullable();
            $table->string('organisation_acronym')->nullable();
            $table->string('referred_by')->nullable();
            $table->string('classification')->nullable();
            $table->string('category_1')->nullable();
            $table->string('category_2')->nullable();
            $table->integer('president_id')->unsigned()->nullable();
            $table->foreign('president_id')->references('id')->on('users');
            $table->integer('vice_president_id')->unsigned()->nullable();
            $table->foreign('vice_president_id')->references('id')->on('users');
            $table->integer('finance_head_id')->unsigned()->nullable();
            $table->foreign('finance_head_id')->references('id')->on('users');
            $table->string('usual_activity')->nullable();
            $table->string('opportunity_1')->nullable();
            $table->string('opportunity_2')->nullable();
            $table->string('opportunity_3')->nullable();
            $table->string('catchphrase')->nullable();
            $table->string('news_highlight_1')->nullable();
            $table->string('news_highlight_2')->nullable();
            $table->string('news_highlight_3')->nullable();
            $table->integer('events_per_year')->nullable();
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
