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
        Schema::create('buy_book_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bookID');
            $table->foreignId('userID');
            $table->foreignId('billID');
            $table->foreign('bookID')->references('id')->on('books')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('userID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('billID')->references('id')->on('book_bills')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('buy_book_requests');
    }
};
