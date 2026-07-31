<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CmsHeroSection;
use App\Models\CmsAboutSection;
use App\Models\CmsProgramCategory;
use App\Models\CmsProgram;
use App\Models\CmsTestimonial;
use App\Models\CmsAdvantage;
use App\Models\CmsLeadCapture;
use App\Models\CmsSetting;
use App\Http\Requests\PublishCmsRequest;
use App\Actions\PublishCmsAction;
use App\Http\Resources\LandingPageResource;
use Illuminate\Http\JsonResponse;
class LandingPageController extends Controller
{
        /**
     * Mengembalikan data lengkap landing page untuk publik.
     */
    public function index(): JsonResponse
    {
        $payload = [
            'hero' => CmsHeroSection::find(1),
            'about' => CmsAboutSection::find(1),
            'categories' => CmsProgramCategory::orderBy('sort_order')->get(),
            'programs' => CmsProgram::where('is_active', true)->orderBy('sort_order')->get(),
            'testimonials' => CmsTestimonial::where('is_active', true)->orderBy('order')->get(),
            'advantages' => CmsAdvantage::orderBy('sort_order')->get(),
            'leadCapture' => CmsLeadCapture::find(1),
            'settings' => CmsSetting::pluck('value', 'key')->all(),
        ];
        return response()->json(new LandingPageResource($payload));
    }
}
