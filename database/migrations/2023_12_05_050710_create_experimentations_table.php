<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperimentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experimentations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('principle_id');
            $table->longText('description')->nullable();
            $table->timestamps();

            $table->foreign('principle_id')->references('id')->on('principles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experimentations');
    }
}
