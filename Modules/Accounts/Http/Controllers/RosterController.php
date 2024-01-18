<?php

namespace Modules\Accounts\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Roster;
use Modules\Accounts\Entities\RosterStaff;
use Modules\Admin\Entities\Employee;
use Modules\Patient\Entities\Patient;

class RosterController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $all_employee = Employee::all();
        if (request()->employee_id == 'all') {
            $employees = Employee::select('id', 'first_name')->rosterCount(request()->month, request()->year)->get();
            $employee_id = request()->employee_id ?? '';
            $month = request()->month ? request()->month : '';
            $year = request()->year ?? Carbon::now()->format('Y');
            return view('accounts::roster.index', compact('all_employee', 'employees', 'employee_id',  'month', 'year'));
        } else {
            $employee = Employee::select('id', 'first_name')->where('id', request()->employee_id)->rosterCount(request()->month, request()->year)->get();
            $employee_id = request()->employee_id ?? '';
            $month = request()->month ? request()->month : '';
            $year = request()->year ?? Carbon::now()->format('Y');
            return view('accounts::roster.index', compact('all_employee', 'employee', 'employee_id', 'month', 'year'));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($patient_id = null)
    {
        $patient_id = request()->patient_id;
        $patients = Patient::all();
        return view('accounts::roster.create', compact('patients', 'patient_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rosterData = [
            'start' => $request->start_date,
            'patient_id' => $request->patient_id,
            'note' => $request->note,
        ];

        if ($request->addmorning) {
            $this->saveRoster('morning', 'M:', $request->addmorning, $rosterData);
        }

        if ($request->addevening) {
            $this->saveRoster('evening', 'E:', $request->addevening, $rosterData);
        }

        if ($request->addnight) {
            $this->saveRoster('night', 'N:', $request->addnight, $rosterData);
        }

        if ($request->addvisit) {
            $this->saveRoster('visit', 'V:',  $request->addvisit,  $rosterData, true, $request->on_duty, $request->off_duty);
        }

        return redirect()->back()->with('success', 'Roster Added Successfully');
    }

    private function saveRoster($type, $titlePrefix, $staffData, $rosterData, $hasTimeFields = false, $onDuty = [], $offDuty = [])
    {
        $staffData = collect($staffData);
        $roster = new Roster();
        $roster->fill($rosterData);
        $roster->type = $type;
        $roster->title = $staffData->map(function ($staff) use ($titlePrefix) {
            $staff = Employee::find($staff);
            return $titlePrefix . $staff->first_name;
        })->join(',');
        if ($roster->save()) {
            foreach ($staffData as $key => $staff_id) {
                $rosterStaff = new RosterStaff();
                $rosterStaff->roster_id = $roster->id;
                $rosterStaff->start = $rosterData['start'];
                $rosterStaff->staff_id = $staff_id;
                $rosterStaff->type = $type;

                if ($hasTimeFields) {
                    $rosterStaff->on_duty = $onDuty[$key];
                    $rosterStaff->off_duty = $offDuty[$key];
                }

                $rosterStaff->save();
            }
        }
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
        $morning_roster = Roster::where('patient_id', $request->patient_id)->where('start', $request->start_date)->where('type', 'morning');
        RosterStaff::whereIn('roster_id', $morning_roster->pluck('id'))->delete();
        $morning_roster->delete();
        $evening_roster = Roster::where('patient_id', $request->patient_id)->where('start', $request->start_date)->where('type', 'evening');
        RosterStaff::whereIn('roster_id', $evening_roster->pluck('id'))->delete();
        $evening_roster->delete();
        $night_roster = Roster::where('patient_id', $request->patient_id)->where('start', $request->start_date)->where('type', 'night');
        RosterStaff::whereIn('roster_id', $night_roster->pluck('id'))->delete();
        $night_roster->delete();
        $visit_roster = Roster::where('patient_id', $request->patient_id)->where('start', $request->start_date)->where('type', 'visit');
        RosterStaff::whereIn('roster_id', $visit_roster->pluck('id'))->delete();
        $visit_roster->delete();
        $rosterData = [
            'start' => $request->start_date,
            'patient_id' => $request->patient_id,
            'note' => $request->note,
        ];

        if ($request->addmorning) {
            $this->saveRoster('morning', 'M:', $request->addmorning, $rosterData);
        }

        if ($request->addevening) {
            $this->saveRoster('evening', 'E:', $request->addevening, $rosterData);
        }

        if ($request->addnight) {
            $this->saveRoster('night', 'N:', $request->addnight, $rosterData);
        }

        if ($request->addvisit) {
            $this->saveRoster('visit', 'V:',  $request->addvisit,  $rosterData, true, $request->on_duty, $request->off_duty);
        }

        return redirect()->back()->with('success', 'Roster Updated Successfully');
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

    public function getSameMonthRosterPatient(Request $request)
    {
        $roster = Roster::with('patient')->whereMonth('start', '=', $request->month)->whereYear('start', '=', $request->year)->groupBy('patient_id')->get('patient_id');
        return response()->json($roster);
    }

    public function rosterAddModalView(Request $request)
    {
        $roster = Roster::where('patient_id', $request->patient_id)->where('start', $request->date)->first();
        $date = $request->date;
        $patient_id = request()->patient_id;
        $patient = Patient::where('id', $patient_id)->first();
        $employees = Employee::all();
        if (!$roster) {
            return view('accounts::roster.modal.add_modal', compact('patient_id', 'date', 'patient', 'employees'));
        }
        $roster_morning = Roster::where('patient_id', $request->patient_id)->where('start', $request->date)->where('type', 'morning')->first();
        $morning_staff = RosterStaff::where('roster_id', $roster_morning->id)->pluck('staff_id')->toArray();
        $roster_evening = Roster::where('patient_id', $request->patient_id)->where('start', $request->date)->where('type', 'evening')->first();
        $evening_staff = RosterStaff::where('roster_id', $roster_evening->id)->pluck('staff_id')->toArray();
        $roster_night = Roster::where('patient_id', $request->patient_id)->where('start', $request->date)->where('type', 'night')->first();
        $night_staff = RosterStaff::where('roster_id', $roster_night->id)->pluck('staff_id')->toArray();
        $roster_visit = Roster::where('patient_id', $request->patient_id)->where('start', $request->date)->where('type', 'visit')->first();
        $visit_staff = RosterStaff::where('roster_id', $roster_visit->id)->pluck('staff_id')->toArray();
        $roster_visit_on_duty = RosterStaff::where('roster_id', $roster_visit->id)->pluck('on_duty')->toArray();
        $roster_visit_off_duty = RosterStaff::where('roster_id', $roster_visit->id)->pluck('off_duty')->toArray();
        return view('accounts::roster.modal.add_modal', compact('patient', 'date', 'roster', 'employees', 'patient_id', 'morning_staff', 'evening_staff', 'night_staff', 'visit_staff', 'roster_visit_on_duty', 'roster_visit_off_duty'));
    }

    public function getRoster($patient_id)
    {
        $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
        $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');

        $data = Roster::where('patient_id', $patient_id)->whereDate('start', '>=', $start)->whereDate('start', '<=', $end)->get(['id', 'start', 'title']);
        return json_decode($data);
    }

    public function getRosterCount(Request $request)
    {
        $staff = Employee::where('id', request()->employee_id)->first();
        $on_duty_roster = RosterStaff::where('employee_id', request()->employee_id)->whereMonth('start', '=', request()->month)->whereYear('start', '=', request()->year)->where('type', 'visit')->where('on_duty', 1)->count();
        $off_duty_roster = RosterStaff::where('employee_id', request()->employee_id)->whereMonth('start', '=', request()->month)->whereYear('start', '=', request()->year)->where('type', 'visit')->where('off_duty', 1)->count();
        $morning_count = RosterStaff::where('employee_id', request()->employee_id)->whereMonth('start', '=', request()->month)->whereYear('start', '=', request()->year)->where('type', 'morning')->count();
        $evening_count = RosterStaff::where('employee_id', request()->employee_id)->whereMonth('start', '=', request()->month)->whereYear('start', '=', request()->year)->where('type', 'evening')->count();
        $night_count = RosterStaff::where('employee_id', request()->employee_id)->whereMonth('start', '=', request()->month)->whereYear('start', '=', request()->year)->where('type', 'night')->count();
        $total_roster = $morning_count + $evening_count + $night_count;
        $data = array(
            'total_roster' => $total_roster,
            'type' => 'Staff',
            'night' => $night_count,
            'on_duty' => $on_duty_roster,
            'off_duty' => $off_duty_roster,
        );
        return $data;
    }
}
