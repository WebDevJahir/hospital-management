<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Accounts\Entities\Schedule;

class PrescriptionDoctor extends Model
{
    protected $fillable = [
        'doctor_name',
        'status',
        'description'
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
