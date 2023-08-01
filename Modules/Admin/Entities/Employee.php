<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'father_name',
        'mother_name',
        'date_of_birth',
        'image',
        'age',
        'gender',
        'present_address',
        'permanent_address',
        'reference',
        'employee_type',
        'user_type',
        'doctor_description',
        'guardian_docuemnt_no',
        'bmdc_reg_no',
        'bnc_reg_no',
        'document_no',
        'contact_number',
        'alternative_contact_nunber',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
