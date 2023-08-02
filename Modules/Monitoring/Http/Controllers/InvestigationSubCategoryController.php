<?php

namespace Modules\Monitoring\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Monitoring\Entities\InvestigationCategory;
use Modules\Monitoring\Entities\InvestigationSubCategory;

class InvestigationSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = InvestigationCategory::latest()->get();
        $sub_categories = InvestigationSubCategory::with('category')->latest()->get();
        return view('monitoring::investigation.sub-categories.create', compact("categories", "sub_categories"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('monitoring::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        InvestigationSubCategory::create($request->all());
        return redirect()->back()->with("success", "Investigation Sub Category created successfully");
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('monitoring::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('monitoring::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(InvestigationSubCategory $investigationSubCategory, Request $request)
    {
        $investigationSubCategory->update($request->all());
        return redirect()->back()->with("success", "Investigation Sub Category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(InvestigationSubCategory $investigationSubCategory)
    {
        $investigationSubCategory->delete();
        return redirect()->back()->with("success", "Investigation Sub Category deleted successfully");
    }
}
