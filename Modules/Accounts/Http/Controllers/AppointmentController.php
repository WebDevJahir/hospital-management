<?php

namespace Modules\Accounts\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Appointment;
use Modules\Accounts\Entities\Schedule;
use Modules\Admin\Entities\PrescriptionDoctor;
use Modules\Patient\Entities\Patient;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $doctors = PrescriptionDoctor::all();
        $appointments = Appointment::with('patient', 'doctor.schedules')->get();
        $patients = Patient::all();
        return view('accounts::appointments.create', compact('doctors', 'appointments', 'patients'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('accounts::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'prescription_doctor_id' => 'required',
            'serial_no' => 'required',
            'date' => 'required',
        ]);

        $data = $request->all();
        $addAppointment = Appointment::create($data);
        return redirect()->back()->with('success', 'Appointment added successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('accounts::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('accounts::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'patient_id' => 'required',
            'prescription_doctor_id' => 'required',
            'serial_no' => 'required',
            'date' => 'required',
        ]);


        $data = $request->all();

        $updateAppointment = Appointment::find($id)->update($data);

        return redirect()->back()->with('success', 'Appointment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $deleteAppointment = Appointment::find($id)->delete();
        return redirect()->back()->with('success', 'Appointment deleted successfully');
    }

    public function checkSerial(Request $request)
    {
        $day = Carbon::parse($request->date)->format('l');
        $total_serial = Schedule::where('prescription_doctor_id', $request->prescription_doctor_id)->where('day', $day)->first()->total_serial;
        $appointment = Appointment::where('prescription_doctor_id', $request->prescription_doctor_id)->where('date', $request->date)->get('serial_no');
        if ($appointment->isEmpty()) {
            $serial_array = [];
        } else {
            $serial_array = $appointment->implode('serial_no', ', ');
        }
        if ($serial_array) {
            $serial_array = explode(',', $serial_array);
        }

        if (!empty($total_serial)) {
            $data = '';
            for ($i = 1; $i <= $total_serial; $i++) {
                if (in_array($i, $serial_array)) {
                    $data .= '<button type="button" class="btn btn-sm btn-danger serial_id " style="margin-left:4px;" data-item="0" disabled>' . $i . '</button>';
                } else {
                    $data .= '<button type="button" class="btn btn-sm btn-success serial_id" style="margin-left:4px;" data-item="' . $i . '">' . $i . '</button>';
                }
            }
            return $data;
        } else {
            return 'false';
        }
    }

    public function availableScheduleDays(Request $request)
    {
        $doctor_days = Schedule::where('prescription_doctor_id', $request->prescription_doctor_id)->get();
        if ($doctor_days->isEmpty()) {
            return 'false';
        } else {
            $data = '';
            foreach ($doctor_days as $days) {
                $data .= '<p class="text-success">' . $days->day . '  [' . Carbon::parse($days->start_time)->format('h:i A') . ' - ' . Carbon::parse($days->end_time)->format('h:i A') . ']</p>';
            }
            return $data;
        }
    }

    public function appointmentApproved()
    {
        $appointments = Appointment::find(request()->appointment_id);
        $appointments->status = 'Approved';
        $appointments->save();
        return response()->json(['success' => 'Appointment Approved Successfully']);
    }
}
