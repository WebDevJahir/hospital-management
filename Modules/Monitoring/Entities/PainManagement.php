<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PainManagement extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'medicine', 'dose', 'note', 'duration', 'dose1', 'dose2', 'dose3', 'dose4', 'dose5', 'dose6'];

    public function patient()
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }
}
