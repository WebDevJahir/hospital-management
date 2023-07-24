<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PoliceStation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
