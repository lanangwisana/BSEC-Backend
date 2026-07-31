<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsProgram extends Model
{
    protected $table = "cms_programs";
    protected $keyType = "string";
    public $incrementing = false;
    
    protected $fillable = [
        'id',
        'category_id',
        'title',
        'description',
        'price_formatted',
        'icon_name',
        'target_age',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(CmsProgramCategory::class, 'category_id', 'id');
    }
}
