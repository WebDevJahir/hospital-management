<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\AlliedHealth;
use Modules\Admin\Entities\Project;
use Modules\Admin\Entities\City;
use Modules\Admin\Http\Requests\AlliedHealthRequest;

class AlliedHealthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $allied_healths = AlliedHealth::all();
        $projects = Project::all();
        $cities = City::all();
        return view('admin::basic_settings.allied_health.create', compact('allied_healths', 'projects', 'cities'));
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
    public function store(AlliedHealthRequest $request)
    {
        $data = $request->except('_token');
        $allied_health = AlliedHealth::create($data);
        if ($allied_health) {
            return redirect()->back()->with('success', 'Medical  Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Medical Procedure Added Failed');
        }
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
    public function update(AlliedHealth $allied_health, AlliedHealthRequest $request)
    {
        $data = $request->except('_token');
        $allied_health->update($data);
        if ($allied_health) {
            return redirect()->back()->with('success', 'Medical Procedure Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Medical Procedure Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(AlliedHealth $allied_health)
    {
        $allied_health->delete();
        if ($allied_health) {
            return redirect()->back()->with('success', 'Medical Procedure Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Medical Procedure Deleted Failed');
        }
    }
}
