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
        Schema::create('wastes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->string('site');
            $table->integer('year');
            $table->integer('month');
            $table->enum('waste_type', ['agriculture', 'food_waste', 'sewage', 'mixed']);
            $table->integer('estimated_quantity')->nullable();
            $table->integer('actual_quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wastes');
    }
};
