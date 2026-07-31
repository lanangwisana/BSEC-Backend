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
        Schema::create('cms_about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Tentang BSEC');
            $table->string('subtitle');
            $table->text('description_paragraph_1');
            $table->text('description_paragraph_2')->nullable();
            $table->text('vision_text');
            $table->json('missions'); // Menyimpan array daftar misi
            
            //Stat Cards
            $table->string('stat_card_1_number')->default('10+');
            $table->string('stat_card_1_label')->default('TAHUN PENGALAMAN');
            $table->string('stat_card_2_number')->default('500+');
            $table->string('stat_card_2_label')->default('SISWA BERPRESTASI');
            $table->string('stat_card_3_number')->default('95%');
            $table->string('stat_card_3_label')->default('KEPUASAN SISWA');
            $table->string('stat_card_4_number')->default('2014');
            $table->string('stat_card_4_label')->default('TAHUN BERDIRI');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_about_sections');
    }
};
