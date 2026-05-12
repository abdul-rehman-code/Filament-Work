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
        Schema::table('slabs', function (Blueprint $table) {
            $table->foreignId('slab_page_id')->nullable()->constrained('slab_pages')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('slabs', function (Blueprint $table) {
            $table->dropForeign(['slab_page_id']);
            $table->dropColumn('slab_page_id');
        });
    }
};
