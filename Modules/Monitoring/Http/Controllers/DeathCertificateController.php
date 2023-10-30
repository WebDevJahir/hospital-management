<?php

namespace Modules\Monitoring\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Monitoring\Entities\ConsultantDoctor;
use Modules\Monitoring\Entities\DeathCertificate;
use Modules\Patient\Entities\Patient;


class DeathCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $death_certificates = DeathCertificate::with('patient')->orderBy('id', 'desc')->get();
        return view('monitoring::death_certificate.index', compact('death_certificates'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $patients = Patient::with('patientDetail', 'primaryDiseases')->get();
        $doctors = ConsultantDoctor::all();
        $patient = null;
        return view('monitoring::death_certificate.create', compact('patients', 'doctors', 'patient'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['issue_date'] = date('Y-m-d', strtotime($data['issue_date']));
        $data['date_of_birth'] = date('Y-m-d', strtotime($data['date_of_birth']));
        $data['death_date'] = date('Y-m-d', strtotime($data['death_date']));
        $data['registration_date'] = date('Y-m-d', strtotime($data['registration_date']));
        $data['death_time'] = date('H:i:s', strtotime($data['death_time']));
        $deathCertificate = DeathCertificate::create($data);
        if ($deathCertificate->patient_id) {
            $patient = Patient::find($deathCertificate->patient_id);
            $patient->status = 'death';
            $patient->save();
        }
        return redirect()->route('death-certificate.index')->with('success', 'Death Certificate created successfully');
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

        $death_certificate = DeathCertificate::with('patient')->find($id);
        $patients = Patient::with('patientDetail', 'primaryDiseases')->get();
        $doctors = ConsultantDoctor::all();
        $patient = $death_certificate->patient;
        return view('monitoring::death_certificate.create', compact('death_certificate', 'patients', 'doctors', 'patient'));
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
        $data['issue_date'] = date('Y-m-d', strtotime($data['issue_date']));
        $data['date_of_birth'] = date('Y-m-d', strtotime($data['date_of_birth']));
        $data['death_date'] = date('Y-m-d', strtotime($data['death_date']));
        $data['registration_date'] = date('Y-m-d', strtotime($data['registration_date']));
        $data['death_time'] = date('H:i:s', strtotime($data['death_time']));
        $deathCertificate = DeathCertificate::find($id);
        $deathCertificate->update($data);
        if ($deathCertificate->patient_id) {
            $patient = Patient::find($deathCertificate->patient_id);
            $patient->status = 'death';
            $patient->save();
        }
        return redirect()->route('death-certificate.index')->with('success', 'Death Certificate updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $deathCertificate = DeathCertificate::find($id);
        if ($deathCertificate->patient_id) {
            $patient = Patient::find($deathCertificate->patient_id);
            $patient->status = 'discharge';
            $patient->save();
        }
        $deathCertificate->delete();
        return redirect()->route('death-certificate.index')->with('success', 'Death Certificate deleted successfully');
    }
}
