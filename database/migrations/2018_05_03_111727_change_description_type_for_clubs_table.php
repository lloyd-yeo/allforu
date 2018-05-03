<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDescriptionTypeForClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clubs',function (Blueprint $table){
            $table->longText('description')->nullable()->change();
            $table->longText('usual_activity')->nullable()->change();
            $table->longText('opportunity_1')->nullable()->change();
            $table->longText('opportunity_2')->nullable()->change();
            $table->longText('opportunity_3')->nullable()->change();
            $table->dropColumn('news_highlight_1');
            $table->dropColumn('news_highlight_2');
            $table->dropColumn('news_highlight_3');
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
