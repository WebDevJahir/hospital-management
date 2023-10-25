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
        $patients = Patient::where('status', 'Active')->orderBy('id', 'desc')->take(20)->get();
        return view('monitoring::wound_clinic.describe.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $patient = Patient::find(request()->patient_id);
        $patient_id = request()->patient_id;
        return view('monitoring::wound_clinic.describe.modal.create', compact('patient', 'patient_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        WoundDescribe::create($request->all());
        return redirect()->route('wound-describe.index')->with('success', 'Wound Describe Created Successfully');
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

    public function list()
    {
        $wound_describes = WoundDescribe::where('patient_id', request()->patient_id)->orderBy('id', 'desc')->get();
        return view('monitoring::wound_clinic.describe.modal.list', compact('wound_describes'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $wound_describe = WoundDescribe::find($id);
        $patient = Patient::find($wound_describe->patient_id);
        return view('monitoring::wound_clinic.describe.modal.create', compact('wound_describe', 'patient'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        WoundDescribe::find($id)->update($request->all());
        return redirect()->route('wound-describe.index')->with('success', 'Wound Describe Updated Successfully');
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
}
