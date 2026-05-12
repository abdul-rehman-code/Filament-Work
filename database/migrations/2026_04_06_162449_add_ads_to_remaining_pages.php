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
        Schema::table('home_pages', function (Blueprint $table) {
            $table->text('ad_top')->nullable();
            $table->text('ad_middle')->nullable();
            $table->text('ad_sidebar')->nullable();
        });

        Schema::table('slab_pages', function (Blueprint $table) {
            $table->text('ad_top')->nullable();
            $table->text('ad_middle')->nullable();
            $table->text('ad_sidebar')->nullable();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->text('ad_top')->nullable();
            $table->text('ad_middle')->nullable();
            $table->text('ad_sidebar')->nullable();
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->text('ad_top')->nullable();
            $table->text('ad_middle')->nullable();
            $table->text('ad_sidebar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->dropColumn(['ad_top', 'ad_middle', 'ad_sidebar']);
        });

        Schema::table('slab_pages', function (Blueprint $table) {
            $table->dropColumn(['ad_top', 'ad_middle', 'ad_sidebar']);
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['ad_top', 'ad_middle', 'ad_sidebar']);
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->dropColumn(['ad_top', 'ad_middle', 'ad_sidebar']);
        });
    }
};
