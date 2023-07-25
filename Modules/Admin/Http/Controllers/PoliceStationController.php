<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\PoliceStation;
use Modules\Admin\Http\Requests\PoliceStationRequest;
use Modules\Admin\Entities\City;

class PoliceStationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $police_stations = PoliceStation::all();
        $cities = City::all();
        return view('admin::basic_settings.police_station.create', compact("police_stations", "cities"));
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
        $data = $request->except("_token");
        $police_station = PoliceStation::create($data);
        return redirect()->back()->with("success", "Police Station created successfully");
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
    public function update(Policestation $police_station, PoliceStationRequest $request)
    {
        $data = $request->except("_token");
        $police_station->update($data);
        return redirect()->back()->with("success", "Police Station updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Policestation $police_station)
    {
        $police_station->delete();
        return redirect()->back()->with("success", "Police Station deleted successfully");
    }

    public function getPoliceStation(Request $request)
    {
        $police_stations = PoliceStation::where("city_id", $request->city_id)->get();
        return response()->json($police_stations);
    } 
}
