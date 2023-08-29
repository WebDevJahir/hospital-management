<?php

namespace Modules\Patient\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Package;
use Modules\Admin\Entities\PrescriptionDoctor;
use Modules\Patient\Entities\Patient;

class PatientProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $patients = Patient::with('package')->orderBy('id', 'desc')->take(20)->get();
        return view('patient::patient_profile.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('patient::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('patient::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $packages = Package::get();
        $patient = Patient::with('user', 'patientDetail', 'patientReferral', 'primaryDiseases', 'concernDiseases', 'previousTreatment', 'functionStatus', 'currentProblem')->where('id', $id)->first();
        $doctors = PrescriptionDoctor::get();
        return view('patient::patient_profile.edit', compact('patient', 'packages', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
