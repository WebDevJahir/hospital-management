<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Patient\Entities\Patient;

class DeathCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'issue_date',
        'patient_name',
        'date_of_birth',
        'nationality',
        'marital_status',
        'nid_passport',
        'fs_type',
        'father_spouse_name',
        'present_address',
        'death_date',
        'death_place',
        'registration_date',
        'consultant_doctor_id',
        'gender',
        'religion',
        'primary_diagnosis',
        'permanent_address',
        'other_place',
        'death_time',
        'death_cause',
        'received_by',
        'relation',
        'doctor_id',
    ];

    public function patient()
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }
}
