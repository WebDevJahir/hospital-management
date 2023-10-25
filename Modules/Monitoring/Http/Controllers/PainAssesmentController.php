<?php

namespace Modules\Monitoring\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Monitoring\Entities\PainAssesment;
use Modules\Patient\Entities\Patient;

class PainAssesmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $patients = Patient::where('status', 'Active')->orderBy('id', 'desc')->take(20)->get();
        return view('monitoring::pain_clinic.assesment.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $patient = Patient::find(request()->patient_id);
        $patient_id = request()->patient_id;
        return view('monitoring::pain_clinic.assesment.modal.create', compact('patient', 'patient_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        PainAssesment::create($request->all());
        return redirect()->route('pain-assesment.index')->with('success', 'Pain Assesment Created Successfully');
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
        $pain_assesments = PainAssesment::where('patient_id', request()->patient_id)->orderBy('id', 'desc')->get();
        return view('monitoring::pain_clinic.assesment.modal.list', compact('pain_assesments'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $assesment = PainAssesment::find($id);
        $patient_id = $assesment->patient_id;
        return view('monitoring::pain_clinic.assesment.modal.create', compact('assesment', 'patient_id'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
            PainAssesment::find($id)->update($request->all());
            return redirect()->route('pain-assesment.index')->with('success', 'Pain Assesment Updated Successfully');
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
