<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WoundManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'date',
        'debridement',
        'solution',
        'product_used',
        'frequency',
        'next_date',
    ];
}
