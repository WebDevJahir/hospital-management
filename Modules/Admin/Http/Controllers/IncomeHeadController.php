<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\IncomeHead;
use Modules\Admin\Entities\Project;
use Modules\Admin\Http\Requests\IncomeHeadRequest;

class IncomeHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $income_heads = IncomeHead::all();
        $projects = Project::all();
        return view('admin::finance_settings.income_head.create', compact('income_heads', 'projects'));
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
    public function store(IncomeHeadRequest $request)
    {
        $data = $request->all();
        IncomeHead::create($data);
        return redirect()->back()->with('success', 'Income Head Created Successfully');
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
    public function update(IncomeHead $income_head, IncomeHeadRequest $request)
    {
        $data = $request->all();
        $income_head->update($data);
        return redirect()->back()->with('success', 'Income Head Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(IncomeHead $income_head)
    {
        $income_head->delete();
        return redirect()->back()->with('success', 'Income Head Deleted Successfully');
    }
}
