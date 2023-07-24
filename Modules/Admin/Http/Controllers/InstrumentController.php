<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\City;
use Modules\Admin\Entities\Instrument;
use Modules\Admin\Entities\Project;
use Modules\Admin\Http\Requests\InstrumentRequest;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $instruments = Instrument::all();
        $projects = Project::all();
        return view('admin::basic_settings.instrument.create', compact('instruments', 'projects'));
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
    public function store(InstrumentRequest $request)
    {
        $data = $request->except('_token');
        $instrument = Instrument::create($data);
        if ($instrument) {
            return redirect()->back()->with('success', 'Instrument Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Instrument Added Failed');
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
    public function update(Instrument $instrument, InstrumentRequest $request)
    {
        $data = $request->except('_token');
        $instrument->update($data);
        if ($instrument) {
            return redirect()->back()->with('success', 'Instrument Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Instrument Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Instrument $instrument)
    {
        $instrument->delete();
        if ($instrument) {
            return redirect()->back()->with('success', 'Instrument Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Instrument Deleted Failed');
        }
    }
}
