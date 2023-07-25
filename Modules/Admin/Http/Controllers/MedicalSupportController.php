<?php

namespace Modules\Admin\Http\Controllers;

use Faker\Provider\Medical;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\MedicalSupport;
use Modules\Admin\Entities\Project;
use Modules\Admin\Http\Requests\MedicalSupportRequest;
use Modules\Admin\Entities\City;

class MedicalSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $medical_supports = MedicalSupport::all();
        $projects = Project::all();
        $cities = City::all();
        return view('admin::basic_settings.medical_support.create', compact('medical_supports', 'projects', 'cities'));
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
        $data = $request->except('_token');
        $medical_support = MedicalSupport::create($data);
        if ($medical_support) {
            return redirect()->back()->with('success', 'Medical Support Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Medical Support Added Failed');
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
    public function update(MedicalSupport $medical_support, MedicalSupportRequest $request)
    {
        $data = $request->except('_token');
        $medical_support->update($data);
        if ($medical_support) {
            return redirect()->back()->with('success', 'Medical Support Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Medical Support Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(MedicalSupport $medical_support)
    {
        $medical_support->delete();
        if ($medical_support) {
            return redirect()->back()->with('success', 'Medical Support Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Medical Support Deleted Failed');
        }
    }
}
