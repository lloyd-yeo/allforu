<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShirtDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shirt_designs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned()->nullable();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->integer('quantity')->unsigned()->nullable();
            $table->integer('color_num')->unsigned()->nullable();
            $table->string('apparel_type')->nullable();
            $table->string('shirt_color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shirt_designs');
    }
}
