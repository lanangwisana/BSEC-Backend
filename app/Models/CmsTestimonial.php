<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsTestimonial extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = "cms_testimonials";

    protected $fillable = [
        'id',
        'order',
        'student_name',
        'student_class',
        'avatar_initials',
        'target_ptn_passed',
        'content_snippet',
        'avatar_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
