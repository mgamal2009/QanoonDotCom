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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name',65);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->boolean('gender');
            $table->boolean('accountType');
            $table->boolean('authenticate')->default(0);
            $table->date('birthDate')->nullable();
            $table->unsignedDecimal('balance',9,3)->default(0);
            $table->unsignedInteger('silverPoints')->default(0);
            $table->unsignedInteger('goldPoints')->default(0);
            $table->string('cvFile',2048)->nullable();
            $table->string('phoneNumber',15)->unique();
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
        Schema::dropIfExists('clients');
    }
};
