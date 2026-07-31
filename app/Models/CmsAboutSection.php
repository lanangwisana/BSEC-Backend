<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsAboutSection extends Model
{
    protected $table = "cms_about_sections";
    protected $fillable = [
        'title',
        'subtitle',
        'description_paragraph_1',
        'description_paragraph_2',
        'vision_text',
        'missions',
        'stat_card_1_number',
        'stat_card_1_label',
        'stat_card_2_number',
        'stat_card_2_label',
        'stat_card_3_number',
        'stat_card_3_label',
        'stat_card_4_number',
        'stat_card_4_label',
    ];
    
    protected $casts = [
        'missions' => 'array',
    ];
}
