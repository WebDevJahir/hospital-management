<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo', 'address', 'phone', 'email', 'website'];

    public function incomeHeads()
    {
        return $this->hasMany(IncomeHead::class);
    }
}
