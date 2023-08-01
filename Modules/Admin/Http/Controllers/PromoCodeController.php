<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Project;
use Modules\Admin\Entities\PromoCode;
use Illuminate\Contracts\Support\Renderable;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $promo_codes = PromoCode::orderBy('id', 'desc')->get();
        $projects = Project::latest()->get();
        return view('admin::basic_settings.promo_code.create', compact('promo_codes', 'projects'));
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
        PromoCode::create($request->all());

        return redirect()->back()->with('success', 'Promo code created successfully');

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
    public function update(PromoCode $promo_code)
    {
        $promo_code->update(request()->all());

        return redirect()->back()->with('success', 'Promo code updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(PromoCode $promo_code)
    {
        $promo_code->delete();

        return redirect()->back()->with('success', 'Promo code deleted successfully');
    }
}
