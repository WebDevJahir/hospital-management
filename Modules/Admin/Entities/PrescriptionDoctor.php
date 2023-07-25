<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrescriptionDoctor extends Model
{
    protected $fillable = [
        'doctor_name',
        'status',
        'description'
    ];
}
