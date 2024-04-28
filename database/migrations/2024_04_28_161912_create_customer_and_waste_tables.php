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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('waste', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->string('site');
            $table->integer('year');
            $table->integer('month');
            $table->enum('waste_type', ['agriculture', 'food_waste', 'sewage', 'mixed']);
            $table->integer('estimated_quantity');
            $table->integer('actual_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
        Schema::dropIfExists('waste');
    }
};
