<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PainMonitoring extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'date', 'medicine', 'dose1', 'dose2', 'dose3', 'dose4', 'dose5', 'dose6', 'dose1_status', 'dose2_status', 'dose3_status', 'dose4_status', 'dose5_status', 'dose6_status'];

    public function medicine()
    {
        return $this->hasOne(Medicine::class, 'id', 'medicine_id');
    }
}
