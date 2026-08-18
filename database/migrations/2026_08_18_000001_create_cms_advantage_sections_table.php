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
        Schema::create('cms_advantage_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('MENGAPA BSEC?');
            $table->string('subtitle')->default('Dedikasi kami untuk masa depan cerah anak Anda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_advantage_sections');
    }
};
