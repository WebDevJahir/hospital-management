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
        'discount',
        'total',
        'payment_status',
        'advance',
        'city_id',
        'thana_id',
        'date',
        'time',
        'address',
        'admission_date',
        'discharge_date',
        'discount_type',
        'total_vat_amount',
        'vat',
        'note',
        'vat_percent',
        'vat_amount',
        'discount_percent',
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
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }

    public function invoiceLines()
    {
        return $this->hasMany(InvoiceLine::class, 'invoice_id', 'id');
    }


}
