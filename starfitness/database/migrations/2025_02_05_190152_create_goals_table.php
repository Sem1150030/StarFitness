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
        Schema::create('goals', function (Blueprint $table) {
            $table->id();

            $table->integer('kcal_goal')->nullable();
            $table->float('protein_goal')->nullable();
            $table->float('carbs_goal')->nullable();
            $table->float('fat_goal')->nullable();

            $table->boolean('is_kcal_max')->default(true);
            $table->boolean('is_carbs_max')->default(false);
            $table->boolean('is_fat_max')->default(false);

            //if is active -> this goal will be set as default
            $table->boolean('is_active')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};
