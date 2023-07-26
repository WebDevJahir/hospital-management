<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\LabTest;
use Modules\Admin\Http\Requests\LabTestRequest;
use Modules\Admin\Entities\Project;

class LabTestController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $lab_tests = LabTest::all();
        $projects = Project::all();
        return view('admin::basic_settings.lab_test.create', compact('lab_tests', 'projects'));
    }
    /**
     * Display a listing of the resource.
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
    public function store(LabTestRequest $request)
    {
        $data = $request->except('_token');
        $product = LabTest::create($data);
        if ($product) {
            return redirect()->back()->with('success', 'Lab Test Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Lab Test Added Failed');
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
    public function update(LabTest $lab_test, LabTestRequest $request)
    {
        $data = $request->except('_token');
        $lab_test->update($data);
        if ($lab_test) {
            return redirect()->back()->with('success', 'Lab Test Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Lab Test Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(LabTest $lab_test)
    {
        $lab_test->delete();
        if ($lab_test) {
            return redirect()->back()->with('success', 'Lab Test Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Lab Test Deleted Failed');
        }
    }
}
