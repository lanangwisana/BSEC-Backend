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
        Schema::create('cms_lead_captures', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Mulai Perjalanan Prestasimu Sekarang');
            $table->text('subtitle');
            $table->json('checklist_items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_lead_captures');
    }
};
