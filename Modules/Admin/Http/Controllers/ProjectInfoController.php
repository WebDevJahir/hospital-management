<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\ProjectInfo;

class ProjectInfoController extends Controller
{
    public function index()
    {
      if(Auth::check() ){
        return view('admin::administrator.projects');
      }
      return view('login');
      
    }

    public function add(Request $request)
    {
      if(Auth::check() ){
		if($request->hasfile('logo')){
			$file_path = str_ireplace("public/","/", $request->logo->store('public/project/logo'));
		}else{
			$file_path = '';
		}
		$newProject = new ProjectInfo();
		$newProject->name = $request->name;
		$newProject->address = $request->address;
		$newProject->email = $request->email;
		$newProject->logo = $file_path;
    $newProject->phone = $request->phone;
		$newProject->web_link = $request->web_link;
		$newProject->dbc = 1;
		$newProject->save();
      	return $newProject->id;
      }
      return view('login');
      
    } 


    public function deleteView(Request $request)
    {
      if(Auth::check() ){
      	$project_id = $request->project_id;

        return view('admin::administrator.modals.projectDeleteModel',compact('project_id'));
      }
      return view('login');
      
    }  


    public function remove(Request $request)
    {
      if(Auth::check() ){
        $project_id = $request->project_id;
        $project_info = ProjectInfo::where('id', $project_id)->first();
        $project_info->delete();
        return 1;
      }
      return view('login');
    }

     
    public function editProjectView(Request $request){
      	$project = ProjectInfo::where('id', $request->project_id)->first();

        return view('admin::administrator.modals.projectEditModel',compact('project'));
      } 

    public function updateProject(Request $request){
    $updateProject = ProjectInfo::where('id', $request->project_id)->first();
    if($request->hasfile('logo')){
      $file_path = str_ireplace("public/","/", $request->logo->store('public/project/logo'));
    }else{
      $file_path = $updateProject->image;
    }
    $updateProject->name = $request->name;
    $updateProject->address = $request->address;
    $updateProject->email = $request->email;
    $updateProject->logo = $file_path;
    $updateProject->phone = $request->phone;
    $updateProject->web_link = $request->web_link;
    $updateProject->dbc = 1;
    $updateProject->update();
    return $updateProject->id;
    }
}
