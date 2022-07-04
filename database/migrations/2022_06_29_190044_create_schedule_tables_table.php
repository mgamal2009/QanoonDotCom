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
        Schema::create('schedule_tables', function (Blueprint $table) {
            $table->id();
            $table->json('periods');
            $table->json('availablePeriods');
            $table->json('bookedPeriods');
            $table->decimal('meetingPrice',9,3);
            $table->tinyInteger('meetingDuration')->default(40);
            $table->foreignId('userID');
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
        Schema::dropIfExists('schedule_tables');
    }
};
