<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Patient\Entities\Patient;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_type',
        'patient_id',
        'invoice_date',
        'invoice_no',
        'project_id',
        'lab_id',
        'sub_total',
        'deposit',
        'discount_type',
        'discount',
        'discount_amount',
        'total',
        'payment_status',
        'advance',
        'district_id',
        'police_station_id',
        'date',
        'time',
        'address',
        'admission_date',
        'discharge_date',
        'note',
        'vat_type',
        'vat',
        'vat_amount',
        'due',
        'collection_charge',
        'delivery_charge',
        'delivery_method',
        'payment_method',
        'service_charge',
        'tracking_status',
        'video_link',
        'assign_staff',
    ];

    public function patient()
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id')->withDefault();
    }

    public function invoiceLines()
    {
        return $this->hasMany(InvoiceLine::class, 'invoice_id', 'id');
    }
}
