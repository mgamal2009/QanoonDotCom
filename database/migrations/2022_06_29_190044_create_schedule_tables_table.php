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
            $table->unsignedDecimal('meetingPrice',9,3);
            $table->unsignedTinyInteger('meetingDuration')->default(40);
            $table->foreignId('clientID');
            $table->foreign('clientID')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
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
