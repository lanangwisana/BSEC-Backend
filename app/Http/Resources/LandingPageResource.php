<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LandingPageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $hero = $this['hero'] ?? null;
        $about = $this['about'] ?? null;
        $categories = $this['categories'] ?? [];
        $programs = $this['programs'] ?? [];
        $testimonials = $this['testimonials'] ?? [];
        $advantages = $this['advantages'] ?? [];
        $advantageSection = $this['advantageSection'] ?? null;
        $leadCapture = $this['leadCapture'] ?? null;
        $settings = $this['settings'] ?? [];
        return [
            'hero' => [
                'taglineBadge' => $hero->tagline_badge ?? 'Bimbel No. 1 di Indonesia',
                'headline' => $hero->headline ?? 'Wujudkan Prestasi Akademik Terbaik Bersama BSEC',
                'subHeadline' => $hero->sub_headline ?? 'Metode belajar cerdas untuk hasil maksimal.',
                'ctaLabel' => $hero->cta_label ?? 'Daftar Kelas Trial',
                'ctaRedirectUrl' => $hero->cta_redirect_url ?? '#daftar',
                'ctaSecondaryLabel' => $hero->cta_secondary_label ?? 'Tanya Via WhatsApp',
                'ctaSecondaryUrl' => $hero->cta_secondary_url ?? 'https://wa.me/6285606201036',
                'assetMediaUrl' => $hero->asset_media_url ?? '/images/image 1.png',
                'floatingBadgeText' => $hero->floating_badge_text ?? '500+ Siswa Lolos',
                'floatingBadgeSubtext' => $hero->floating_badge_subtext ?? 'Pengajar PTN favorit berpengalaman.',
                'isVisible' => $hero->is_visible ?? true,
            ],
            'programCategories' => collect($categories)->map(fn ($cat) => [
                'id' => $cat->id,
                'name' => $cat->name,
                'sortOrder' => $cat->sort_order,
            ])->values()->all(),
            'programs' => collect($programs)->map(fn ($p) => [
                'id' => $p->id,
                'categoryId' => $p->category_id,
                'title' => $p->title,
                'description' => $p->description,
                'priceFormatted' => $p->price_formatted,
                'iconName' => $p->icon_name ?? 'school',
                'targetAge' => $p->target_age ?? '',
                'learningObjectives' => $p->learning_objectives ?? '',
                'learningFocus' => $p->learning_focus ?? '',
                'isActive' => $p->is_active ?? true,
                'sortOrder' => $p->sort_order,
            ])->values()->all(),
            'testimonials' => collect($testimonials)->map(fn ($t) => [
                'id' => $t->id,
                'order' => $t->order,
                'studentName' => $t->student_name,
                'studentClass' => $t->student_class ?? 'Class of 2024',
                'avatarInitials' => $t->avatar_initials ?? 'AR',
                'targetPtnPassed' => $t->target_ptn_passed,
                'contentSnippet' => $t->content_snippet,
                'avatarUrl' => $t->avatar_url ?? null,
                'isActive' => $t->is_active ?? true,
            ])->values()->all(),
            'about' => [
                'title' => $about->title ?? 'Tentang BSEC',
                'subtitle' => $about->subtitle ?? 'Bimbingan belajar profesional yang berkomitmen mencetak generasi unggul',
                'descriptionParagraph1' => $about->description_paragraph_1 ?? '',
                'descriptionParagraph2' => $about->description_paragraph_2 ?? '',
                'visionText' => $about->vision_text ?? '',
                'missions' => $about->missions ?? [],
                'statCard1Number' => $about->stat_card_1_number ?? '10+',
                'statCard1Label' => $about->stat_card_1_label ?? 'TAHUN PENGALAMAN',
                'statCard2Number' => $about->stat_card_2_number ?? '500+',
                'statCard2Label' => $about->stat_card_2_label ?? 'SISWA BERPRESTASI',
                'statCard3Number' => $about->stat_card_3_number ?? '95%',
                'statCard3Label' => $about->stat_card_3_label ?? 'KEPUASAN SISWA',
                'statCard4Number' => $about->stat_card_4_number ?? '2014',
                'statCard4Label' => $about->stat_card_4_label ?? 'TAHUN BERDIRI',
            ],
            'advantages' => collect($advantages)->map(fn ($adv) => [
                'id' => $adv->id,
                'iconName' => $adv->icon_name ?? 'star',
                'title' => $adv->title,
                'description' => $adv->description,
                'sortOrder' => $adv->sort_order,
            ])->values()->all(),
            'leadCapture' => [
                'title' => $leadCapture->title ?? 'Mulai Perjalanan Prestasimu Sekarang',
                'subtitle' => $leadCapture->subtitle ?? 'Dapatkan jadwal konsultasi gratis...',
                'checklistItems' => $leadCapture->checklist_items ?? [],
            ],
            'footer' => [
                'aboutText' => $settings['footer_about_text'] ?? 'Menciptakan generasi cerdas, berkarakter...',
                'companyAddress' => $settings['footer_company_address'] ?? 'Jl. Pendidikan Modern No. 42, Jakarta Selatan',
                'companyPhone' => $settings['footer_company_phone'] ?? '(021) 1234-5678',
                'companyEmail' => $settings['footer_company_email'] ?? 'info@bsec.com',
            ],
            'advantagesTitle' => $advantageSection->title ?? $settings['advantages_title'] ?? 'MENGAPA BSEC?',
            'advantagesSubtitle' => $advantageSection->subtitle ?? $settings['advantages_subtitle'] ?? 'Dedikasi kami untuk masa depan cerah anak Anda',
            'programsTitle' => $settings['programs_title'] ?? 'Program Unggulan',
            'programsSubtitle' => $settings['programs_subtitle'] ?? 'Pilih jenjang yang sesuai dengan kebutuhan akademik Anda',
            'testimonialsTitle' => $settings['testimonials_title'] ?? 'Kisah Sukses Siswa',
        ];
    }
}
