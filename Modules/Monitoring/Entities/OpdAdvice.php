<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpdAdvice extends Model
{
    use HasFactory;

    protected $table = 'opd_advices';

    protected $fillable = [
        'opd_patient_infos_id',
        'date',
        'advice',
    ];
}
