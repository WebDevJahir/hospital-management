<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\District;
use Modules\Admin\Entities\PoliceStation;
use Modules\Admin\Entities\ServiceCharge;
use Modules\Admin\Http\Requests\ServiceChargeRequest;

class ServiceChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $districts = District::all();
        $police_stations = PoliceStation::all();
        $service_charges = ServiceCharge::all();
        return view('admin::basic_settings.service_charge.create', compact("police_stations", "districts", "service_charges"));
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
    public function store(ServiceChargeRequest $request)
    {
        $data = $request->except("_token");
        $service_charge = ServiceCharge::create($data);
        return redirect()->back()->with("success", "Delivery Charge created successfully");
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
    public function update(ServiceCharge $service_charge, ServiceChargeRequest $request)
    {
        $data = $request->except("_token");
        $service_charge->update($data);
        return redirect()->back()->with("success", "Delivery Charge updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(ServiceCharge $service_charge)
    {
        $service_charge->delete();
        return redirect()->back()->with("success", "Delivery Charge deleted successfully");
    }
}
