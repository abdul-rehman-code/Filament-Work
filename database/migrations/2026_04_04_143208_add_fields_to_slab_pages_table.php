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
        Schema::table('slab_pages', function (Blueprint $table) {
            if (!Schema::hasColumn('slab_pages', 'article_content')) {
                $table->text('article_content')->nullable()->after('lead_text');
            }
            if (!Schema::hasColumn('slab_pages', 'is_flex_grow')) {
                $table->boolean('is_flex_grow')->default(true)->after('note');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('slab_pages', function (Blueprint $table) {
            $table->dropColumn(['article_content', 'is_flex_grow']);
        });
    }
};
