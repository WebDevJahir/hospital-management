<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Monitoring\Entities\InvestigationCategory;

class InvestigationSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'maximum_value',
        'minimum_value',
        'unit',
    ];

    public function category()
    {
        return $this->hasOne(InvestigationCategory::class, 'id', 'category_id');
    }
}
