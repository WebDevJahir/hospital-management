<?php

namespace Modules\Admin\Http\Controllers;

use App\UserRole;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Employee;
use Modules\Admin\Entities\Role;
use Modules\Admin\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $employees = Employee::all();
        $roles = Role::all();
        return view('admin::configuration.employee.index', compact('employees', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $employee = new Employee();
        $roles = Role::all();
        return view('admin::configuration.employee.modals.modal', compact('employee', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $data = $request->except('_token', '_method');
        $employee = Employee::create($data);
        return redirect()->route('admin.employee.index')->with('success', 'Employee created successfully');
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
    public function edit(Employee $employee)
    {
        $roles = Role::all();
        return view('admin::configuration.employee.modals.modal', compact('employee', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $data = $request->except('_token', '_method');
        $employee->update($data);
        return redirect()->route('admin.employee.index')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect()->route('admin.employee.index')->with('success', 'Employee deleted successfully');
    }
}
