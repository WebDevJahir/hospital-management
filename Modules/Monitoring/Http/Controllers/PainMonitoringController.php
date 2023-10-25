<?php

namespace Modules\Monitoring\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Monitoring\Entities\PainManagement;
use Modules\Monitoring\Entities\PainMonitoring;
use Modules\Patient\Entities\Patient;

class PainMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $patients = Patient::where('status', 'Active')->orderBy('id', 'desc')->take(20)->get();
        return view('monitoring::pain_clinic.monitoring.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $patient = Patient::find(request()->patient_id);
        $last_pain_management = PainManagement::where('patient_id', request()->patient_id)->orderBy('id', 'desc')->first();
        return view('monitoring::pain_clinic.monitoring.modal.create', compact('patient', 'last_pain_management'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['date'] = date('Y-m-d', strtotime($request->date));
        PainMonitoring::create($data);
        return redirect()->route('pain-monitoring.index')->with('success', 'Morphin Docs Created Successfully');
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
        $pain_monitorings = PainMonitoring::where('patient_id', request()->patient_id)->orderBy('id', 'desc')->get();
        return view('monitoring::pain_clinic.monitoring.modal.list', compact('pain_monitorings'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $pain_monitoring = PainMonitoring::find($id);
        $patient = Patient::find($pain_monitoring->patient_id);
        $last_pain_management = PainManagement::where('patient_id', $pain_monitoring->patient_id)->orderBy('id', 'desc')->first();
        return view('monitoring::pain_clinic.monitoring.modal.create', compact('pain_monitoring', 'patient', 'last_pain_management'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['date'] = date('Y-m-d', strtotime($request->date));
        PainMonitoring::find($id)->update($data);

        return redirect()->route('pain-monitoring.index')->with('success', 'Morphin Docs Updated Successfully');
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
