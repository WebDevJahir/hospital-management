<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Product;
use Modules\Admin\Http\Requests\ProductRequest;
use Modules\Admin\Entities\Project;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $projects = Project::all();
        return view('admin::basic_settings.product.create', compact('products', 'projects'));
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
    public function store(ProductRequest $request)
    {
        $data = $request->except('_token');
        $product = Product::create($data);
        if ($product) {
            return redirect()->back()->with('success', 'Product Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Product Added Failed');
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
    public function update(Product $product, ProductRequest $request)
    {
        $data = $request->except('_token');
        $product->update($data);
        if ($product) {
            return redirect()->back()->with('success', 'Product Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Product Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Product $product)
    {
        $product->delete();
        if ($product) {
            return redirect()->back()->with('success', 'Product Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Product Deleted Failed');
        }
    }
}
