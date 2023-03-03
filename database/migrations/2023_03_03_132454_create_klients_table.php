<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('klients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('surname')->nullable();;
            $table->string('phone_number')->nullable();;
            $table->string('adress')->nullable();;
            $table->string('email')->nullable();;
            $table->string('field')->nullable();;
            $table->string('department')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klients');
    }
};
