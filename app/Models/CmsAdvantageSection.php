<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsAdvantageSection extends Model
{
    protected $table = 'cms_advantage_sections';

    protected $fillable = [
        'title',
        'subtitle',
    ];
}
