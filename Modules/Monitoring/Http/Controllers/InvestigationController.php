<?php

namespace Modules\Monitoring\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Monitoring\Entities\InvestigationSubCategory;
use Modules\Patient\Entities\Patient;
use Modules\Monitoring\Entities\Investigation;

class InvestigationController extends Controller
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
    public function create(Request $request)
    {
        $patient = Patient::find($request->patient_id);
        $sub_categories = InvestigationSubCategory::get();
        return view('monitoring::investigation.report.modal.add_modal', compact('sub_categories', 'patient'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        foreach ($request->sub_category_id as $key => $value) {
            $data = [
                'patient_id' => $request->patient_id,
                'sub_category_id' => $value,
                'result' => $request->result[$key],
                'date' => $request->date,
            ];
            Investigation::create($data);
        }

        // $patient = Patient::where('id',$request->patient_id)->first();
        // if($patient->status == 'Active' && $patient->package_id != 13){
        //     $user = User::where('id',$patient->user_id)->first();
        //     $message = 'New investigation report added';
        //     $url = 'user-investigation';
        //     Notification::send($user, new UserNotification($message,$url));   
        // }

        return redirect()->back()->with('success', 'Investigation Report Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($patient_id)
    {
        $investigations = Investigation::where('patient_id', $patient_id)->orderBy('id', 'desc')->get();
        return view('monitoring::investigation.report.modal.view_modal', compact('investigations', 'patient_id'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $investigation = Investigation::find($id);
        $sub_categories = InvestigationSubCategory::get();
        return view('monitoring::investigation.report.modal.edit_modal', compact('investigation', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $investigation = Investigation::find($id);
        $investigation->update($request->all());
        return redirect()->back()->with('success', 'Investigation Report Updated Successfully');
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
