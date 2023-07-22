<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Doctor;
use Modules\Admin\Entities\IncomeHead;
use Modules\Admin\Entities\Speciality;
use Modules\Admin\Entities\ProjectInfo;
use Modules\Admin\Entities\IncomeSubCategory;
use Modules\Admin\Entities\PrescriptionDoctor;

class DoctorController extends Controller
{
    public function index()
    {
        $specialities = Speciality::get();
        $projects = ProjectInfo::get();
        $doctors = Doctor::with('incomeHead', 'subCategory')->orderBy('id', 'desc')->get();
        return view('admin::doctor.doctor_list', compact('doctors', 'specialities', 'projects'));
    }

    public function addDoctor(Request $request)
    {
        $addDoctor = new Doctor();
        $addDoctor->speciality_id = $request->speciality_id;
        $addDoctor->project_id = $request->project_id;
        $addDoctor->income_head_id = $request->income_head_id;
        $addDoctor->income_subcategory_id = $request->sub_category_id;
        $addDoctor->charge = $request->charge;
        $addDoctor->save();

        return $addDoctor->id;
    }

    public function editDoctor(Request $request)
    {
        $doctor = Doctor::with('subCategory')->where('id', $request->doctor_id)->first();
        $specialities = Speciality::get();
        $projects = ProjectInfo::get();
        $incomeHeads = IncomeHead::get();
        $incomeSubCategories = IncomeSubCategory::where('head_id', $doctor->income_head_id)->get();
        return view('admin::doctor.modals.doctorEditModel', compact('doctor', 'specialities', 'projects', 'incomeHeads', 'incomeSubCategories'));
    }

    public function updateDoctor(Request $request)
    {
        $updateDoctor = Doctor::where('id', $request->doctor_id)->first();
        $updateDoctor->speciality_id = $request->speciality_id;
        $updateDoctor->project_id = $request->project_id;
        $updateDoctor->income_head_id = $request->income_head_id;
        $updateDoctor->income_subcategory_id = $request->sub_category_id;
        $updateDoctor->charge = $request->charge;
        $updateDoctor->update();
        return $updateDoctor->id;
    }

    public function deleteDoctorView(Request $request)
    {
        $doctor = Doctor::with('speciality')->where('id', $request->doctor_id)->first();
        return view('admin::doctor.modals.doctorDeleteModel', compact('doctor'));
    }

    public function deleteDoctor(Request $request)
    {
        $doctor = Doctor::findorfail($request->doctor_id)->delete();

        return 1;
    }

    public function prescriptionDoctorList()
    {
        $doctors = PrescriptionDoctor::orderBy('id', 'desc')->get();
        return view('admin::staff.prescription_doctor_list', compact('doctors'));
    }

    public function addPrescriptionDoctor(Request $request)
    {
        $addPreDoctor = new PrescriptionDoctor();
        $addPreDoctor->doctor_name = $request->doc_name;
        $addPreDoctor->status = $request->status;
        $addPreDoctor->description = $request->description;
        $addPreDoctor->save();
        return redirect()->back()->with('success', 'Doctor Added Successfully');
    }

    public function editPrescriptionDoctor(Request $request)
    {
        $doctor = PrescriptionDoctor::where('id', $request->id)->first();
        return view('admin::staff.modals.edit_prescription_doctor', compact('doctor'));
    }

    public function updatePrescriptionDoctor(Request $request, $id)
    {
        $addPreDoctor = PrescriptionDoctor::where('id', $id)->first();
        $addPreDoctor->doctor_name = $request->doc_name;
        $addPreDoctor->status = $request->status;
        $addPreDoctor->description = $request->description;
        $addPreDoctor->update();
        return redirect()->back()->with('success', 'Doctor Updated Successfully');
    }

    public function deletePrescriptionDoctor(Request $request)
    {
        $delete = PrescriptionDoctor::where('id', $request->id)->delete();
        return 1;
    }
}
