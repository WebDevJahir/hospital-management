<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\PrescriptionDoctor;
use Modules\Patient\Entities\Patient;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'prescription_doctor_id',
        'date',
        'serial_no',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function doctor()
    {
        return $this->belongsTo(PrescriptionDoctor::class, 'prescription_doctor_id');
    }
}
