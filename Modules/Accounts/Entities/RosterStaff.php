<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RosterStaff extends Model
{
    use HasFactory;

    protected $table = 'roster_staffs';

    protected $fillable = [
        'roster_id',
        'staff_id',
        'type',
        'note',
        'on_duty',
        'off_duty',
    ];
}
