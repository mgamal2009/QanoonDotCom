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
        Schema::create('book_bills', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('city');
            $table->string('district');
            $table->string('street');
            $table->integer('buildingNum');
            $table->integer('floorNum');
            $table->integer('unitNum');
            $table->decimal('totalPrice',9,3);
            $table->string('coupon');
            $table->integer('totalNumOfBooks');
            $table->decimal('netPrice',9,3);
            $table->json('items');
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
        Schema::dropIfExists('book_bills');
    }
};
