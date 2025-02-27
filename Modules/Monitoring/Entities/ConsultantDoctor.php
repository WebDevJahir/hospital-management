<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsultantDoctor extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Monitoring\Database\factories\ConsultantDoctorFactory::new();
    }
}
