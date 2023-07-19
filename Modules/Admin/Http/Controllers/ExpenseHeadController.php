<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\ExpenseHead;
use Modules\Admin\Entities\IncomeHead;
use Modules\Admin\Entities\Project;
use Modules\Admin\Http\Requests\ExpenseHeadRequest;

class ExpenseHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $expense_heads = ExpenseHead::all();
        $projects = Project::all();
        return view('admin::finance_settings.expense_head.create', compact('expense_heads', 'projects'));
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
    public function store(Request $request)
    {
        $data = $request->all();
        ExpenseHead::create($data);
        return redirect()->back()->with('success', 'Expense Head Created Successfully');
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
    public function update(ExpenseHead $expense_head, ExpenseHeadRequest $request)
    {
        $data = $request->all();
        $expense_head->update($data);
        return redirect()->back()->with('success', 'Expense Head Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(ExpenseHead $expense_head)
    {
        $expense_head->delete();
        return redirect()->back()->with('success', 'Expense Head Deleted Successfully');
    }
}
