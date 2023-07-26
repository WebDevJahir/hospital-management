<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadService;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Banner;
use Illuminate\Contracts\Support\Renderable;

class BannerController extends Controller
{
    function __construct(private UploadService $uploadFile)
    {
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('admin::basic_settings.banner.create', compact('banners'));
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
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['image'] = $this->uploadFile->handleFile($request->image, 'banners');
        Banner::create($data);

        return back()->with('success', 'Banner created successfully.');
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
    public function update(Request $request, $id)
    {
        abort(404);    
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Banner $banner)
    {
        $this->uploadFile->deleteFile($banner->image);
        $banner->delete();

        return back()->with('success', 'Banner deleted successfully.');
    }
}
