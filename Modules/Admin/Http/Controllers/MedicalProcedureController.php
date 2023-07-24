<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\City;
use Modules\Admin\Entities\MedicalProcedure;
use Modules\Admin\Entities\Project;
use Modules\Admin\Http\Requests\MedicalProcedureRequest;


class MedicalProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $medical_procedures = MedicalProcedure::all();
        $projects = Project::all();
        $cities = City::all();
        return view('admin::basic_settings.medical_procedure.create', compact('medical_procedures', 'projects', 'cities'));
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
        $data = $request->except('_token');
        $medical_procedure = MedicalProcedure::create($data);
        if ($medical_procedure) {
            return redirect()->back()->with('success', 'Medical  Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Medical Procedure Added Failed');
        }
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
    public function update(MedicalProcedure $medical_procedure, MedicalProcedureRequest $request)
    {
        $data = $request->except('_token');
        $medical_procedure->update($data);
        if ($medical_procedure) {
            return redirect()->back()->with('success', 'Medical Procedure Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Medical Procedure Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(MedicalProcedure $medical_procedure)
    {
        $medical_procedure->delete();
        if ($medical_procedure) {
            return redirect()->back()->with('success', 'Medical Procedure Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Medical Procedure Deleted Failed');
        }
    }
}
