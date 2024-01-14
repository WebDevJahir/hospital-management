<?php

namespace App\Http\Controllers;

use Modules\Accounts\Entities\PaymentMethod;
use Modules\Admin\Entities\ExpenseHead;
use Modules\Admin\Entities\ExpenseSubCategory;
use Modules\Admin\Entities\IncomeHead;
use Modules\Admin\Entities\IncomeSubCategory;

class CommonApiController extends Controller
{
    public function getAccountHead()
    {
        $account_head = IncomeHead::query()
            ->where('project_id', request()->project_id)
            ->latest()
            ->get();

        return response()->json($account_head);
    }

    public function getSubCategory()
    {
        $sub_category = IncomeSubCategory::query()
            ->where('income_head_id', request()->income_head_id)
            ->latest()
            ->get();

        return response()->json($sub_category);
    }

    public function getCharge()
    {
        $sub_category = IncomeSubCategory::query()
            ->where('id', request()->income_subcategory_id)
            ->first();

        return $sub_category->price;
    }

    public function getIncomeHead()
    {
        $income_head = IncomeHead::select('id', 'name')
            ->where('project_id', request()->project_id)
            ->latest()
            ->get();

        return response()->json($income_head);
    }

    public function getIncomeSubCategory()
    {
        $income_subcategory = IncomeSubCategory::select('id', 'name', 'price', 'vat')
            ->where('income_head_id', request()->income_head_id)
            ->latest()
            ->get();

        return response()->json($income_subcategory);
    }

    public function getPaymentMethod()
    {
        $paymentMethod = PaymentMethod::get();
        return $paymentMethod;
    }

    public function getExpenseHead()
    {
        $expense_head = ExpenseHead::select('id', 'name')
            ->where('project_id', request()->project_id)
            ->latest()
            ->get();

        return response()->json($expense_head);
    }

    public function getExpenseSubCategory()
    {
        $expense_subcategory = ExpenseSubCategory::select('id', 'name')
            ->where('expense_head_id', request()->expense_head_id)
            ->latest()
            ->get();

        return response()->json($expense_subcategory);
    }
}
