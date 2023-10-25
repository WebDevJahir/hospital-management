<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NextPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'plan',
        'notification_date',
    ];
}
 