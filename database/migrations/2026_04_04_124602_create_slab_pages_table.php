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
        Schema::create('slab_pages', function (Blueprint $table) {
            $table->id();
            // Article content section
            $table->string('article_title')->nullable();
            $table->text('lead_text')->nullable();
            $table->text('article_content')->nullable();
            $table->string('table_title')->nullable();
            $table->text('note')->nullable();
            // Layout settings
            $table->boolean('is_flex_grow')->default(true);
            // Meta tags
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slab_pages');
    }
};
