<?php

namespace Modules\Monitoring\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Patient\Entities\Patient;
use App\Notifications\UserNotification;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Notification;
use Modules\Monitoring\Entities\WoundDescribe;

class WoundDescribeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $wounds = WoundDescribe::with('patient.package', 'patient.user')->latest()->get();
        $patients = Patient::with('package')->latest()->get();

    	return view('monitoring::wound_clinic.create',compact('wounds', 'patients'));
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
    public function store()
    {
        WoundDescribe::create(request()->all());

        // $patient = Patient::where('id',request()->patient_id)->first();
        // if($patient->status == 'Active' && $patient->package_id != 13){
        //     $user = User::where('id',$patient->user_id)->first();
        //     $message = 'New Wound descride added';
        //     $url = 'patient-wound-describe-report';
        //     Notification::send($user, new UserNotification($message,$url)); 
        // }

        return redirect()->back()->with('success', 'Wound description has been added successfully');
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
    public function update(WoundDescribe $woundDescribe)
    {
        $woundDescribe->update(request()->all());

        // $patient = Patient::where('id',request()->patient_id)->first();
        // if($patient->status == 'Active' && $patient->package_id != 13){
        //     $user = User::where('id',$patient->user_id)->first();
        //     $message = 'Wound descride updated';
        //     $url = 'patient-wound-describe-report';
        //     Notification::send($user, new UserNotification($message,$url)); 
        // }

        return redirect()->back()->with('success', 'Wound description has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(WoundDescribe $woundDescribe)
    {
        $woundDescribe->delete();
        return redirect()->back()->with('success', 'Wound description has been deleted successfully');
    }
}
