<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsHeroSection extends Model
{
    use HasFactory;
    protected $table = 'cms_hero_section';
    protected $fillable = [
        'tagline_badge',
        'headline',
        'sub_headline',
        'cta_label',
        'cta_redirect_url',
        'cta_secondary_label',
        'cta_secondary_url',
        'asset_media_url',
        'floating_badge_text',
        'floating_badge_subtext',
        'is_visible',
    ];
    protected $casts = [
        'is_visible' => 'boolean',
    ];
}
