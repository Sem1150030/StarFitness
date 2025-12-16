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
        Schema::create('meal_meal_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meal_id')->constrained()->onDelete('cascade');
            $table->foreignId('meal_item_id')->constrained()->onDelete('cascade');
            $table->decimal('portions', 8, 2)->default(1.0);

            $table->timestamps();

            // Prevent duplicate meal-item combinations
            $table->unique(['meal_id', 'meal_item_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_meal_item');
    }
};
