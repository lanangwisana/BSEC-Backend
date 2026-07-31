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
        Schema::create('cms_testimonials', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('order')->default(1);
            $table->string('student_name');
            $table->string('student_class')->default('Class of 2024');
            $table->string('avatar_initials')->default('AR');
            $table->string('target_ptn_passed');
            $table->text('content_snippet');
            $table->string('avatar_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_testimonials');
    }
};
