<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IncomeSubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'income_head_id', 'project_id', 'price', 'vat_type'];

    public function incomeHead()
    {
        return $this->belongsTo(IncomeHead::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
