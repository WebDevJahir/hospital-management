<?php

namespace Modules\Accounts\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Accounts\Entities\Leave;
use Modules\Admin\Entities\Employee;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = Leave::with('employee')->orderBy('id', 'desc')->get();
        return view('accounts::leaves.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $emplyees = Employee::get();
        $leaves = Leave::get();

        return view('accounts::leaves.create', compact('emplyees', 'leaves'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $days = Carbon::parse($request->from_date);
            if ($request->from_date == $request->to_date) {
                $data['total_days'] = 1;
            } else {
                $data['total_days'] = $days->diffInDays($request->to_date);
            }
            $leave = Leave::create($data);

            return redirect()->route('pending-leaves')->with('success', 'Leave request submitted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the specified resource.
     */
    public function show(Leave $leave)
    {
        // $leave->load('employee', 'approvedBy');
        // return view('accounts::leaves.modal.show_modal', compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $emplyees = Employee::get();
        $leave = Leave::find($id);
        $employee = Employee::where('id', $leave->employee_id)->first();
        if ($leave->leave_type == 'pay_leave') {
            $totalLeave = $employee->pay_leave;
        } elseif ($leave->leave_type == 'casual_leave') {
            $totalLeave = $employee->casual_leave;
        } elseif ($leave->leave_type == 'emergency_leave') {
            $totalLeave = $employee->emergency_leave;
        } elseif ($leave->leave_type == 'sick_leave') {
            $totalLeave = $employee->sick_leave;
        } elseif ($leave->leave_type == 'educational_leave') {
            $totalLeave = $employee->educational_leave;
        }
        $usedleave = Leave::where('employee_id', $leave->employee_id)->where('status', 1)->where('leave_type', $leave->leave_type)->sum('total_days');
        $restLeave = $totalLeave - $usedleave;
        return view('accounts::leaves.create', compact('emplyees', 'leave', 'totalLeave', 'usedleave', 'restLeave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $days = Carbon::parse($request->from_date);
            if ($request->from_date == $request->to_date) {
                $data['total_days'] = 1;
            } else {
                $data['total_days'] = $days->diffInDays($request->to_date);
            }
            $leave = Leave::find($id);
            $leave->update($data);

            return redirect()->route('pending-leaves')->with('success', 'Leave request updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $leave = Leave::find($id);
            $leave->delete();

            return redirect()->route('leaves.index')->with('success', 'Leave request deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getUsedLeave(Request $request)
    {
        $current_year = Carbon::now()->format('Y');
        $current_year_first_month = Carbon::now()->startOfYear();
        $current_year_last_month = Carbon::now()->endOfYear();
        $usedleave = Leave::where('employee_id', $request->employee_id)->whereBetween('created_at', [$current_year_first_month, $current_year_last_month])->get();
        if ($request->leave_type == 'pay_leave') {
            return $usedleave->where('leave_type', 'pay_leave')->where('status', 1)->sum('total_days');
        } elseif ($request->leave_type == 'casual_leave') {
            return $usedleave->where('leave_type', 'casual_leave')->where('status', 1)->sum('total_days');
        } elseif ($request->leave_type == 'emergency_leave') {
            return $usedleave->where('leave_type', 'emergency_leave')->where('status', 1)->sum('total_days');
        } elseif ($request->leave_type == 'sick_leave') {
            return $usedleave->where('leave_type', 'sick_leave')->where('status', 1)->sum('total_days');
        } elseif ($request->leave_type == 'educational_leave') {
            return $usedleave->where('leave_type', 'educational_leave')->where('status', 1)->sum('total_days');
        }
    }

    public function getLeave(Request $request)
    {
        $leave = Employee::where('id', $request->employee_id)->first();
        if ($request->leave_type == 'pay_leave') {
            return $leave->pay_leave;
        } elseif ($request->leave_type == 'casual_leave') {
            return $leave->casual_leave;
        } elseif ($request->leave_type == 'emergency_leave') {
            return $leave->emergency_leave;
        } elseif ($request->leave_type == 'sick_leave') {
            return $leave->sick_leave;
        } elseif ($request->leave_type == 'educational_leave') {
            return $leave->educational_leave;
        }
    }

    public function pendingLeaves()
    {
        $leaves = Leave::with('employee')->where('status', 0)->orderBy('id', 'desc')->get();
        return view('accounts::leaves.pending', compact('leaves'));
    }

    public function approvedLeaves()
    {
        $leaves = Leave::with('employee')->where('status', '1')->orderBy('id', 'desc')->get();
        return view('accounts::leaves.approved', compact('leaves'));
    }

    public function leaveDetails(Request $request)
    {
        $leave = Leave::with('employee', 'approvedBy')->where('id', $request->leave_id)->first();

        return view('accounts::leaves.modal.show_modal', compact('leave'));
    }

    public function approveLeave(Request $request)
    {
        $approve = Leave::find($request->id);
        if ($approve->status == 1) {
            return 'fail';
        } else {
            $approve->status = 1;
            $approve->approved_by = auth()->user()->id;
            $approve->save();
            return 'success';
        }
    }
}
