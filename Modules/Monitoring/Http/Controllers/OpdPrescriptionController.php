<?php

namespace Modules\Monitoring\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\PrescriptionDoctor;
use Modules\Monitoring\Entities\ConsultantDoctor;
use Modules\Monitoring\Entities\Medicine;
use Modules\Monitoring\Entities\OpdAdvice;
use Modules\Monitoring\Entities\OpdMainProblem;
use Modules\Monitoring\Entities\OpdNextPlan;
use Modules\Monitoring\Entities\OpdPatientInfo;
use Modules\Monitoring\Entities\OpdPrescription;
use Modules\Monitoring\Entities\Prescription;
use Modules\Patient\Entities\Patient;

class OpdPrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $opd_patients = OpdPatientInfo::all();
        return view('monitoring::opd_prescription.index', compact('opd_patients'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $patients = Patient::all();
        $doctors = ConsultantDoctor::all();
        $medicines = Medicine::get();
        return view('monitoring::opd_prescription.create', compact('patients', 'doctors', 'medicines'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->all();

        DB::beginTransaction();
        // try {
        $opd_patient_info = OpdPatientInfo::create($data);
        if ($opd_patient_info) {
            $data['opd_patient_infos_id'] = $opd_patient_info->id;
            OpdMainProblem::create($data);
            OpdNextPlan::create($data);
            foreach ($data['medicine'] as $key => $medicine) {
                OpdPrescription::create([
                    'opd_patient_infos_id' => $opd_patient_info->id,
                    'medicine' => $data['medicine'][$key],
                    'dose' => $data['dose'][$key],
                    'duration' => $data['duration'][$key],
                    'note' => $data['note'][$key],
                ]);
            }
            OpdAdvice::create([
                'opd_patient_infos_id' => $opd_patient_info->id,
                'advice' => $data['advice'],
            ]);
        }
        DB::commit();
        return redirect()->back()->with('success', 'Patient Information Saved Successfully');
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
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
    public function edit($id)
    {

        $opd_patient_info = OpdPatientInfo::with('opdPrescription', 'opdAdvice', 'opdNextPlan', 'opdMainProblem')->find($id);
        $doctors = ConsultantDoctor::all();
        $medicines = Medicine::get();
        return view('monitoring::opd_prescription.create', compact('opd_patient_info', 'doctors', 'medicines'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $opd_patient_info = OpdPatientInfo::find($id);
        $data = $request->all();
        DB::beginTransaction();
        try {
            $opd_patient_info->update($data);
            $opd_patient_info->opdMainProblem->update($data);
            $opd_patient_info->opdNextPlan->update($data);
            $opd_patient_info->opdAdvice->update($data);
            $deleted_prescription_id = explode(',', $data['deleted_prescription_id']);
            if (count($deleted_prescription_id) > 0) {
                foreach ($deleted_prescription_id as $key => $id) {
                    if ($id != '') {
                        $opd_prescription = OpdPrescription::find($id);
                        $opd_prescription->delete();
                    }
                }
            }
            foreach ($data['medicine'] as $key => $medicine) {
                if (isset($data['opd_prescription_id'][$key])) {
                    $opd_prescription = OpdPrescription::find($data['opd_prescription_id'][$key]);
                    $opd_prescription->update([
                        'medicine' => $data['medicine'][$key],
                        'dose' => $data['dose'][$key],
                        'duration' => $data['duration'][$key],
                        'note' => $data['note'][$key],
                    ]);
                } else {
                    OpdPrescription::create([
                        'opd_patient_infos_id' => $opd_patient_info->id,
                        'medicine' => $data['medicine'][$key],
                        'dose' => $data['dose'][$key],
                        'duration' => $data['duration'][$key],
                        'note' => $data['note'][$key],
                    ]);
                }
            }
            DB::commit();
            return redirect()->back()->with('success', 'Patient Information Updated Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
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

    public function getOpdPrescriptionInformation(Request $request)
    {
    }
}
