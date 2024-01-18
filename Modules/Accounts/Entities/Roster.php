<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roster extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'patient_id',
        'note',
        'title',
    ];

    public function patient()
    {
        return $this->belongsTo('Modules\Patient\Entities\Patient');
    }

    public function rosterStaffs()
    {
        return $this->hasMany('Modules\Accounts\Entities\RosterStaff');
    }
}
