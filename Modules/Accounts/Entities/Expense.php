<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\Employee;
use Modules\Admin\Entities\Project;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_no',
        'date',
        'project_id',
        'type',
        'payment_status',
        'employee_id',
        'received_by',
        'created_by',
        'approved_by',
        'total',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function expenseLines()
    {
        return $this->hasMany(ExpenseLine::class, 'expense_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
