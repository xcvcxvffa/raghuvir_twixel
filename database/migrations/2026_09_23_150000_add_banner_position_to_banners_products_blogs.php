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
        if (Schema::hasTable('page_banners') && !Schema::hasColumn('page_banners', 'banner_position')) {
            Schema::table('page_banners', function (Blueprint $table) {
                $table->string('banner_position', 50)->nullable()->default('center center')->after('banner_image');
            });
        }

        if (Schema::hasTable('products') && !Schema::hasColumn('products', 'banner_position')) {
            Schema::table('products', function (Blueprint $table) {
                $table->string('banner_position', 50)->nullable()->default('center bottom')->after('banner_image');
            });
        }

        if (Schema::hasTable('blogs') && !Schema::hasColumn('blogs', 'banner_position')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->string('banner_position', 50)->nullable()->default('center center')->after('banner_image');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('page_banners') && Schema::hasColumn('page_banners', 'banner_position')) {
            Schema::table('page_banners', function (Blueprint $table) {
                $table->dropColumn('banner_position');
            });
        }

        if (Schema::hasTable('products') && Schema::hasColumn('products', 'banner_position')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('banner_position');
            });
        }

        if (Schema::hasTable('blogs') && Schema::hasColumn('blogs', 'banner_position')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->dropColumn('banner_position');
            });
        }
    }
};
