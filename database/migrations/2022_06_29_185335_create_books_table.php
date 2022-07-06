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
            $table->string('name',127);
            $table->boolean('type');
            $table->unsignedDecimal('price',9,3);
            $table->string('file',2048)->nullable();
            $table->text('desc');
            $table->string('image',2048);
            $table->unsignedInteger('numOfPages');
            $table->unsignedInteger('stock');
            $table->string('authorName',65);
            $table->string('publisherName',127);
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
