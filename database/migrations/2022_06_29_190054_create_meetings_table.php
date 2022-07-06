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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('day',15);
            $table->time('startTime');
            $table->time('endTime');
            $table->boolean('status')->default(0);
            $table->unsignedDecimal('price',9,3);
            $table->string('link',127);
            $table->foreignId('userID');
            $table->foreignId('scheduleID');
            $table->foreign('userID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('scheduleID')->references('id')->on('schedule_tables')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('meetings');
    }
};
