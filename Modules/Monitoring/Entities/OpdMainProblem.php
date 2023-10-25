<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpdMainProblem extends Model
{
    use HasFactory;

    protected $fillable = [
        'opd_patient_infos_id',
        'bp',
        'pulse',
        'temp',
        'o2saturation',
        'pain',
        'main_problem',
    ];
}
