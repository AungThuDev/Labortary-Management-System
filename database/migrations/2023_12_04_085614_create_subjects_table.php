<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('instructor_name');
            $table->string('room');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('time');
            $table->string('instructor_office');
            $table->string('instructor_email');
            $table->string('office_hour');
            $table->string('image');
            $table->longText('web_page');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
