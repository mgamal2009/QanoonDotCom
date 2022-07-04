<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_requests', function (Blueprint $table) {
            $table->id();
            $table->string('cv',127);
            $table->string('email');
            $table->string('phoneNumber');
            $table->foreignId('jobID');
            $table->foreignId('userID');
            $table->foreign('jobID')->references('id')->on('jobs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('userID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('job_requests');
    }
};
