<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfoToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('address_description')->nullable();
            $table->string('address')->nullable();
            $table->string('peak_period')->nullable();
            $table->integer('participants')->unsigned()->nullable();
            $table->string('itinerary')->nullable();
            $table->string('notes')->nullable();
            $table->tinyInteger('free')->nullable();
            $table->tinyInteger('require_sponsorships')->nullable();
            $table->integer('require_snacks_sponsorship')->unsigned()->nullable();
            $table->integer('require_stationary_sponsorship')->unsigned()->nullable();
            $table->integer('require_facial_sponsorship')->unsigned()->nullable();
            $table->integer('require_cash_sponsorship')->unsigned()->nullable();
            $table->tinyInteger('require_shirt_vendor')->nullable();
            $table->tinyInteger('require_food_vendor')->nullable();
            $table->tinyInteger('require_games_vendor')->nullable();
            $table->tinyInteger('sponsor_fulfillment_display_poster')->nullable();
            $table->tinyInteger('sponsor_fulfillment_display_standees')->nullable();
            $table->tinyInteger('sponsor_fulfillment_display_tv')->nullable();
            $table->tinyInteger('sponsor_fulfillment_fb_likeandshare')->nullable();
            $table->tinyInteger('sponsor_fulfillment_fb_review')->nullable();
            $table->tinyInteger('sponsor_fulfillment_ig')->nullable();
            $table->tinyInteger('sponsor_fulfillment_google')->nullable();
            $table->tinyInteger('sponsor_fulfillment_afu')->nullable();
            $table->tinyInteger('sponsor_fulfillment_booth')->nullable();
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
