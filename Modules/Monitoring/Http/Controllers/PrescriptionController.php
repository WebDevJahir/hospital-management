<?php

namespace Modules\Monitoring\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Monitoring\Entities\Followups;
use Modules\Monitoring\Entities\Prescription;
use Modules\Monitoring\Entities\Roster;
use Modules\Patient\Entities\Patient;
use Carbon\Carbon;
use Modules\Admin\Entities\Package;
use Modules\Admin\Entities\PrescriptionDoctor;
use Modules\Monitoring\Entities\Medicine;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $patients = Patient::where('package_id', '!=', 13)->where('status', 'Active')->orderBy('id', 'desc')->take(20)->get();
        return view('monitoring::prescription.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($id)
    {
        $patient = Patient::with('package', 'user', 'primaryDiseases')->where('id', $id)->first();
        $followup = Followups::where('patient_id', $id)->orderBy('id', 'desc')->first();
        $getMedicines = Prescription::where('patient_id', $id)->whereIn('status', ['new', 'old'])->orderBy('id', 'desc')->get();
        $getCancelMedicines = Prescription::where('patient_id', $id)->where('status', 'cancel')->orderBy('id', 'desc')->get();
        $nurse_duty = Roster::where('patient_id', $patient->user_id)->whereDate('start', '=', Carbon::now()->toDateString())->orderBy('id', 'desc')->get();
        $doctors = PrescriptionDoctor::get();
        $medicines = Medicine::get();
        $package = Package::where('id', $patient->package_id)->first();
        return view('monitoring::prescription.create', compact('patient', 'followup', 'getMedicines', 'getCancelMedicines', 'nurse_duty', 'doctors', 'medicines', 'package'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $check_medicine = Medicine::where('name', $request->medicine)->first();
        if (!$check_medicine) {
            $medicine_data = $request->only('medicine');
            $medicine = Medicine::create($medicine_data);
        }
        $prescription_data = $request->only('patient_id', 'medicine', 'note', 'dose', 'duration');
        $prescription = Prescription::create($prescription_data);
        return $prescription;
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
    public function edit(Request $request)
    {
        $medicines = Medicine::get();
        $edit_medicine = Prescription::find($request->id);
        return view('monitoring::prescription.prescription_layout.edit_medicine_modal', compact('edit_medicine', 'medicines'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $check_medicine = Medicine::where('name', $request->medicine)->first();
        if (!$check_medicine) {
            $medicine_data = $request->only('medicine');
            $medicine = Medicine::create($medicine_data);
        }
        $prescription_data = $request->only('medicine', 'note', 'dose', 'duration');
        $prescription = Prescription::find($request->id);
        $prescription->update($prescription_data);
        return $prescription;
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

    public function activeMedicine(Request $request)
    {
        $medicine = Prescription::find($request->id);
        $medicine->status = 'old';
        $medicine->generate = 'no';
        $medicine->save();
        return $medicine;
    }

    public function getInvestigation(Request $request)
    {
        $bp_high = Followups::where('patient_id', $request->patient_id)->where('bp_high', '!=', '')->orderBy('id', 'desc')->take(5)->get(['bp_high', 'created_at']);
        $bp_min = Followups::where('patient_id', $request->patient_id)->where('bp_min', '!=', '')->orderBy('id', 'desc')->take(5)->get(['bp_min', 'created_at']);
        $pulse = Followups::where('patient_id', $request->patient_id)->where('pulse', '!=', '')->orderBy('id', 'desc')->take(5)->get(['pulse', 'created_at']);
        $saturation = Followups::where('patient_id', $request->patient_id)->where('saturation', '!=', '')->orderBy('id', 'desc')->take(5)->get(['saturation', 'created_at']);
        $temparature = Followups::where('patient_id', $request->patient_id)->where('temp', '!=', '')->orderBy('id', 'desc')->take(5)->get(['temp', 'created_at']);
        $intake = Followups::where('patient_id', $request->patient_id)->where('intake', '!=', '')->orderBy('id', 'desc')->take(5)->get(['intake', 'created_at']);
        $output = Followups::where('patient_id', $request->patient_id)->where('output', '!=', '')->orderBy('id', 'desc')->take(5)->get(['output', 'created_at']);
        $sugar = Followups::where('patient_id', $request->patient_id)->where('sugar', '!=', '')->orderBy('id', 'desc')->take(5)->get(['sugar', 'created_at']);
        $data = array(
            'bp_high' => $bp_high,
            'bp_min' => $bp_min,
            'pulse' => $pulse,
            'saturation' => $saturation,
            'temparature' => $temparature,
            'intake' => $intake,
            'output' => $output,
            'sugar' => $sugar
        );
        return $data;
    }
}
