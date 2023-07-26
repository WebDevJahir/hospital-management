<?php

namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Staff;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Attendance;

class AttendanceController extends Controller
{
    public function staffAttendance()
    {
        $staffs = Staff::get();
        return view('admin::attendance.attendance', compact('staffs'));
    }

    public function addAttendance(Request $request)
    {
        $date = Carbon::parse($request->date);
        if ($request->submit == 'entry') {
            $attendance = Attendance::where('staff_id', $request->staff_id)->where('attendance_date', $date)->first();
            if ($attendance) {
                return redirect()->back()->with('failed', 'Attendance Already Submitted');
            } else {
                $attendance = new Attendance();
                $attendance->staff_id = $request->staff_id;
                $attendance->entry_time = $request->entry_time;
                $attendance->attendance_date = Carbon::parse($request->date);
                $attendance->note = $request->note;
                $attendance->login_ip = $request->ip();
                $attendance->save();
                return redirect()->back()->with('success', 'Attendance entried sucessfully');
            }
        } else {
            $date = Carbon::parse($request->date);
            $attendance = Attendance::where('staff_id', $request->staff_id)->where('attendance_date', $date)->first();
            if ($attendance) {
                if (!$attendance->exit_time) {
                    $attendance->exit_time = $request->exit_time;
                    $attendance->logout_ip = $request->ip();
                    $attendance->update();
                    return redirect()->back()->with('success', 'Exit time added successfully');
                } else {
                    return redirect()->back()->with('failed', 'Exit time already taken');
                }
            } else {
                return redirect()->back()->with('failed', 'You enter first entry time');
            }
        }
    }

    public function getReport(Request $request)
    {
        $staffs = Staff::get();
        if (Auth::user()->type == 'Admin') {

            if ($request->staff_id == 'all') {
                $month = $request->month;
                $year = $request->year;
                return view('admin::attendance.admin_attendance', compact('staffs', 'month', 'year'));
            } else {
                $attendance_reports = Attendance::whereMonth('created_at', $request->month)->whereYear('created_at', $request->year)->where('staff_id', $request->staff_id)->get();
                $staff = Staff::where('user_id', $request->staff_id)->first();
                $name = $staff->name;
                return view('admin::attendance.attendance_report', compact('attendance_reports', 'staffs', 'name'));
            }
        } else {
            $attendance_reports = Attendance::whereMonth('created_at', $request->month)->whereYear('created_at', $request->year)->where('staff_id', Auth::id())->get();
            $name = Auth::user()->name;
            return view('admin::attendance.attendance_report', compact('attendance_reports', 'staffs', 'name'));
        }
    }
}
