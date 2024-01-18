<?php

namespace Modules\Monitoring\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Monitoring\Entities\FollowUp;
use Modules\Monitoring\Entities\Prescription;
use Modules\Monitoring\Entities\Roster;
use Modules\Patient\Entities\Patient;
use Carbon\Carbon;
use Modules\Admin\Entities\Package;
use Modules\Admin\Entities\PrescriptionDoctor;
use Modules\Monitoring\Entities\ConsultantDoctor;
use Modules\Monitoring\Entities\Medicine;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $patients = Patient::where('status', 'Active')->orderBy('id', 'desc')->take(20)->get();
        return view('monitoring::prescription.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($id)
    {
        $patient = Patient::with('package', 'user', 'primaryDiseases')->where('id', $id)->first();
        $followup = FollowUp::where('patient_id', $id)->orderBy('id', 'desc')->first();
        $getMedicines = Prescription::where('patient_id', $id)->whereIn('status', ['new', 'old'])->orderBy('id', 'desc')->get();
        $getCancelMedicines = Prescription::where('patient_id', $id)->where('status', 'cancel')->orderBy('id', 'desc')->get();
        $nurse_duty = Roster::where('patient_id', $patient->user_id)->whereDate('start', '=', Carbon::now()->toDateString())->orderBy('id', 'desc')->get();
        $doctors = ConsultantDoctor::get();
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
            $medicine = new Medicine();
            $medicine->name = $request->medicine;
            $medicine->save();
        }
        $prescription_data = $request->only('patient_id', 'medicine', 'note', 'dose', 'duration');
        $prescription_data['status'] = 'new';
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
    public function edit(Request $request, $id)
    {
        $medicines = Medicine::get();
        $edit_medicine = Prescription::find($id);
        return view('monitoring::prescription.prescription_layout.edit_medicine_modal', compact('edit_medicine', 'medicines'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $check_medicine = Medicine::where('name', $request->medicine)->first();
        if (!$check_medicine) {
            $medicine_data = $request->only('medicine');
            $medicine = Medicine::create($medicine_data);
        }
        $prescription_data = $request->only('medicine', 'note', 'dose', 'duration');
        $prescription = Prescription::find($id);
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
        $prescription = Prescription::find($id);
        $prescription->delete();
        if ($prescription) {
            return response()->json([
                'success' => true,
                'message' => 'Medicine deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Medicine not deleted successfully'
            ]);
        }
    }

    public function activeMedicine(Request $request)
    {
        $data = [
            'status' => 'old',
            'generate' => 'no'
        ];
        $medicine = Prescription::find($request->id);
        $medicine->update($data);
        return $medicine;
    }

    public function cancelMedicine(Request $request)
    {
        $data = [
            'status' => 'cancel',
            'generate' => 'no'
        ];
        $medicine = Prescription::find($request->id);
        $medicine->update($data);
        return $medicine;
    }

    public function getInvestigation(Request $request)
    {
        $attributes = ['bp_high', 'bp_min', 'pulse', 'saturation', 'temp', 'intake', 'output', 'sugar'];
        $data = [];

        foreach ($attributes as $attribute) {
            $data[$attribute] = FollowUp::where('patient_id', $request->patient_id)
                ->where($attribute, '!=', '')
                ->orderBy('id', 'desc')
                ->take(5)
                ->get([$attribute, 'created_at']);
        }

        return $data;
    }
}
