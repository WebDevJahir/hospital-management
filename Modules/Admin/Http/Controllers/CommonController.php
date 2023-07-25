<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\IncomeHead;
use Modules\Admin\Entities\IncomeSubCategory;
use Modules\Admin\Entities\PoliceStation;

class CommonController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::index');
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
    public function store(Request $request)
    {
        //
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
        //
    }

    public function getIncomeHeads(Request $request)
    {
        $incomeHeads = IncomeHead::where('project_id', $request->project_id)->get();
        return response()->json($incomeHeads);
    }

    public function getPoliceStation(Request $request)
    {
        $policeStations = PoliceStation::where('city_id', $request->city_id)->get();
        return response()->json($policeStations);
    }

    public function getIncomeSubCategories(Request $request)
    {
        $incomeSubCategories = IncomeSubCategory::where('income_head_id', $request->income_head_id)->get();
        return response()->json($incomeSubCategories);
    }

    public function getIncomeHeadsAndSubCategories(Request $request)
    {
        $incomeHeads = IncomeHead::where('project_id', $request->project_id)->get();
        $incomeSubCategories = IncomeSubCategory::where('income_head_id', $request->income_head_id)->get();
        return response()->json([
            'incomeHeads' => $incomeHeads,
            'incomeSubCategories' => $incomeSubCategories
        ]);
    }
}
