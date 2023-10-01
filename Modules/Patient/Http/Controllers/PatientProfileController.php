<?php

namespace Modules\Patient\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Package;
use Modules\Admin\Entities\PrescriptionDoctor;
use Modules\Patient\Entities\ConcernDisease;
use Modules\Patient\Entities\CurrentProblem;
use Modules\Patient\Entities\FunctionalStatus;
use Modules\Patient\Entities\Patient;
use Modules\Patient\Entities\PatientDetail;
use Modules\Patient\Entities\PatientReferral;
use Modules\Patient\Entities\PreviousTreatment;
use Modules\Patient\Entities\PrimaryDisease;
use PhpParser\Builder\Function_;

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
        $patient_data = $request->only(['name', 'city_id', 'thana_id', 'age', 'gender', 'present_address', 'phone']);
        $patient_detail_data = $request->only([
            'patient_id', 'religion', 'dob', 'nationality', 'permanent_address', 'blood_group',
            'marital_status', 'occupation', 'doctor_contact_name', 'family_contact_person', 'contact_person_number', 'contact_person_relation',
            'family_member', 'nid_passport', 'social_status'
        ]);

        $referral_data = $request->only([
            'patient_id', 'hospital_name', 'agent_name', 'referring_doctor',
            'family_name', 'where_to_know', 'consulting_doctor'
        ]);

        $primary_diseases_data = $request->only(['primary_diagnosis', 'suffering_time', 'site_of_metastases', 'present_condition', 'referrals', 'prognosis', 'allergy', 'others']);

        $concern_diseases_data = $request->only(['inform_diagnosis', 'inform_prognosis', 'inform_diagnosis_family', 'inform_prognosis_family']);

        $previous_treatment_data = $request->only(['surgery_name', 'date', 'chemotherapy', 'radiotherapy', 'pain', 'short_to_breath', 'lack_of_weakness', 'nausea', 'vomiting', 'appetite', 'constipation', 'dry_mouth', 'drowsiness', 'morbility']);

        $functional_status_data = $request->only(['metal_status', 'morbility', 'feeding', 'accessory', 'previous_medication', 'others']);

        $current_problem_data = $request->only(['current_problem']);

        $this->updatePatient($patient_data, $id);
        $this->addPatientDetails($patient_detail_data, $id);
        $this->addPatientReferral($referral_data, $id);
        $this->addPrimaryDiseases($primary_diseases_data, $id);
        $this->addConcernDiseases($concern_diseases_data, $id);
        $this->addPreviousTreatment($previous_treatment_data, $id);
        $this->addFunctionalStatus($functional_status_data, $id);
        $this->addCurrentProblem($current_problem_data, $id);
        return redirect()->route('patient-profile.index')->with('success', 'Patient Profile Updated Successfully');
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

    public function updatePatient($patient_data, $patient_id)
    {
        $patient = Patient::find($patient_id);
        $patient = $patient->update($patient_data);
        return true;
    }

    public function addPatientDetails($details_data, $patient_id)
    {
        $patient_detail = PatientDetail::where('patient_id', $patient_id)->first();
        if ($patient_detail) {
            $patient_detail->update($details_data);
        } else {
            $reqeust_data['patient_id'] = $patient_id;
            PatientDetail::create($details_data);
        }
        return true;
    }

    public function addPatientReferral($referral_data, $patient_id)
    {
        $patient_referral = PatientReferral::where('patient_id', $patient_id)->first();
        if ($patient_referral) {
            $patient_referral->update($referral_data);
        } else {
            $referral_data['patient_id'] = $patient_id;
            PatientReferral::create($referral_data);
        }
        return true;
    }

    public function addPrimaryDiseases($primary_diseases_data, $patient_id)
    {
        $patient_primary_diseases = PrimaryDisease::where('patient_id', $patient_id)->first();
        if ($patient_primary_diseases) {
            $patient_primary_diseases->update($primary_diseases_data);
        } else {
            $primary_diseases_data['patient_id'] = $patient_id;
            PrimaryDisease::create($primary_diseases_data);
        }
        return true;
    }

    public function addConcernDiseases($concern_diseases_data, $patient_id)
    {
        $patient_concern_diseases = ConcernDisease::where('patient_id', $patient_id)->first();
        if ($patient_concern_diseases) {
            $patient_concern_diseases->update($concern_diseases_data);
        } else {
            $concern_diseases_data['patient_id'] = $patient_id;
            ConcernDisease::create($concern_diseases_data);
        }
        return true;
    }

    public function addPreviousTreatment($previous_treatment_data, $patient_id)
    {
        $patient_previous_treatment = PreviousTreatment::where('patient_id', $patient_id)->first();
        if ($patient_previous_treatment) {
            $patient_previous_treatment->update($previous_treatment_data);
        } else {
            $previous_treatment_data['patient_id'] = $patient_id;
            PreviousTreatment::create($previous_treatment_data);
        }
        return true;
    }

    public function addFunctionalStatus($functional_status_data, $patient_id)
    {
        $patient_functional_status = FunctionalStatus::where('patient_id', $patient_id)->first();
        if ($patient_functional_status) {
            $patient_functional_status->update($functional_status_data);
        } else {
            $functional_status_data['patient_id'] = $patient_id;
            FunctionalStatus::create($functional_status_data);
        }
        return true;
    }

    public function addCurrentProblem($current_problem, $patient_id)
    {
        $patient_current_problem = CurrentProblem::where('patient_id', $patient_id)->first();
        if ($patient_current_problem) {
            $patient_current_problem->update($current_problem);
        } else {
            $current_problem_data['patient_id'] = $patient_id;
            $current_problem_data['current_problem'] = json_encode($current_problem['current_problem']);
            CurrentProblem::create($current_problem_data);
        }
        return true;
    }
}
