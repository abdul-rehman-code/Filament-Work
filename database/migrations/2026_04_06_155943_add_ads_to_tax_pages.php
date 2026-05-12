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
        $tables = [
            'salary_tax_pages',
            'freelancer_tax_pages',
            'youtuber_tax_pages',
            'rental_tax_pages',
            'capital_gain_tax_pages',
        ];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->text('ad_top')->nullable();
                $table->text('ad_middle')->nullable();
                $table->text('ad_sidebar')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'salary_tax_pages',
            'freelancer_tax_pages',
            'youtuber_tax_pages',
            'rental_tax_pages',
            'capital_gain_tax_pages',
        ];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->dropColumn(['ad_top', 'ad_middle', 'ad_sidebar']);
            });
        }
    }
};
