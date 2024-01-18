<?php

namespace Modules\Accounts\Entities;

use App\Models\User;
use Modules\Admin\Entities\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leave extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'employee_id',
        'date',
        'from_date',
        'to_date',
        'total_days',
        'leave_type',
        'recommendation_name',
        'cause_of_leave',
        'address_during_leave',
        'contact_during_leave',
        'official_name',
        'status',
        'approved_by'
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
