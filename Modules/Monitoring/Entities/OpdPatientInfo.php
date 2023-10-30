<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpdPatientInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'doctor_id',
        'date',
        'time',
        'blood_group',
        'age',
        'gender',
        'height',
        'weight',
        'contact_no',
        'email',
        'visit_no',
        'referred_by',
        'address',
        'diagnosis',
    ];

    public function opdPrescription()
    {
        return $this->hasMany(OpdPrescription::class);
    }

    public function opdAdvice()
    {
        return $this->hasOne(OpdAdvice::class);
    }

    public function opdNextPlan()
    {
        return $this->hasOne(OpdNextPlan::class);
    }

    public function opdMainProblem()
    {
        return $this->hasOne(OpdMainProblem::class);
    }
}
