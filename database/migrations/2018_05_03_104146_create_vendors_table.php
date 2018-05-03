<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->integer('shirt_quantity')->unsigned()->nullable();
            $table->integer('budget_start')->unsigned()->nullable();
            $table->integer('budget_end')->unsigned()->nullable();
            $table->date('delivery_date')->nullable();
            $table->integer('num_days')->unsigned()->nullable();
            $table->string('food_type')->nullable();
            $table->string('meal_category')->nullable();
            $table->integer('total_meals_per_participant')->nullable();
            $table->tinyInteger('halal')->nullable();
            $table->tinyInteger('vegetarian')->nullable();
            $table->tinyInteger('games_laser_tag')->nullable();
            $table->tinyInteger('games_archery')->nullable();
            $table->integer('num_hours')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
