<?php

namespace App\Actions;

use App\Models\CmsHeroSection;
use App\Models\CmsAboutSection;
use App\Models\CmsProgramCategory;
use App\Models\CmsProgram;
use App\Models\CmsTestimonial;
use App\Models\CmsTestimonialSection;
use App\Models\CmsAdvantage;
use App\Models\CmsAdvantageSection;
use App\Models\CmsLeadCapture;
use App\Models\CmsSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class PublishCmsAction
{
    /**
     * Jalankan transaksi penyimpanan seluruh perubahan data CMS ke PostgreSQL.
     */
    public function execute(array $data): bool
    {
        $result = DB::transaction(function () use ($data) {
            // 1. Update / Create Hero Section
            if (isset($data['hero'])) {
                CmsHeroSection::updateOrCreate(
                    ['id' => 1],
                    [
                        'tagline_badge' => $data['hero']['taglineBadge'] ?? 'Bimbel No. 1 di Indonesia',
                        'headline' => $data['hero']['headline'] ?? 'Wujudkan Prestasi Akademik Terbaik Bersama BSEC',
                        'sub_headline' => $data['hero']['subHeadline'] ?? 'Metode belajar cerdas untuk hasil maksimal.',
                        'cta_label' => $data['hero']['ctaLabel'] ?? 'Daftar Kelas Trial',
                        'cta_redirect_url' => $data['hero']['ctaRedirectUrl'] ?? '#daftar',
                        'cta_secondary_label' => $data['hero']['ctaSecondaryLabel'] ?? 'Tanya Via WhatsApp',
                        'cta_secondary_url' => $data['hero']['ctaSecondaryUrl'] ?? 'https://wa.me/6285606201036',
                        'asset_media_url' => $data['hero']['assetMediaUrl'] ?? '/images/image 1.png',
                        'floating_badge_text' => $data['hero']['floatingBadgeText'] ?? '500+ Siswa Lolos',
                        'floating_badge_subtext' => $data['hero']['floatingBadgeSubtext'] ?? 'Pengajar PTN favorit berpengalaman.',
                        'is_visible' => $data['hero']['isVisible'] ?? true,
                    ]
                );
            }

            // 2. Update / Create About Section & 4 Stat Cards
            if (isset($data['about'])) {
                CmsAboutSection::updateOrCreate(
                    ['id' => 1],
                    [
                        'title' => $data['about']['title'] ?? 'Tentang BSEC',
                        'subtitle' => $data['about']['subtitle'] ?? 'Bimbingan belajar profesional yang berkomitmen mencetak generasi unggul',
                        'description_paragraph_1' => $data['about']['descriptionParagraph1'] ?? '',
                        'description_paragraph_2' => $data['about']['descriptionParagraph2'] ?? null,
                        'vision_text' => $data['about']['visionText'] ?? '',
                        'missions' => $data['about']['missions'] ?? [],
                        'stat_card_1_number' => $data['about']['statCard1Number'] ?? '10+',
                        'stat_card_1_label' => $data['about']['statCard1Label'] ?? 'TAHUN PENGALAMAN',
                        'stat_card_2_number' => $data['about']['statCard2Number'] ?? '500+',
                        'stat_card_2_label' => $data['about']['statCard2Label'] ?? 'SISWA BERPRESTASI',
                        'stat_card_3_number' => $data['about']['statCard3Number'] ?? '95%',
                        'stat_card_3_label' => $data['about']['statCard3Label'] ?? 'KEPUASAN SISWA',
                        'stat_card_4_number' => $data['about']['statCard4Number'] ?? '2014',
                        'stat_card_4_label' => $data['about']['statCard4Label'] ?? 'TAHUN BERDIRI',
                    ]
                );
            }

            // 3. Sync Categories & Programs (dengan penanganan Hapus/Delete)
            if (isset($data['programCategories'])) {
                $catIds = array_map(fn($item) => $item['id'], $data['programCategories']);
                foreach ($data['programCategories'] as $cat) {
                    CmsProgramCategory::updateOrCreate(
                        ['id' => $cat['id']],
                        ['name' => $cat['name'], 'sort_order' => $cat['sortOrder'] ?? 1]
                    );
                }
                if (!empty($catIds)) {
                    CmsProgramCategory::whereNotIn('id', $catIds)->delete();
                } else {
                    CmsProgramCategory::query()->delete();
                }
            }

            if (isset($data['programs'])) {
                $progIds = array_map(fn($item) => $item['id'], $data['programs']);
                foreach ($data['programs'] as $p) {
                    CmsProgram::updateOrCreate(
                        ['id' => $p['id']],
                        [
                            'category_id' => $p['categoryId'],
                            'title' => $p['title'],
                            'description' => $p['description'] ?? '',
                            'price_formatted' => !empty($p['priceFormatted']) ? $p['priceFormatted'] : null,
                            'icon_name' => $p['iconName'] ?? 'school',
                            'target_age' => $p['targetAge'] ?? null,
                            'learning_objectives' => $p['learningObjectives'] ?? null,
                            'learning_focus' => $p['learningFocus'] ?? null,
                            'is_active' => $p['isActive'] ?? true,
                            'sort_order' => $p['sortOrder'] ?? 1,
                        ]
                    );
                }
                if (!empty($progIds)) {
                    CmsProgram::whereNotIn('id', $progIds)->delete();
                } else {
                    CmsProgram::query()->delete();
                }
            }

            // 4. Sync Testimonials (dengan penanganan Hapus/Delete)
            if (isset($data['testimonials'])) {
                $testiIds = array_map(fn($item) => $item['id'], $data['testimonials']);
                foreach ($data['testimonials'] as $t) {
                    CmsTestimonial::updateOrCreate(
                        ['id' => $t['id']],
                        [
                            'order' => $t['order'] ?? 1,
                            'student_name' => $t['studentName'],
                            'student_class' => $t['studentClass'] ?? null,
                            'avatar_initials' => $t['avatarInitials'] ?? 'AR',
                            'target_ptn_passed' => $t['targetPtnPassed'] ?? null,
                            'content_snippet' => $t['contentSnippet'] ?? '',
                            'avatar_url' => $t['avatarUrl'] ?? null,
                            'is_active' => $t['isActive'] ?? true,
                        ]
                    );
                }
                if (!empty($testiIds)) {
                    CmsTestimonial::whereNotIn('id', $testiIds)->delete();
                } else {
                    CmsTestimonial::query()->delete();
                }
            }

            // 4b. Update / Create Testimonial Section (Title)
            if (isset($data['testimonialsTitle'])) {
                CmsTestimonialSection::updateOrCreate(
                    ['id' => 1],
                    [
                        'title' => $data['testimonialsTitle'] ?? 'Kisah Sukses Siswa',
                    ]
                );
            }

            // 5. Sync Advantages (dengan penanganan Hapus/Delete)
            if (isset($data['advantages'])) {
                $advIds = array_map(fn($item) => $item['id'], $data['advantages']);
                foreach ($data['advantages'] as $adv) {
                    CmsAdvantage::updateOrCreate(
                        ['id' => $adv['id']],
                        [
                            'icon_name' => $adv['iconName'] ?? 'star',
                            'title' => $adv['title'],
                            'description' => $adv['description'] ?? '',
                            'sort_order' => $adv['sortOrder'] ?? 1,
                        ]
                    );
                }
                if (!empty($advIds)) {
                    CmsAdvantage::whereNotIn('id', $advIds)->delete();
                } else {
                    CmsAdvantage::query()->delete();
                }
            }

            // 5b. Update / Create Advantage Section (Title & Subtitle)
            if (isset($data['advantagesTitle']) || isset($data['advantagesSubtitle'])) {
                CmsAdvantageSection::updateOrCreate(
                    ['id' => 1],
                    [
                        'title' => $data['advantagesTitle'] ?? 'MENGAPA BSEC?',
                        'subtitle' => $data['advantagesSubtitle'] ?? 'Dedikasi kami untuk masa depan cerah anak Anda',
                    ]
                );
            }

            // 6. Update / Create Lead Capture CTA
            if (isset($data['leadCapture'])) {
                CmsLeadCapture::updateOrCreate(
                    ['id' => 1],
                    [
                        'title' => $data['leadCapture']['title'] ?? 'Mulai Perjalanan Prestasimu Sekarang',
                        'subtitle' => $data['leadCapture']['subtitle'] ?? '',
                        'checklist_items' => $data['leadCapture']['checklistItems'] ?? [],
                    ]
                );
            }

            // 7. Update Settings (Section Titles & Footer)
            $settingsMap = [
                'advantages_title' => $data['advantagesTitle'] ?? null,
                'advantages_subtitle' => $data['advantagesSubtitle'] ?? null,
                'programs_title' => $data['programsTitle'] ?? null,
                'programs_subtitle' => $data['programsSubtitle'] ?? null,
                'testimonials_title' => $data['testimonialsTitle'] ?? null,
                'footer_about_text' => $data['footer']['aboutText'] ?? null,
                'footer_company_address' => $data['footer']['companyAddress'] ?? null,
                'footer_company_phone' => $data['footer']['companyPhone'] ?? null,
                'footer_company_email' => $data['footer']['companyEmail'] ?? null,
            ];

            foreach ($settingsMap as $key => $val) {
                if ($val !== null) {
                    CmsSetting::updateOrCreate(['key' => $key], ['value' => $val]);
                }
            }

            return true;
        });

        // Invalidate public landing page cache instantly upon publication
        Cache::forget('landing_page_data');

        return $result;
    }
}
