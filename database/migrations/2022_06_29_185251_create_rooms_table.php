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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serviceReqID');
            $table->foreignId('ownerID');
            $table->foreignId('workerID');
            $table->foreign('ownerID')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('workerID')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('serviceReqID')->references('id')->on('service_requests')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('rooms');
    }
};
