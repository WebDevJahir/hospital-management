<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\IncomeSubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PromoCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'income_head_id',
        'income_subcategory_id',
        'from_date',
        'to_date',
        'promo_code',
        'discount'
    ];
    
    public function subCategory(){
    	return $this->hasOne(IncomeSubCategory::class, 'id','income_subcategory_id');
    }
}
