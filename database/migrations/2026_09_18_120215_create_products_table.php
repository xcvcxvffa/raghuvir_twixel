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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->string('category')->default('Wheat Flour')->index();
            $table->string('quote')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('detailed_description')->nullable();
            $table->json('sizes')->nullable();
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->json('gallery_images')->nullable();

            // Specifications Table Fields
            $table->string('main_ingredient')->nullable();
            $table->string('processing')->nullable();
            $table->string('suitable_for')->nullable();
            $table->string('packaging')->nullable();
            $table->string('shelf_life')->nullable();
            $table->string('storage')->nullable();

            // Nutritional Facts
            $table->string('energy_kcal')->nullable();
            $table->string('protein_g')->nullable();
            $table->string('carbs_g')->nullable();
            $table->string('fat_g')->nullable();
            $table->json('nutrition_details')->nullable();

            // Dishes / Ideal For
            $table->json('ideal_for')->nullable();

            // Status & Visibility
            $table->boolean('is_active')->default(true)->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->integer('sort_order')->default(0);

            // SEO Metadata
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
