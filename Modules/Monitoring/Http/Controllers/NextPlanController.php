<?php

namespace Modules\Monitoring\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Monitoring\Entities\NextPlan;
use Modules\Monitoring\Http\Requests\NextPlanRequest;

class NextPlanController extends Controller
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
    public function store(NextPlanRequest $request)
    {
        NextPlan::create($request->all());
        return response()->json(['success' => 'Next Plan Added Successfully']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($patient_id)
    {
        $next_plans = NextPlan::where('patient_id', $patient_id)->orderBy('id', 'desc')->get();
        return view('monitoring::prescription.next_plan.plan_list_modal', compact('next_plans'));
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
        $next_plan = NextPlan::find($id);
        $next_plan->delete();
        if ($next_plan) {
            return response()->json([
                'success' => true,
                'message' => 'Next Plan Deleted Successfully'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Next Plan Not Deleted Successfully'
            ]);
        }
    }
}
