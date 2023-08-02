<?php

namespace Modules\Monitoring\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvestigationCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_name'];
}
