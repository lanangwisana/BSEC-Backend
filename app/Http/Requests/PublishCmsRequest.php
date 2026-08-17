<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublishCmsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Hero Section Validation
            'hero' => 'nullable|array',
            'hero.taglineBadge' => 'nullable|string',
            'hero.headline' => 'nullable|string',
            'hero.subHeadline' => 'nullable|string',
            'hero.ctaLabel' => 'nullable|string',
            'hero.ctaRedirectUrl' => 'nullable|string',
            'hero.ctaSecondaryLabel' => 'nullable|string',
            'hero.ctaSecondaryUrl' => 'nullable|string',
            'hero.assetFileName' => 'nullable|string',
            'hero.assetHint' => 'nullable|string',
            'hero.assetMediaUrl' => 'nullable|string',
            'hero.floatingBadgeText' => 'nullable|string',
            'hero.floatingBadgeSubtext' => 'nullable|string',
            'hero.isVisible' => 'nullable|boolean',

            // Categories & Programs Validation
            'programCategories' => 'nullable|array',
            'programCategories.*.id' => 'required|string',
            'programCategories.*.name' => 'required|string',
            'programCategories.*.sortOrder' => 'nullable|integer',

            'programs' => 'nullable|array',
            'programs.*.id' => 'required|string',
            'programs.*.categoryId' => 'required|string',
            'programs.*.title' => 'required|string',
            'programs.*.description' => 'nullable|string',
            'programs.*.priceFormatted' => 'nullable|string',
            'programs.*.iconName' => 'nullable|string',
            'programs.*.targetAge' => 'nullable|string',
            'programs.*.learningObjectives' => 'nullable|string',
            'programs.*.learningFocus' => 'nullable|string',
            'programs.*.isActive' => 'nullable|boolean',
            'programs.*.sortOrder' => 'nullable|integer',

            // Testimonials Validation
            'testimonials' => 'nullable|array',
            'testimonials.*.id' => 'required|string',
            'testimonials.*.order' => 'nullable|integer',
            'testimonials.*.studentName' => 'required|string',
            'testimonials.*.studentClass' => 'nullable|string',
            'testimonials.*.avatarInitials' => 'nullable|string',
            'testimonials.*.targetPtnPassed' => 'nullable|string',
            'testimonials.*.contentSnippet' => 'nullable|string',
            'testimonials.*.avatarUrl' => 'nullable|string',
            'testimonials.*.isActive' => 'nullable|boolean',

            // About Section Validation
            'about' => 'nullable|array',
            'about.title' => 'nullable|string',
            'about.subtitle' => 'nullable|string',
            'about.descriptionParagraph1' => 'nullable|string',
            'about.descriptionParagraph2' => 'nullable|string',
            'about.visionText' => 'nullable|string',
            'about.missions' => 'nullable|array',
            'about.highlights' => 'nullable|array',
            'about.statCard1Number' => 'nullable|string',
            'about.statCard1Label' => 'nullable|string',
            'about.statCard2Number' => 'nullable|string',
            'about.statCard2Label' => 'nullable|string',
            'about.statCard3Number' => 'nullable|string',
            'about.statCard3Label' => 'nullable|string',
            'about.statCard4Number' => 'nullable|string',
            'about.statCard4Label' => 'nullable|string',

            // Advantages Validation
            'advantages' => 'nullable|array',
            'advantages.*.id' => 'required|string',
            'advantages.*.iconName' => 'nullable|string',
            'advantages.*.title' => 'required|string',
            'advantages.*.description' => 'nullable|string',
            'advantages.*.sortOrder' => 'nullable|integer',

            // Lead Capture CTA Validation
            'leadCapture' => 'nullable|array',
            'leadCapture.title' => 'nullable|string',
            'leadCapture.subtitle' => 'nullable|string',
            'leadCapture.checklistItems' => 'nullable|array',

            // Footer Validation
            'footer' => 'nullable|array',
            'footer.aboutText' => 'nullable|string',
            'footer.companyAddress' => 'nullable|string',
            'footer.companyPhone' => 'nullable|string',
            'footer.companyEmail' => 'nullable|string',
            'footer.socialLinks' => 'nullable|array',

            // Section Titles Validation
            'advantagesTitle' => 'nullable|string',
            'advantagesSubtitle' => 'nullable|string',
            'programsTitle' => 'nullable|string',
            'programsSubtitle' => 'nullable|string',
            'testimonialsTitle' => 'nullable|string',
        ];
    }
}
