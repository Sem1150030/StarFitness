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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('daily_log_id')->constrained()->onDelete('cascade');

            $table->string('name');
            $table->decimal('kcal_total', 10, 2)->default(0);
            $table->decimal('carb_total', 10, 2)->default(0);
            $table->decimal('fat_total', 10, 2)->default(0);
            $table->decimal('protein_total', 10, 2)->default(0);

            $table->timestamps();

            // Indexes for common queries
            $table->index(['user_id', 'daily_log_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
