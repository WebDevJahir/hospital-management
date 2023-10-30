<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PainAssesment extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'date', 'pain_location', 'radiation', 'severity', 'change_of_time', 'relieving_factors', 'cause_of_pain'];
}
