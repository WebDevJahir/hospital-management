<?php

namespace Modules\Monitoring\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Monitoring\Entities\Followup;
use Modules\Patient\Entities\Patient;
use Modules\Admin\Entities\User;
use Modules\Admin\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;


class FollowUpController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('monitoring::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('monitoring::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'place', 'type', 'reason', 'functional_status', 'note', 'patient_id',
            'bp_high', 'bp_low', 'pulse', 'saturation', 'temp', 'intake', 'output',
            'insulin', 'sugar', 'other_reason', 'other_response', 'response'
        ]);

        if ($request->has('reason')) {
            $data['reason'] = implode(',', $request->reason);
        }

        if ($request->has('response')) {
            $data['response'] = implode(',', $request->response);
        }
        Followup::create($data);
        $patient = Patient::where('id', $request->patient_id)->first();

        // if ($patient->status == 'Active' && $patient->package_id != 13) {
        //     $user = User::where('id', $patient->user_id)->first();
        //     $message = 'New follow up added for ' . $patient->patient_name;
        //     $url = 'follow-up-patient';
        //     $user->notify(new UserNotification($message, $url));  
        // }
        return redirect()->back()->with('success', 'Follow Discussion added successfully');
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
        return view('monitoring::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $followUp = Followup::where('id', $id)->first();
        $followUp->delete();
        return response()->json([
            'success' => 'Follow up deleted successfully'
        ]);
    }

    public function patientWiseFollowUp($patient)
    {
        $followUps = Followup::where('patient_id', $patient)->get();
        return view('monitoring::prescription.follow_up.list', compact('followUps'));
    }
}
