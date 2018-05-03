<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAfuColToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('contact', 'school_email', 'matric_no', 'school_id', 'year_of_study', 'club_id', 'food_pref', 'food_allergy',
                'shirt_size', 'side_income_interest', 'event_interest', 'student_leader')) {

                $table->string('contact')->nullable();
                $table->string('matric_no')->nullable();
                $table->string('school_email')->nullable();

                //which school this joint-record belongs to
                $table->integer('school_id')->unsigned()->nullable();
                $table->foreign('school_id')->references('id')->on('schools');
                $table->integer('year_of_study')->nullable();

                //which club this joint-record belongs to
                $table->integer('club_id')->unsigned()->nullable();
                $table->foreign('club_id')->references('id')->on('clubs');

                $table->string('food_pref')->nullable();
                $table->string('food_allergy')->nullable();
                $table->string('shirt_size')->nullable();
                $table->tinyInteger('side_income_interest')->default(0);
                $table->text('event_interest')->nullable();

                //is this student a student leader?
                $table->tinyInteger('student_leader')->default(0);
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
        //
    }
}
