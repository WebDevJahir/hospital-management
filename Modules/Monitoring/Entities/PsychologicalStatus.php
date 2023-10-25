<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PsychologicalStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'date',
        'anxious_or_worried',
        'anxious_or_worried',
        'depressed',
    ];
}
