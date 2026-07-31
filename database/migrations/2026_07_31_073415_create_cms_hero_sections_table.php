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
        Schema::create('cms_hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('tagline_badge')->default('Bimbel No. 1 di Indonesia');
            $table->string('headline');
            $table->text('sub_headline');
            $table->string('cta_label')->default('Daftar Kelas Trial');
            $table->string('cta_redirect_url')->default('#daftar');
            $table->string('cta_secondary_label')->default('Tanya Via WhatsApp');
            $table->string('cta_secondary_url')->default('https://wa.me/ 6285606201036');
            $table->string('asset_media_url')->default('/images/image 1.png');
            $table->string('floating_badge_text')->default('500+ Siswa Lolos');
            $table->string('floating_badge_subtext')->default('Pengajar PTN favorit berpengalaman.');
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_hero_sections');
    }
};
