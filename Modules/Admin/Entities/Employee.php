<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'last_name',
        'father_name',
        'mother_name',
        'image',
        'age',
        'sex',
        'present_address',
        'permanent_address',
        'reference',
        'employee_type',
        'user_type',
        'doctor_description',
        'parents_nid',
        'bmdc_reg_no',
        'bnc_reg_no',
        'nid',
        'mobile',
        'alternative_mobile',
        'email',
        'montyly_salary',
        'hourly_salary',
        'roster',
        'food',
        'night',
        'oncall_onduty',
        'oncall_offduty',
        'conveyance',
        'increment',
        'bonus',
        'provident_fund',
        'casual_leave',
        'sick_leave',
        'emergency_leave',
        'pay_leave',
        'educational_leave',
        'status',
        'deduction',
        'username',
        'password',
        'text_password',
    ];
}
