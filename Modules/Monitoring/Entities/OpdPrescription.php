<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpdPrescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'opd_patient_info_id',
        'date',
        'medicine_name',
        'dose',
        'duration',
        'note',
    ];
}
