<?php

namespace App\Http\Controllers;

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
}
