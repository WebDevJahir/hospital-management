<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Accounts\Entities\ExpenseLine;

class ExpenseSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ExpenseSubCategoryFactory::new();
    }

    public function expenseLines()
    {
        return $this->hasMany(ExpenseLine::class, 'expense_sub_category_id');
    }
}
