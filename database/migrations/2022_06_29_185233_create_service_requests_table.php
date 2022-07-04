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
            $table->foreignId('userID');
            $table->foreignId('serviceID');
            $table->foreignId('offerID')->nullable();
            $table->text('desc');
            $table->text('files');
            $table->boolean('status')->default(0);
            $table->decimal('minPrice',9,3);
            $table->decimal('maxPrice',9,3);
            $table->text('deliveredFiles')->nullable();
            $table->foreign('userID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('serviceID')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('offerID')->references('id')->on('offers')->onUpdate('cascade')->onDelete('cascade');
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
