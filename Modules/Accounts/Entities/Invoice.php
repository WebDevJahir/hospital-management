<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'invoice_date', 'invoice_no', 'invoice_type', 'sub_total', 'discount', 'delivery_method', 'advance', 'city_id', 'collection_charge', 'delivery_charge', 'service_charge', 'due', 'total', 'project_id', 'payment_status'];
}
