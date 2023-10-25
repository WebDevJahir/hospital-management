<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FollowUp extends Model
{
    use HasFactory;

    protected $fillable = [
        'place',
        'type',
        'reason',
        'functional_status',
        'note',
        'patient_id',
        'bp_high',
        'bp_min',
        'pulse',
        'saturation',
        'temp',
        'intake',
        'output',
        'insulin',
        'sugar',
        'other_reason',
        'other_response',
        'response',
    ];
}
