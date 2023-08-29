<?php

namespace Modules\Monitoring\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rules\In;
use Modules\Monitoring\Entities\InvestigationCategory;
use Modules\Monitoring\Http\Requests\InvestigationCategoryRequest;

class InvestigationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $investigationCategories = InvestigationCategory::latest()->get();
        return view('monitoring::investigation.categories.create', compact("investigationCategories"));
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
    public function store(InvestigationCategoryRequest $request)
    {
        $data = $request->only("category_name");
        InvestigationCategory::create($data);
        return redirect()->back()->with("success", "Investigation Category created successfully");
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
    public function update(InvestigationCategory $investigationCategory, InvestigationCategoryRequest $request)
    {
        $data = $request->only("category_name");
        $investigationCategory->update($data);
        return redirect()->back()->with("success", "Investigation Category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(InvestigationCategory $investigationCategory)
    {
        $investigationCategory->delete();
        return redirect()->back()->with("success", "Investigation Category deleted successfully");
    }
}
