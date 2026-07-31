<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsAdvantage extends Model
{
    protected $table = 'cms_advantages';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'icon_name',
        'title',
        'description',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}
