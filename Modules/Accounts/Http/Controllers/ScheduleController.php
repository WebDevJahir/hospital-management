<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Schedule;
use Modules\Accounts\Http\Requests\SchedulRequest;
use Modules\Monitoring\Entities\ConsultantDoctor;
use Carbon\Carbon;
use Modules\Accounts\Entities\Schedul;
use Modules\Admin\Entities\PrescriptionDoctor;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $doctors = PrescriptionDoctor::all();
        $schedules = Schedule::all();
        return view('accounts::schedules.create', compact('doctors', 'schedules'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(SchedulRequest $request)
    {
        // dd($request->all());
        foreach ($request->day as $key => $d) {
            $startTime = Carbon::parse($request->start_time[$key]);
            $endTime = Carbon::parse($request->end_time[$key]);
            $HourToMinute = $startTime->diff($endTime)->format('%H') * 60;
            $minute = $startTime->diff($endTime)->format('%I');
            $totalMinute = $HourToMinute + $minute;
            $data = [
                'prescription_doctor_id' => $request->prescription_doctor_id,
                'day' => $d,
                'start_time' => $request->start_time[$key],
                'end_time' => $request->end_time[$key],
                'per_patient_time' => $request->per_patient_time,
                'total_serial' => $totalMinute / $request->per_patient_time
            ];
            Schedule::create($data);
        }
        return redirect()->back()->with('success', 'Schedule Created Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Schedule $schedule, SchedulRequest $request)
    {
        $startTime = Carbon::parse($request->start_time[0]);
        $endTime = Carbon::parse($request->end_time[0]);
        $HourToMinute = $startTime->diff($endTime)->format('%H') * 60;
        $minute = $startTime->diff($endTime)->format('%I');
        $totalMinute = $HourToMinute + $minute;
        $data = [
            'prescription_doctor_id' => $request->prescription_doctor_id,
            'day' => $request->day[0],
            'start_time' => $request->start_time[0], // [0] because it's an array [start_time, end_time, per_patient_time, total_serial
            'end_time' => $request->end_time[0],
            'per_patient_time' => $request->per_patient_time,
            'total_serial' => $totalMinute / $request->per_patient_time
        ];

        $schedule->update($data);

        return redirect()->back()->with('success', 'Schedule Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return response()->json(['success' => 'Schedule Deleted Successfully']);
    }
}
