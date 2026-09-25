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
        Schema::create('admin_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('lead'); // 'lead', 'product', 'blog', 'setting', 'system'
            $table->string('title');
            $table->text('message')->nullable();
            $table->string('url')->nullable();
            $table->string('icon')->default('fa-solid fa-bell');
            $table->string('icon_color')->default('orange'); // 'orange', 'green', 'blue', 'purple', 'red'
            $table->boolean('is_read')->default(false);
            $table->unsignedBigInteger('related_id')->nullable();
            $table->timestamps();

            $table->index(['is_read', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_notifications');
    }
};
