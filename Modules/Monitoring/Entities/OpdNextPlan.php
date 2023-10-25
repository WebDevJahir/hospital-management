<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpdNextPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'opd_patient_infos_id',
        'next_visit_date',
        'investigation',
    ];
}
