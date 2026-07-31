<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PublishCmsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Hero Section Validation
            'hero' => 'required|array',
            'hero.taglineBadge' => 'nullable|string|max:255',
            'hero.headline' => 'required|string',
            'hero.subHeadline' => 'required|string',
            'hero.ctaLabel' => 'required|string|max:255',
            'hero.ctaRedirectUrl' => 'required|string|max:255',
            'hero.ctaSecondaryLabel' => 'nullable|string|max:255',
            'hero.ctaSecondaryUrl' => 'nullable|string|max:255',
            'hero.assetMediaUrl' => 'nullable|string',
            'hero.floatingBadgeText' => 'nullable|string|max:255',
            'hero.floatingBadgeSubtext' => 'nullable|string|max:255',
            'hero.isVisible' => 'boolean',
            // Categories & Programs Validation
            'programCategories' => 'nullable|array',
            'programCategories.*.id' => 'required|string',
            'programCategories.*.name' => 'required|string',
            'programCategories.*.sortOrder' => 'nullable|integer',
            'programs' => 'nullable|array',
            'programs.*.id' => 'required|string',
            'programs.*.categoryId' => 'required|string',
            'programs.*.title' => 'required|string',
            'programs.*.description' => 'required|string',
            'programs.*.priceFormatted' => 'required|string',
            'programs.*.iconName' => 'nullable|string',
            'programs.*.isActive' => 'boolean',
            // Testimonials Validation
            'testimonials' => 'nullable|array',
            'testimonials.*.id' => 'required|string',
            'testimonials.*.studentName' => 'required|string',
            'testimonials.*.targetPtnPassed' => 'required|string',
            'testimonials.*.contentSnippet' => 'required|string',
            'testimonials.*.isActive' => 'boolean',
            // About Section Validation
            'about' => 'required|array',
            'about.title' => 'required|string|max:255',
            'about.subtitle' => 'required|string',
            'about.descriptionParagraph1' => 'required|string',
            'about.visionText' => 'required|string',
            'about.missions' => 'nullable|array',
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
            'advantages.*.title' => 'required|string',
            'advantages.*.description' => 'required|string',
            // Lead Capture CTA Validation
            'leadCapture' => 'nullable|array',
            'leadCapture.title' => 'nullable|string',
            'leadCapture.subtitle' => 'nullable|string',
            'leadCapture.checklistItems' => 'nullable|array',
            // Footer Validation
            'footer' => 'required|array',
            'footer.aboutText' => 'required|string',
            'footer.companyAddress' => 'required|string',
            'footer.companyPhone' => 'required|string',
            'footer.companyEmail' => 'required|email',
            // Section Titles Validation
            'advantagesTitle' => 'nullable|string',
            'advantagesSubtitle' => 'nullable|string',
            'programsTitle' => 'nullable|string',
            'programsSubtitle' => 'nullable|string',
            'testimonialsTitle' => 'nullable|string',
        ];
    }
}
