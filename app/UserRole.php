<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rolename',
    ];
    
}
