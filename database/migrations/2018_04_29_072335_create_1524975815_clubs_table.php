<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1524975815ClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clubs')) {
            Schema::create('clubs', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('description')->nullable();
                $table->string('website')->nullable();
                $table->string('fb_page_url')->nullable();
                $table->string('ig_page_url')->nullable();
                $table->string('cover_img')->nullable();
                $table->integer('dollars_saved')->nullable();
                $table->integer('cash_sponsored')->nullable();
                $table->integer('products_sponsored')->nullable();
                $table->integer('students_impacted')->nullable();
                $table->timestamps();
                $table->softDeletes();
                $table->index(['deleted_at']);
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
        Schema::dropIfExists('clubs');
    }
}
