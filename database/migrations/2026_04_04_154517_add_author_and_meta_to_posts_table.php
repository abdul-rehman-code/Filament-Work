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
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'author')) {
                $table->string('author')->nullable();
            }
            if (!Schema::hasColumn('posts', 'meta_title')) {
                $table->string('meta_title')->nullable();
            }
            if (!Schema::hasColumn('posts', 'meta_description')) {
                $table->text('meta_description')->nullable();
            }
            if (!Schema::hasColumn('posts', 'meta_keywords')) {
                $table->text('meta_keywords')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $columns = [];
            if (Schema::hasColumn('posts', 'author')) $columns[] = 'author';
            if (Schema::hasColumn('posts', 'meta_title')) $columns[] = 'meta_title';
            if (Schema::hasColumn('posts', 'meta_description')) $columns[] = 'meta_description';
            if (Schema::hasColumn('posts', 'meta_keywords')) $columns[] = 'meta_keywords';
            
            if (count($columns) > 0) {
                $table->dropColumn($columns);
            }
        });
    }
};
