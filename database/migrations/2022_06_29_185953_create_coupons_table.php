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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name',65);
            $table->unsignedInteger('usageCount');
            $table->boolean('userType');
            $table->date('expiryDate');
            $table->boolean('type');
            $table->unsignedTinyInteger('discountPercent');
            $table->foreignId('courseID')->nullable();
            $table->foreign('courseID')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('coupons');
    }
};
