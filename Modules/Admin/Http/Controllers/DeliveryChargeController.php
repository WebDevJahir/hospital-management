<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\City;
use Modules\Admin\Entities\DeliveryCharge;
use Modules\Admin\Entities\PoliceStation;
use Modules\Admin\Http\Requests\DeliveryChargeRequest;

class DeliveryChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $cities = City::all();
        $police_stations = PoliceStation::all();
        $delivery_charges = DeliveryCharge::all();
        return view('admin::basic_settings.delivery_charge.create', compact("cities", "police_stations", "delivery_charges"));
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
    public function store(DeliveryChargeRequest $request)
    {
        $data = $request->except("_token");
        $delivery_charge = DeliveryCharge::create($data);
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
    public function update(DeliveryCharge $delivery_charge, DeliveryChargeRequest $request)
    {
        $data = $request->except("_token");
        $delivery_charge->update($data);
        return redirect()->back()->with("success", "Delivery Charge updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(DeliveryCharge $delivery_charge)
    {
        $delivery_charge->delete();
        return redirect()->back()->with("success", "Delivery Charge deleted successfully");
    }
}
