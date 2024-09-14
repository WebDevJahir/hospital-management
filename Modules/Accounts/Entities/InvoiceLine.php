<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'invoice_date',
        'project_id',
        'income_head_id',
        'income_subcategory_id',
        'assign_date',
        'return_date',
        'quantity',
        'price',
        'total',
        'note',
        'status'
    ];

    public function scopeInvoiceLineMonthAndYearWise($query, $month, $year)
    {
        return $query->whereMonth('invoice_date', $month)->whereYear('invoice_date', $year);
    }
}
