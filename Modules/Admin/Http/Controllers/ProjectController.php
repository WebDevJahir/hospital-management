<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Project;
use Modules\Admin\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin::finance_settings.project.create', compact('projects'));
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
        $data = $request->except('_token');
        Project::create($data);
        return redirect()->back()->with('success', 'Project added successfully');
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
    public function update(Project $project, ProjectRequest $request)
    {
        $data = $request->except('_token');
        $project->update($data);
        return redirect()->back()->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Project $project)
    {
        if ($project->incomeHeads->count() > 0) {
            return redirect()->back()->with('error', 'Project cannot be deleted because it has income heads');
        } else {
            $project->delete();
            return redirect()->back()->with('success', 'Project deleted successfully');
        }
    }
}
