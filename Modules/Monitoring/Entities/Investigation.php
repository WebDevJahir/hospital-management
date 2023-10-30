<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Investigation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sub_category()
    {
        return $this->belongsTo(InvestigationSubCategory::class, 'sub_category_id');
    }
}
