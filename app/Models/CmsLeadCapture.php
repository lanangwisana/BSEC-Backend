<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsLeadCapture extends Model
{
    protected $table = "cms_lead_captures";

    protected $fillable = [
        'title',
        'subtitle',
        'checklist_items',
    ];

    protected $casts = [
        'checklist_items' => 'array',
    ];
}
