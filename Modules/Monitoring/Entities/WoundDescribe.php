<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Patient\Entities\Patient;

class WoundDescribe extends Model
{
    protected $fillable = [
        'patient_id', 'date', 'location', 'site', 'first_occured', 'wound_type'
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
