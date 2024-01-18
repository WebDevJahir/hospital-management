<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\Employee;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'project_id',
        'month',
        'year',
        'total_hours',
        'hours_rate',
        'total_hours_amount',
        'monthly_salary',
        'monthly_rate',
        'total_month_amount',
        'food',
        'food_rate',
        'total_food_amount',
        'oncall_onduty',
        'oncall_onduty_rate',
        'total_oncall_onduty_amount',
        'oncall_offduty',
        'oncall_offduty_rate',
        'total_oncall_offduty_amount',
        'conveyance',
        'conveyance_rate',
        'total_conveyance_amount',
        'increment',
        'increment_rate',
        'total_increment_amount',
        'extra_payment',
        'extra_payment_rate',
        'total_extra_payment_amount',
        'bonus',
        'bonus_rate',
        'total_bonus_amount',
        'provident_fund',
        'provident_fund_rate',
        'total_provident_fund_amount',
        'pay_leave',
        'pay_leave_rate',
        'total_pay_leave_amount',
        'sick_leave',
        'sick_leave_rate',
        'total_sick_leave_amount',
        'emergency_leave',
        'emergency_leave_rate',
        'total_emergency_leave_amount',
        'casual_leave',
        'casual_leave_rate',
        'total_casual_leave_amount',
        'educational_leave',
        'educational_leave_rate',
        'total_educational_leave_amount',
        'roster',
        'roster_rate',
        'total_roster_amount',
        'night',
        'night_rate',
        'total_night_amount',
        'deduction',
        'deduction_rate',
        'total_deduction_amount',
        'total_salary',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
