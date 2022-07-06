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
        Schema::create('delivery_cities', function (Blueprint $table) {
            $table->id();
            $table->string('name' , 65);
            $table->unsignedDecimal('price',9,3);
            $table->unsignedTinyInteger('freeDeliveryBooksNum')->default(5);
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
        Schema::dropIfExists('delivery_cities');
    }
};
