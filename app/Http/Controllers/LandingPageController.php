<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CmsHeroSection;
use App\Models\CmsAboutSection;
use App\Models\CmsProgramCategory;
use App\Models\CmsProgram;
use App\Models\CmsTestimonial;
use App\Models\CmsAdvantage;
use App\Models\CmsAdvantageSection;
use App\Models\CmsLeadCapture;
use App\Models\CmsSetting;
use App\Http\Requests\PublishCmsRequest;
use App\Actions\PublishCmsAction;
use App\Http\Resources\LandingPageResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class LandingPageController extends Controller
{
    /**
     * Mengembalikan data lengkap landing page untuk publik dengan Redis/Cache layer.
     */
    public function index(): JsonResponse
    {
        $data = Cache::remember('landing_page_data', 86400, function () {
            $payload = [
                'hero' => CmsHeroSection::find(1),
                'about' => CmsAboutSection::find(1),
                'categories' => CmsProgramCategory::orderBy('sort_order')->get(),
                'programs' => CmsProgram::where('is_active', true)->orderBy('sort_order')->get(),
                'testimonials' => CmsTestimonial::where('is_active', true)->orderBy('order')->get(),
                'advantages' => CmsAdvantage::orderBy('sort_order')->get(),
                'advantageSection' => CmsAdvantageSection::find(1),
                'leadCapture' => CmsLeadCapture::find(1),
                'settings' => CmsSetting::pluck('value', 'key')->all(),
            ];
            return (new LandingPageResource($payload))->resolve();
        });

        return response()->json([
            'success' => true,
            'data' => $data,
            'cached' => true,
        ]);
    }
}
