<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IncomeHead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
