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
        Schema::table('freelancer_tax_pages', function (Blueprint $table) {
            $table->string('comparison_first_column_label')->nullable()->after('comparison_subtitle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('freelancer_tax_pages', function (Blueprint $table) {
            //
        });
    }
};
