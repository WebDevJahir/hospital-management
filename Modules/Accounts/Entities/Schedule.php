<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\IncomeHead;
use Modules\Admin\Entities\IncomeSubCategory;
use Modules\Admin\Entities\PrescriptionDoctor;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription_doctor_id',
        'day',
        'start_time',
        'end_time',
        'per_patient_time',
        'total_serial'
    ];

    public function doctor()
    {
        return $this->belongsTo(PrescriptionDoctor::class, 'prescription_doctor_id');
    }
}
