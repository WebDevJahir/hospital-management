@extends('master.master')
@section('title', 'Lab Tests - Hospice Bangladesh')
@section('main_content')
    @parent
    <style>
        .section {
            border: 2px solid gray;
            padding: 10px;
            border-radius: 10px;
        }

        .legend {
            margin-top: -22px;
            margin-bottom: 10px;
        }

        .legend-title {
            background-color: white;
            padding: 0 10px;
            margin-left: 10px;
            font-size: 15px;
            font-weight: bold;
        }

        .input-group-text {
            width: 130px;
        }
    </style>
    @php
        $form_heading = !empty($employee->id) ? 'Update' : 'Add';
        $form_url = !empty($employee->id) ? route('employee.update', $employee->id) : route('employee.store');
        $form_method = !empty($employee->id) ? 'PUT' : 'POST';
        $first_name = !empty($employee->first_name) ? $employee->first_name : '';
        $last_name = !empty($employee->last_name) ? $employee->last_name : '';
        $father_name = !empty($employee->father_name) ? $employee->father_name : '';
        $mother_name = !empty($employee->mother_name) ? $employee->mother_name : '';
        $date_of_birth = !empty($employee->date_of_birth) ? $employee->date_of_birth : '';
        $email = !empty($employee->email) ? $employee->email : '';
        $age = !empty($employee->age) ? $employee->age : '';
        $gender = !empty($employee->gender) ? $employee->gender : '';
        $text_password = !empty($employee->text_password) ? $employee->text_password : '';
        $document_no = !empty($employee->document_no) ? $employee->document_no : '';
        $guardian_document_no = !empty($employee->guardian_document_no) ? $employee->guardian_document_no : '';
        $contact_number = !empty($employee->contact_number) ? $employee->contact_number : '';
        $alternative_contact_number = !empty($employee->alternative_contact_number)
            ? $employee->alternative_contact_number
            : '';
        $present_address = !empty($employee->present_address) ? $employee->present_address : '';
        $permanent_address = !empty($employee->permanent_address) ? $employee->permanent_address : '';
        $reference = !empty($employee->reference) ? $employee->reference : '';
        $designation = !empty($employee->designation) ? $employee->designation : '';
        $role_id = !empty($employee->role_id) ? $employee->role_id : '';
        $employee_type = !empty($employee->employee_type) ? $employee->employee_type : '';
        $monthly_salary = !empty($employee->monthly_salary) ? $employee->monthly_salary : '';
        $hourly_salary = !empty($employee->hourly_salary) ? $employee->hourly_salary : '';
        $roster = !empty($employee->roster) ? $employee->roster : '';
        $food = !empty($employee->food) ? $employee->food : '';
        $night = !empty($employee->night) ? $employee->night : '';
        $bmdc_reg_no = !empty($employee->bmdc_reg_no) ? $employee->bmdc_reg_no : '';
        $bnc_reg_no = !empty($employee->bnc_reg_no) ? $employee->bnc_reg_no : '';
        $oncall_onduty = !empty($employee->oncall_onduty) ? $employee->oncall_onduty : '';
        $oncall_offduty = !empty($employee->oncall_offduty) ? $employee->oncall_offduty : '';
        $conveyance = !empty($employee->conveyance) ? $employee->conveyance : '';
        $increment = !empty($employee->increment) ? $employee->increment : '';
        $bonus = !empty($employee->bonus) ? $employee->bonus : '';
        $deduction = !empty($employee->deduction) ? $employee->deduction : '';
        $provident_fund = !empty($employee->provident_fund) ? $employee->provident_fund : '';
        $casual_leave = !empty($employee->casual_leave) ? $employee->casual_leave : '';
        $sick_leave = !empty($employee->sick_leave) ? $employee->sick_leave : '';
        $emergency_leave = !empty($employee->emergency_leave) ? $employee->emergency_leave : '';
        $pay_leave = !empty($employee->pay_leave) ? $employee->pay_leave : '';
        $special_leave = !empty($employee->special_leave) ? $employee->special_leave : '';
        $status = !empty($employee->status) ? $employee->status : '';
    @endphp
    <style>
        section {
            border: 2px solid gray;
            padding: 10px;
            border-radius: 10px;

        }

        .legend {
            margin-bottom: 10px;
        }

        .legend-title {
            background-color: white;
            padding: 0 10px;
            margin-left: 10px;
            font-size: 15px;
            font-weight: bold;
        }

        .input-group-text {
            width: 130px;
        }
    </style>

    <div class="main-container">
        <!-- Page header start -->
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-container">
                            <div class="t-header mb-3">
                                <div class="th-title">
                                    <div style="">
                                        <div class="d-flex justify-content-between">
                                            <span style="margin-top: 5px;">Employee List</span>
                                            <span class="th-count">
                                                <a href="{{ route('employee.index') }}" class="btn btn-sm btn-primary"
                                                    title="Employee List"><i class="fas fa-list"
                                                        style="margin-right: 5px;"></i>Employee List</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ $form_url }}" method="{{ $form_method }}">
                                @csrf
                                <div class="personal-information mt-4">
                                    <section>
                                        <div class="legend">
                                            <span class="legend-title">Personal Information</span>
                                        </div>
                                        <div class="row gutters">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">First
                                                            Name <span class="text-danger">*</span></span>
                                                        <input type="text" class="form-control" placeholder="First Name"
                                                            name="first_name" value="{{ $first_name ?? '' }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Last
                                                            Name</span>
                                                        <input type="text" class="form-control" placeholder="Last Name"
                                                            name="last_name" value="{{ $last_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Father's
                                                            Name <span class="text-danger">*</span></span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Father's Name" name="father_name"
                                                            value="{{ $father_name }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Mother's
                                                            Name <span class="text-danger">*</span></span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Mother's Name" name="mother_name"
                                                            value="{{ $mother_name ?? '' }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Date of
                                                            Birth <span class="text-danger">*</span></span>
                                                        <input type="date" class="form-control"
                                                            placeholder="Date of Birth" name="date_of_birth"
                                                            value="{{ $date_of_birth ?? '' }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Email <span
                                                                class="text-danger">*</span></span>
                                                        <input type="email" class="form-control" placeholder="Email"
                                                            name="email" value="{{ $email ?? '' }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text"> Age</span>
                                                        <input type="number" class="form-control" placeholder="Age"
                                                            name="age" value="{{ $age ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Gender
                                                            <span class="text-danger">*</span></span>
                                                        <select class="form-control" name="gender" required>
                                                            <option value="Male"
                                                                @if (!empty($employee) && $gender == 'Male') selected @endif>
                                                                Male</option>
                                                            <option value="Female"
                                                                @if (!empty($employee) && $gender == 'Female') selected @endif>
                                                                Female</option>
                                                            <option value="Other"
                                                                @if (!empty($employee) && $gender == 'Other') selected @endif>
                                                                Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Password
                                                            <span class="text-danger">*</span></span>
                                                        <input type="password" class="form-control"
                                                            placeholder="Password" name="password"
                                                            value="{{ $text_password ?? '' }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Confirm
                                                            Password <span class="text-danger">*</span></span>
                                                        <input type="password" class="form-control"
                                                            placeholder="Confirm Password" name="confirm_password"
                                                            value="{{ $text_password ?? '' }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group md-3">
                                                        <span class="input-group-text custom-group-text">Image
                                                            <span class="text-danger">*</span></span>
                                                        <input type="file" class="form-control" placeholder="Image"
                                                            name="image" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group md-3">
                                                        <span class="input-group-text custom-group-text">Document
                                                            No <span class="text-danger">*</span></span>
                                                        <input type="number" class="form-control"
                                                            placeholder="NID/Passport/Birth-Certificate No"
                                                            name="document_no" value="{{ $document_no ?? '' }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group md-3">
                                                        <span class="input-group-text custom-group-text">guardian's
                                                            NID <span class="text-danger">*</span></span>
                                                        <input type="number" class="form-control"
                                                            placeholder="guardian's NID" name="guardian_document_no"
                                                            value="{{ $guardian_document_no ?? '' }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group md-3">
                                                        <span class="input-group-text custom-group-text">Contact
                                                            Number <span class="text-danger">*</span></span>
                                                        <input type="number" class="form-control"
                                                            placeholder="Phone Number" name="contact_number"
                                                            value="{{ $contact_number ?? '' }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group md-3">
                                                        <span class="input-group-text custom-group-text">Alternative
                                                            Con</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="Alternative Contact Number"
                                                            name="alternative_contact_number"
                                                            value="{{ $alternative_contact_number ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group md-3">
                                                        <span class="input-group-text custom-group-text">Present
                                                            Address <span class="text-danger">*</span></span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Present Address" name="present_address"
                                                            value="{{ $present_address ?? '' }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group md-3">
                                                        <span class="input-group-text custom-group-text">Permanent
                                                            Adddress</span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Permanent Address" name="permanent_address"
                                                            value="{{ $permanent_address ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="salary_particularizes mt-4">
                                    <section>
                                        <div class="legend">
                                            <span class="legend-title">Salary Particularizes</span>
                                        </div>
                                        <div class="row gutters">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group md-3">
                                                        <span class="input-group-text custom-group-text">Reference
                                                            Name</span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Reference Name" name="reference"
                                                            value="{{ $reference ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group md-3">
                                                        <span class="input-group-text custom-group-text">Designation</span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Designation" name="designation"
                                                            value="{{ $designation ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group md-3">
                                                        <span class="input-group-text custom-group-text">Role <span
                                                                class="text-danger">*</span></span>
                                                        <select class="form-control" name="role" required>
                                                            <option value="">Select user role</option>
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}"
                                                                    @if (!empty($employee) && $role_id == $role->id) selected @endif>
                                                                    {{ $role->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group md-3">
                                                        <span class="input-group-text custom-group-text">Employee
                                                            Type *</span>
                                                        <select class="form-control" id="employee_type"
                                                            name="employee_type" required="">
                                                            <option>Select type</option>
                                                            <option value="On Call"
                                                                @if (!empty($employee) && $employee_type == 'On Call') selected @endif>On
                                                                Call</option>
                                                            <option value="Roster"
                                                                @if (!empty($employee) && $employee_type == 'Roster') selected @endif>
                                                                Roster</option>
                                                            <option value="Monthly salary"
                                                                @if (!empty($employee) && $employee_type == 'Monthly salary') selected @endif>
                                                                Monthly salary
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Monthly
                                                            Salary</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="Monthly Salary" name="monthly_salary"
                                                            value="{{ $monthly_salary ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group md-3">
                                                        <span class="input-group-text custom-group-text">Hourly
                                                            Salary</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="Hourly Salary" name="hourly_salary"
                                                            value="{{ $hourly_salary ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Roster</span>
                                                        <input type="number" class="form-control" placeholder="Roster"
                                                            name="roster" value="{{ $roster ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Food</span>
                                                        <input type="number" class="form-control" placeholder="Food"
                                                            name="food" value="{{ $food ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Night</span>
                                                        <input type="number" class="form-control" placeholder="Night"
                                                            name="night" value="{{ $night ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">BMDC Reg.
                                                            No</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="BMDC Reg. No" name="bmdc_reg_no"
                                                            value="{{ $bmdc_reg_no ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">BNC Reg.
                                                            No</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="BNC Reg. No" name="bnc_reg_no"
                                                            value="{{ $bnc_reg_no ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">On Call
                                                            (On Duty)</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="On Call (On Duty)" name="oncall_onduty"
                                                            value="{{ $oncall_onduty ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">On Call
                                                            (Off Duty)</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="On Call (Off Duty)" name="oncall_offduty"
                                                            value="{{ $oncall_offduty ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="facilities mt-4">
                                    <section>
                                        <div class="legend">
                                            <span class="legend-title">Facilities</span>
                                        </div>
                                        <div class="row gutters">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Conveyance</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="Conveyance" name="conveyance"
                                                            value="{{ $conveyance ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Increment</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="Increment" name="increment"
                                                            value="{{ $increment ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-text custom-group-text">Bonus</span>
                                                        <input type="number" class="form-control" placeholder="Bonus"
                                                            name="bonus" value="{{ $bonus ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Deduction</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="Deduction" name="deduction"
                                                            value="{{ $deduction ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span
                                                            class="input-group-text custom-group-text">Provident-fund</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="Provident-fund" name="provident_fund"
                                                            value="{{ $provident_fund ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Casual
                                                            Leave</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="Casual Leave" name="casual_leave"
                                                            value="{{ $casual_leave ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Sick
                                                            Leave</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="Sick Leave" name="sick_leave"
                                                            value="{{ $sick_leave ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Emergency
                                                            Leave</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="Emergency Leave" name="emergency_leave"
                                                            value="{{ $emergency_leave ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Pay
                                                            Leave</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="Pay Leave" name="pay_leave"
                                                            value="{{ $pay_leave ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Special
                                                            Leave</span>
                                                        <input type="number" class="form-control"
                                                            placeholder="Special Leave" name="special_leave"
                                                            value="{{ $special_leave ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text custom-group-text">Status
                                                            *</span>
                                                        <select class="form-control" id="status" required=""
                                                            name="status">
                                                            <option value="">Select</option>
                                                            <option value="Active"
                                                                @if (!empty($employee) && $status == 'Active') selected @endif>
                                                                Active</option>
                                                            <option value="Not Active"
                                                                @if (!empty($employee) && $status == 'Not Active') selected @endif>
                                                                Not Active
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <button class="btn btn-outline-primary btn-lg mt-3 text-center"
                                    type="submit">Submit</button>
                            </form>
                        </div>
                        <!-- Table container end -->
                    </div>
                </div>
                <!-- Row end -->
            </div>
            <!-- Fixed body scroll end -->
        </div>
        <!-- Content wrapper end -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        //submit form with ajax request for add and update
        $('form').submit(function(e) {
            e.preventDefault();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var form = $(this);
            var url = form.attr('action');
            var method = form.attr('method');
            var data = form.serialize();
            $.ajax({
                url: url,
                type: method,
                data: data,
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                },
                success: function(response) {
                    console.log(response.status);
                    if (response.status == 'created' || response.status ==
                        'updated') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Employee ' + response.message + ' successfully',
                        });
                        setTimeout(() => {
                            window.location.href = "{{ route('employee.index') }}";
                        }, 1000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    let message = '';
                    $.each(xhr.responseJSON.errors, function(key, item) {
                        $.each(item, function(key, value) {
                            message += value + '<br/>';
                        });
                    });
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: message,
                    });
                }
            });
        });
    </script>
@endsection
