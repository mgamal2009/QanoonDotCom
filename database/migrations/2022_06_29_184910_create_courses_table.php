,<?php

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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name',127);
            $table->decimal('price',9,3);
            $table->string('cardImage',2048);
            $table->foreignId('creatorID')->nullable();
            $table->string('coverImage',2048);
            $table->boolean('level');
            $table->integer('duration')->nullable();
            $table->text('keywords')->nullable();
            $table->text('metaDesc',250)->nullable();
            $table->tinyInteger('numOfUnits');
            $table->foreign('creatorID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('courses');
    }
};
