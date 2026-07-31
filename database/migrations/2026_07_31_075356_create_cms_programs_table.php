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
        Schema::create('cms_programs', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('category_id');
            $table->foreign('category_id')->references('id')->on('cms_program_categories')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('price_formatted');
            $table->string('icon_name')->default('school');
            $table->string('target_age')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_programs');
    }
};
