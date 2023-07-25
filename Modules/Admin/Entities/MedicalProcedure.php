<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalProcedure extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'project_id',
        'income_head_id',
        'income_sub_category_id',
        'image',
        'charge',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function incomeHead()
    {
        return $this->belongsTo(IncomeHead::class);
    }

    public function incomeSubCategory()
    {
        return $this->belongsTo(IncomeSubCategory::class, 'income_sub_category_id');
    }
}
