<?php

namespace Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CurrentProblem extends Model
{
    use HasFactory;

    protected $fillable = ['current_problem', 'patient_id'];
    
    
}
