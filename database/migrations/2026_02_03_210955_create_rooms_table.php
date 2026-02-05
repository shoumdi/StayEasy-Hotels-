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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('capacity');
            $table->string('name');
            $table->float('price');
            $table->enum('status', ['available', 'occupied', 'maintenance']);
            $table->string('images')->nullable();
            $table->foreignId('tag_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('proprety_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
