<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AdminCmsController;

// Public Landing Page API
Route::get('/landing-page', [LandingPageController::class, 'index']);

// Admin CMS APIs
Route::get('/admin/cms/sections', [AdminCmsController::class, 'sections']);
Route::post('/admin/cms/publish', [AdminCmsController::class, 'publish']);
