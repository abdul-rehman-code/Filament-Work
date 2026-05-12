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
        Schema::create('capital_gain_tax_pages', function (Blueprint $col) {
            $col->id();
            $col->string('h1_title');
            $col->string('sub_title')->nullable();
            $col->longText('content')->nullable();
            $col->json('tax_reference_table')->nullable();
            $col->json('sidebar_tips')->nullable();
            $col->string('meta_title')->nullable();
            $col->text('meta_description')->nullable();
            $col->string('meta_keywords')->nullable();
            $col->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capital_gain_tax_pages');
    }
};
