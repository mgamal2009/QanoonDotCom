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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clientID');
            $table->foreignId('serviceID');
            $table->text('desc');
            $table->text('files');
            $table->boolean('status')->default(0);
            $table->unsignedDecimal('minPrice',9,3);
            $table->unsignedDecimal('maxPrice',9,3);
            $table->text('deliveredFiles')->nullable();
            $table->foreign('clientID')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('serviceID')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('service_requests');
    }
};
