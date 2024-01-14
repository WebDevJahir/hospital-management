<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
