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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('type');
            $table->decimal('price',9,3);
            $table->string('file')->nullable();
            $table->text('desc');
            $table->string('image');
            $table->integer('numOfPages');
            $table->integer('stock');
            $table->string('authorName');
            $table->string('publisherName');
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
        Schema::dropIfExists('books');
    }
};
