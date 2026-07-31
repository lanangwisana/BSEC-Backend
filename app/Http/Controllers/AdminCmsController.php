<?php

namespace App\Http\Controllers;

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

class AdminCmsController extends Controller
{
    /**
     * Ambil data draft CMS untuk di-load oleh halaman Admin CMS.
     */
    public function sections(): JsonResponse
    {
        $payload = [
            'hero' => CmsHeroSection::find(1),
            'about' => CmsAboutSection::find(1),
            'categories' => CmsProgramCategory::orderBy('sort_order')->get(),
            'programs' => CmsProgram::orderBy('sort_order')->get(),
            'testimonials' => CmsTestimonial::orderBy('order')->get(),
            'advantages' => CmsAdvantage::orderBy('sort_order')->get(),
            'leadCapture' => CmsLeadCapture::find(1),
            'settings' => CmsSetting::pluck('value', 'key')->all(),
        ];
        return response()->json(new LandingPageResource($payload));
    }

    /**
     * Simpan & Publikasikan perubahan CMS dari Admin Panel ke PostgreSQL.
     */
    public function publish(PublishCmsRequest $request, PublishCmsAction $action): JsonResponse
    {
        $data = $request->all();
        $action->execute($data);
        
        return response()->json([
            'success' => true,
            'message' => 'Konten CMS berhasil disimpan dan dipublikasikan ke PostgreSQL.',
        ], 200);
    }
}
