<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\IncomeSubCategory;
use Modules\Admin\Entities\IncomeHead;
use Modules\Admin\Entities\Project;
use Modules\Admin\Http\Requests\IncomeSubCategoryRequest;

class IncomeSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $income_subcategories = IncomeSubCategory::get();
        $income_heads = IncomeHead::get();
        $projects = Project::get();
        return view('admin::finance_settings.income_sub_category.create', compact('income_subcategories', 'income_heads', 'projects'));
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
    public function store(IncomeSubCategoryRequest $request)
    {
        $data = $request->all();
        IncomeSubCategory::create($data);
        return redirect()->back()->with('success', 'Income Sub Category Created Successfully');
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
    public function update(IncomeSubCategoryRequest $request, $id)
    {
        $income_subcategory = IncomeSubCategory::find($id);
        $data = $request->all();
        $income_subcategory->update($data);
        return redirect()->back()->with('success', 'Income Sub Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $income_subcategory = IncomeSubCategory::find($id);
        $income_subcategory->delete();
        return redirect()->back()->with('success', 'Income Sub Category Deleted Successfully');
    }
}
