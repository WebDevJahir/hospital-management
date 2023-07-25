<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Doctor;
use Modules\Admin\Entities\PrescriptionDoctor;
use Modules\Admin\Http\Requests\DoctorRequest;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $doctors = PrescriptionDoctor::latest()->get();
        return view('admin::doctor.create', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(DoctorRequest $request)
    {
        PrescriptionDoctor::create($request->all());
        return redirect()->back()->with('success', 'Doctor added successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PrescriptionDoctor $doctor, DoctorRequest $request)
    {
        $doctor->update($request->all());
        return redirect()->back()->with('success', 'Doctor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(PrescriptionDoctor $doctor)
    {
        $doctor->delete();
        return redirect()->back()->with('success', 'Doctor deleted successfully');
    }
}
