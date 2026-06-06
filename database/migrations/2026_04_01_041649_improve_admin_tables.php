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
        // Update Banners to support multiple slides
        Schema::table('banners', function (Blueprint $table) {
            $table->dropUnique(['page']);
            $table->string('image')->nullable()->after('description');
        });

        // Update Gallery Items to support categories and images
        Schema::table('gallery_items', function (Blueprint $table) {
            $table->string('category')->default('all')->after('title');
            $table->string('image')->nullable()->after('icon');
        });
    }

    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->unique('page');
            $table->dropColumn(['image']);
        });

        Schema::table('gallery_items', function (Blueprint $table) {
            $table->dropColumn(['category', 'image']);
        });
    }
};
