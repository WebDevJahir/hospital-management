<?php

namespace Modules\Monitoring\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Monitoring\Entities\Medicine;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $medicines = Medicine::all();
        return view('monitoring::prescription.medicine.create', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $medicines = Medicine::all();
        return view('monitoring::prescription.medicine.create', compact('medicines'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Medicine::create($data);
        return redirect()->back()->with('success', 'Medicine Created Successfully');
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
        $medicine = Medicine::find($id);
        return view('monitoring::prescription.medicine.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $medicine = Medicine::find($id);
        $medicine->update($data);
        return redirect()->back()->with('success', 'Medicine Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Medicine::find($id)->delete();
        return redirect()->back()->with('success', 'Medicine Deleted Successfully');
    }
}
