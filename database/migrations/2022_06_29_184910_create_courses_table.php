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
            $table->string('name');
            $table->decimal('price',9,3);
            $table->string('cardImage');
            $table->foreignId('creatorID')->nullable();
            $table->string('coverImage');
            $table->boolean('level');
            $table->integer('duration');
            $table->text('keywords')->nullable();
            $table->text('metaDesc')->nullable();
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
