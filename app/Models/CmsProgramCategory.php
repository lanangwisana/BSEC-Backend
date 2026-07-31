<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsProgramCategory extends Model
{
    protected $table = "cms_program_categories";
    public $incrementing = false;
    protected $keyType = "string";
    
    protected $fillable = [
        'id',
        'name',
        'sort_order',
    ];

    public function program()
    {
        return $this->hasMany(CmsProgram::class, 'category_id', 'id')->orderBy('sort_order');
    }
}
