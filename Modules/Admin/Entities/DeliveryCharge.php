<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'police_station_id',
        'charge',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function policeStation()
    {
        return $this->belongsTo(PoliceStation::class);
    }
}
