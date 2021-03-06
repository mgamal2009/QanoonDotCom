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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clientID');
            $table->foreignId('serviceReqID');
            $table->boolean('status')->default(0);
            $table->unsignedDecimal('price',9,3);
            $table->foreign('serviceReqID')->references('id')->on('service_requests')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('offers');
    }
};
