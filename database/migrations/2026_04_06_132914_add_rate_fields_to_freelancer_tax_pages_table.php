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
            $table->string('pseb_rate_label')->nullable()->after('comparison_subtitle');
            $table->decimal('pseb_rate_value', 5, 4)->nullable()->after('pseb_rate_label'); // e.g. 0.0025
            $table->string('non_pseb_rate_label')->nullable()->after('pseb_rate_value');
            $table->decimal('non_pseb_rate_value', 5, 4)->nullable()->after('non_pseb_rate_label'); // e.g. 0.0100
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
