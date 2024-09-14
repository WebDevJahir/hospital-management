<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Accounts\Entities\ExpenseLine;

class ExpenseHead extends Model
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

    public function expenseLines()
    {
        return $this->hasMany(ExpenseLine::class);
    }
}
