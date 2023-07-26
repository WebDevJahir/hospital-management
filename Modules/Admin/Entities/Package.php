<?php

namespace Modules\Admin\Entities;

use Modules\Admin\Entities\Project;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\IncomeSubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'income_head_id',
        'income_subcategory_id',
        'time',
        'duration',
        'price',
        'status',
    ];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    public function subCategory()
    {
        return $this->hasOne(IncomeSubCategory::class, 'id', 'income_subcategory_id');
    }
}
