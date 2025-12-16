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
        Schema::create('meal_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_url')->nullable();
            $table->text('description')->nullable();
            $table->decimal('kcal_per_portion', 8, 2)->default(0);
            $table->decimal('carb_per_portion', 8, 2)->default(0);
            $table->decimal('fat_per_portion', 8, 2)->default(0);
            $table->decimal('protein_per_portion', 8, 2)->default(0);

            $table->timestamps();

            // Index for name searches
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_items');
    }
};
