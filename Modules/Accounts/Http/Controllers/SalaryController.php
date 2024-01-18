<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Salary;
use Modules\Admin\Entities\Employee;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $salaries = Salary::latest()->get();
        return view('accounts::salary.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $employees = Employee::all();
        return view('accounts::salary.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');
        $salary = Salary::create($data);
        return redirect()->route('accounts.salary.index')->with('success', 'Salary created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('accounts::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $salary = Salary::find($id);
        $employees = Employee::all();
        return view('accounts::salary.create', compact('salary', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $salary = Salary::find($id);
        $data = $request->except('_token', '_method');
        $salary->update($data);
        return redirect()->route('salary.index')->with('success', 'Salary updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $salary = Salary::find($id);
        $salary->delete();
        return redirect()->route('salary.index')->with('success', 'Salary deleted successfully');
    }
}
