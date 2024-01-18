<?php

namespace Modules\Admin\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Accounts\Entities\RosterStaff;

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

    public function rosterStaff()
    {
        return $this->hasMany(RosterStaff::class);
    }

    public function scopeRosterCount($query, $month, $year)
    {
        return $query->withCount([
            'rosterStaff as morning_roster_count' => function ($query) use ($month, $year) {
                $query->where('type', 'morning')->whereMonth('start', $month)->whereYear('start', $year);
            },
            'rosterStaff as evening_roster_count' => function ($query) use ($month, $year) {
                $query->where('type', 'evening')->whereMonth('start', $month)->whereYear('start', $year);
            },
            'rosterStaff as night_roster_count' => function ($query) use ($month, $year) {
                $query->where('type', 'night')->whereMonth('start', $month)->whereYear('start', $year);
            },
            'rosterStaff as visit_roster_count' => function ($query) use ($month, $year) {
                $query->where('type', 'visit')->whereMonth('start', $month)->whereYear('start', $year);
            },
        ]);
    }
}
