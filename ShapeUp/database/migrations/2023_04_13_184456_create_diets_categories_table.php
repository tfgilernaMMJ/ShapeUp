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
        Schema::create('diets_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diet_id')->references('id')->on('diets');
            $table->foreignId('category_of_diet_id')->references('id')->on('categories_of_diets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diets_categories');
    }
};
