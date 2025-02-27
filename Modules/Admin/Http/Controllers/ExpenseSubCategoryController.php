<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\ExpenseHead;
use Modules\Admin\Entities\ExpenseSubCategory;
use Modules\Admin\Entities\Project;
use Modules\Admin\Http\Requests\ExpenseHeadRequest;
use Modules\Admin\Http\Requests\ExpenseSubCategoryRequest;

class ExpenseSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $expense_subcategories = ExpenseSubCategory::get();
        $expense_heads = ExpenseHead::get();
        $projects = Project::get();
        return view('admin::finance_settings.expense_sub_category.create', compact('expense_subcategories', 'expense_heads', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ExpenseSubCategoryRequest $request)
    {
        $data = $request->all();
        ExpenseSubCategory::create($data);
        return redirect()->back()->with('success', 'Expense Sub Category Created Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ExpenseSubCategoryRequest $request, $id)
    {
        $income_subcategory = ExpenseSubCategory::find($id);
        $data = $request->all();
        $income_subcategory->update($data);
        return redirect()->back()->with('success', 'Expense Sub Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $income_subcategory = ExpenseSubCategory::find($id);
        $income_subcategory->delete();
        return redirect()->back()->with('success', 'Expense Sub Category Deleted Successfully');
    }
}
