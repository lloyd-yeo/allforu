<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5ae54955e77f8RelationshipsToClubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clubs', function(Blueprint $table) {
            if (!Schema::hasColumn('clubs', 'school_id')) {
                $table->integer('school_id')->unsigned()->nullable();
                $table->foreign('school_id', '151182_5ae549522e32b')->references('id')->on('schools')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clubs', function(Blueprint $table) {
            
        });
    }
}
