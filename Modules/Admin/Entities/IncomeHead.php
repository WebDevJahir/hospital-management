<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Accounts\Entities\InvoiceLine;

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

    public function invoiceLines()
    {
        return $this->hasMany(InvoiceLine::class, 'income_head_id');
    }
}
