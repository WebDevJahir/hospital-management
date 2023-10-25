<?php

namespace Modules\Monitoring\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Monitoring\Entities\WoundManagement;
use Modules\Patient\Entities\Patient;


class WoundManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $patients = Patient::where('status', 'Active')->orderBy('id', 'desc')->take(20)->get();
        return view('monitoring::wound_clinic.management.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $patient = Patient::find(request()->patient_id);
        $patient_id = request()->patient_id;
        return view('monitoring::wound_clinic.management.modal.create', compact('patient', 'patient_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        WoundManagement::create($request->all());
        return redirect()->route('wound-management.index')->with('success', 'Wound Management Created Successfully');
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

    public function list()
    {
        $wound_managements = WoundManagement::where('patient_id', request()->patient_id)->orderBy('id', 'desc')->get();
        return view('monitoring::wound_clinic.management.modal.list', compact('wound_managements'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $wound_management = WoundManagement::find($id);
        $patient = Patient::find($wound_management->patient_id);
        return view('monitoring::wound_clinic.management.modal.create', compact('wound_management', 'patient'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        WoundManagement::find($id)->update($request->all());
        return redirect()->route('wound-management.index')->with('success', 'Wound Management Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
