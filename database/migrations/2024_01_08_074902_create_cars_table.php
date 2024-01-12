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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->integer('cartype_id');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('capacity')->nullable();
            $table->string('price')->nullable();
            $table->string('size')->nullable();
            $table->string('image')->nullable();
            $table->integer('discount')->default(0);
            $table->text('description')->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
