<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Staff;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Support\Renderable;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::orderBy('id', 'desc')->get();
        return view('admin::staff.staff_list', compact('staffs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'role' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'gender' => 'required',
            'present_address' => 'required',

        ]);
        if ($request->hasfile('image')) {
            $file_path = str_ireplace("public/", "/", $request->image->store('public/staff/image'));
        } else {
            $file_path = '';
        }
        $check_user = User::where('mobile', $request->mobile)->first();
        if ($check_user) {
            return redirect()->back()->with('error', 'Phone number must be unique');
        } else {
            $addUser = new User();
            $addUser->name = $request->name . ' ' . $request->last_name;
            $addUser->email = $request->email;
            $addUser->type = 'employee';
            $addUser->role_id = $request->role;
            $addUser->mobile = $request->mobile;
            $addUser->password = Hash::make($request->password);
            $addUser->chat_id = '40';
            if ($addUser->save()) {
                $addStaff = new Staff();
                $addStaff->name = $request->name;
                $addStaff->last_name = $request->last_name;
                $addStaff->user_id = $addUser->id;
                $addStaff->father_name = $request->father_name;
                $addStaff->mother_name = $request->mother_name;
                $addStaff->email = $request->email;
                $addStaff->age = $request->age;
                $addStaff->sex = $request->gender;
                $addStaff->nid = $request->nid;
                $addStaff->mobile = $request->mobile;
                $addStaff->alternative_mobile = $request->alternative_mobile;
                $addStaff->present_address = $request->present_address;
                $addStaff->permanent_address = $request->permanent_address;
                $addStaff->reference = $request->reference;
                $addStaff->designation = $request->designation;
                $addStaff->role = $request->role;
                $addStaff->staff_type = $request->staff_type;
                $addStaff->parents_nid = $request->parents_nid;
                $addStaff->monthly_salary = $request->monthly_salary;
                $addStaff->hourly_salary = $request->hourly_salary;
                $addStaff->roster = $request->roster_morning;
                $addStaff->food = $request->food;
                $addStaff->night = $request->night;
                $addStaff->bmdc_reg_no = $request->bmdc_reg_no;
                $addStaff->bnc_reg_no = $request->bnc_reg_no;
                $addStaff->oncall_onduty = $request->oncall_onduty;
                $addStaff->oncall_offduty = $request->oncall_offduty;
                $addStaff->conveyance = $request->conveyance;
                $addStaff->increment = $request->increment;
                $addStaff->bonus = $request->bonus;
                $addStaff->deduction = $request->deduction;
                $addStaff->provident_fund = $request->provident_fund;
                $addStaff->casual_leave = $request->casual_leave;
                $addStaff->sick_leave = $request->sick_leave;
                $addStaff->emergency_leave = $request->emergency_leave;
                $addStaff->pay_leave = $request->pay_leave;
                $addStaff->educational_leave = $request->educational_leave;
                $addStaff->status = $request->status;
                $addStaff->text_password = $request->password;
                $addStaff->image = $file_path;
                $addStaff->save();
                return redirect()->back()->with('success', 'Staff Added Successfully');
            }
        }
    }

    public function edit(Request $request)
    {
        $staff = Staff::find($request->staff_id);
        return view('staff.modals.staffEditModel', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'role' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'gender' => 'required',
            'present_address' => 'required',

        ]);
        $check_image = Staff::where('id', $id)->first();
        if ($request->hasfile('image')) {
            $file_path = str_ireplace("public/", "/", $request->image->store('public/staff/image'));
        } else {
            $file_path = $check_image->image;
        }
        $userUpdate = User::where('id', $check_image->user_id)->first();
        $check_phone = User::where('mobile', $request->mobile)->first();
        if (empty($check_phone)) {
            $userUpdate->email = $request->email;
            $userUpdate->name = $request->name . $request->last_name;
            $userUpdate->password = Hash::make($request->password);
            if ($userUpdate->update()) {
                $updateStaff = Staff::where('id', $id)->first();
                $updateStaff->name = $request->name;
                $updateStaff->last_name = $request->last_name;
                $updateStaff->father_name = $request->father_name;
                $updateStaff->mother_name = $request->mother_name;
                $updateStaff->email = $request->email;
                $updateStaff->age = $request->age;
                $updateStaff->sex = $request->gender;
                $updateStaff->nid = $request->nid;
                $updateStaff->mobile = $request->mobile;
                $updateStaff->alternative_mobile = $request->alternative_mobile;
                $updateStaff->present_address = $request->present_address;
                $updateStaff->permanent_address = $request->permanent_address;
                $updateStaff->reference = $request->reference;
                $updateStaff->designation = $request->designation;
                $updateStaff->role = $request->role;
                $updateStaff->staff_type = $request->staff_type;
                $updateStaff->parents_nid = $request->parents_nid;
                $updateStaff->monthly_salary = $request->monthly_salary;
                $updateStaff->hourly_salary = $request->hourly_salary;
                $updateStaff->roster = $request->roster_morning;
                $updateStaff->food = $request->food;
                $updateStaff->night = $request->night;
                $updateStaff->bmdc_reg_no = $request->bmdc_reg_no;
                $updateStaff->bnc_reg_no = $request->bnc_reg_no;
                $updateStaff->oncall_onduty = $request->oncall_onduty;
                $updateStaff->oncall_offduty = $request->oncall_offduty;
                $updateStaff->conveyance = $request->conveyance;
                $updateStaff->increment = $request->increment;
                $updateStaff->bonus = $request->bonus;
                $updateStaff->deduction = $request->deduction;
                $updateStaff->provident_fund = $request->provident_fund;
                $updateStaff->casual_leave = $request->casual_leave;
                $updateStaff->sick_leave = $request->sick_leave;
                $updateStaff->emergency_leave = $request->emergency_leave;
                $updateStaff->pay_leave = $request->pay_leave;
                $updateStaff->educational_leave = $request->educational_leave;
                $updateStaff->status = $request->status;
                $updateStaff->text_password = $request->password;
                $updateStaff->image = $file_path;
                $updateStaff->update();
                return redirect()->back()->with('success', 'Staff Updated Successfully');
            }
        } elseif ($check_image->user_id == $check_phone->id) {
            $userUpdate->email = $request->email;
            $userUpdate->name = $request->name . ' ' . $request->last_name;
            $userUpdate->password = Hash::make($request->password);
            if ($userUpdate->update()) {
                $updateStaff = Staff::where('id', $id)->first();
                $updateStaff->name = $request->name;
                $updateStaff->last_name = $request->last_name;
                $updateStaff->father_name = $request->father_name;
                $updateStaff->mother_name = $request->mother_name;
                $updateStaff->email = $request->email;
                $updateStaff->age = $request->age;
                $updateStaff->sex = $request->gender;
                $updateStaff->nid = $request->nid;
                $updateStaff->mobile = $request->mobile;
                $updateStaff->alternative_mobile = $request->alternative_mobile;
                $updateStaff->present_address = $request->present_address;
                $updateStaff->permanent_address = $request->permanent_address;
                $updateStaff->reference = $request->reference;
                $updateStaff->designation = $request->designation;
                $updateStaff->role = $request->role;
                $updateStaff->staff_type = $request->staff_type;
                $updateStaff->parents_nid = $request->parents_nid;
                $updateStaff->monthly_salary = $request->monthly_salary;
                $updateStaff->hourly_salary = $request->hourly_salary;
                $updateStaff->roster = $request->roster_morning;
                $updateStaff->food = $request->food;
                $updateStaff->night = $request->night;
                $updateStaff->bmdc_reg_no = $request->bmdc_reg_no;
                $updateStaff->bnc_reg_no = $request->bnc_reg_no;
                $updateStaff->oncall_onduty = $request->oncall_onduty;
                $updateStaff->oncall_offduty = $request->oncall_offduty;
                $updateStaff->conveyance = $request->conveyance;
                $updateStaff->increment = $request->increment;
                $updateStaff->bonus = $request->bonus;
                $updateStaff->deduction = $request->deduction;
                $updateStaff->provident_fund = $request->provident_fund;
                $updateStaff->casual_leave = $request->casual_leave;
                $updateStaff->sick_leave = $request->sick_leave;
                $updateStaff->emergency_leave = $request->emergency_leave;
                $updateStaff->pay_leave = $request->pay_leave;
                $updateStaff->educational_leave = $request->educational_leave;
                $updateStaff->status = $request->status;
                $updateStaff->text_password = $request->password;
                $updateStaff->image = $file_path;
                $updateStaff->update();
                return redirect()->back()->with('success', 'Staff Updated Successfully');
            } else {
                return redirect()->back()->with('error', 'Mobile no should be unique');
            }
        }
    }

    public function destroy(Staff $staff)
    {
        User::where('id', $staff->user_id)->first()->delete();
        $staff->delete();

        return redirect()->back()->with('success', 'Staff Deleted Successfully');
    }
}
