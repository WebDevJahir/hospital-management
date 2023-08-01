<?php

namespace Modules\Patient\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Package;
use Modules\Patient\Entities\Patient;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Entities\City;
use Modules\Admin\Entities\Upazila;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $packages = Package::get();
        $patients = Patient::with('package')->orderBy('id', 'desc')->get();
        $reg_no = Patient::max('reg_no');
        $cities = City::latest()->get();
        // $thanas = Upazila::latest()->get();
        $thanas = [
            0 => [
                'id' => 1,
                'name' => 'Dhaka'
            ],
            1 => [
                'id' => 2,
                'name' => 'Chittagong'
            ],
        ];

        if (!$reg_no) {
            $reg_no = 202103;
        } else {
            $reg_no = $reg_no + 1;
        }
        return view('patient::patients.create', compact('patients', 'packages', 'reg_no', 'cities', 'thanas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('patient::create');
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
        return view('patient::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('patient::edit');
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
}
