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
        Schema::create('slabs', function (Blueprint $table) {
            $table->id();
            $table->string('year_range');
            $table->unsignedInteger('min_income');
            $table->unsignedInteger('max_income')->nullable();
            $table->string('fixed_tax');
            $table->string('percentage_tax');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slabs');
    }
};
