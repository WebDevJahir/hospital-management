@php
    $is_old = old() ? true : false;
    $form_heading = !empty($employee->id) ? 'Update' : 'Add';
    $form_url = !empty($employee->id) ? route('employee.update', $employee->id) : route('employee.store');
    $form_method = !empty($employee->id) ? 'PUT' : 'POST';
@endphp
<form action="{{ $form_url }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if (!empty($employee->id))
        @method('PUT')
    @endif
    <div class="modal fade" id="staffModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">{{ $form_heading }} Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="personal-information">
                        <section>
                            <div class="legend">
                                <span class="legend-title">Personal Information</span>
                            </div>
                            <div class="row gutters">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">First Name</span>
                                            <input type="text" class="form-control" placeholder="First Name"
                                                name="first_name" value="{{ $employee->first_name ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Last Name</span>
                                            <input type="text" class="form-control" placeholder="Last Name"
                                                name="last_name" value="{{ $employee->last_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Father's Name</span>
                                            <input type="text" class="form-control" placeholder="Father's Name"
                                                name="father_name" value="{{ $employee->father_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Mother's Name</span>
                                            <input type="text" class="form-control" placeholder="Mother's Name"
                                                name="mother_name" value="{{ $employee->mother_name ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Date of Birth</span>
                                            <input type="date" class="form-control" placeholder="Date of Birth"
                                                name="date_of_birth" value="{{ $employee->date_of_birth ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Email</span>
                                            <input type="email" class="form-control" placeholder="Email"
                                                name="email" value="{{ $employee->email ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Age</span>
                                            <input type="number" class="form-control" placeholder="Age" name="age"
                                                value="{{ $employee->age ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Gender</span>
                                            <select class="form-control" name="gender">
                                                <option value="Male"
                                                    @if (!empty($employee) && $employee->gender == 'Male') selected @endif>Male</option>
                                                <option value="Female"
                                                    @if (!empty($employee) && $employee->gender == 'Female') selected @endif>Female</option>
                                                <option value="Other"
                                                    @if (!empty($employee) && $employee->gender == 'Other') selected @endif>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Password</span>
                                            <input type="password" class="form-control" placeholder="Password"
                                                name="password" value="{{ $employee->text_password ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Confirm Password</span>
                                            <input type="password" class="form-control"
                                                placeholder="Confirm Password" name="confirm_password"
                                                value="{{ $employee->text_password ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group md-3">
                                            <input type="file" class="form-control" placeholder="Image"
                                                name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group md-3">
                                            <span class="input-group-text custom-group-text">Document No</span>
                                            <input type="number" class="form-control"
                                                placeholder="NID/Passport/Birth-Certificate No" name="document_no"
                                                value="{{ $employee->document_no ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group md-3">
                                            <span class="input-group-text custom-group-text">guardian's NID</span>
                                            <input type="number" class="form-control" placeholder="guardian's NID"
                                                name="guardian_document_no"
                                                value="{{ $employee->guardian_document_no ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group md-3">
                                            <span class="input-group-text custom-group-text">Contact Number</span>
                                            <input type="number" class="form-control" placeholder="Phone Number"
                                                name="contact_number" value="{{ $employee->contact_number ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group md-3">
                                            <span class="input-group-text custom-group-text">Alternative Con</span>
                                            <input type="number" class="form-control"
                                                placeholder="Alternative Contact Number"
                                                name="alternative_contact_number"
                                                value="{{ $employee->alternative_contact_number ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group md-3">
                                            <span class="input-group-text custom-group-text">Present Address
                                                *</span>
                                            <input type="text" class="form-control" placeholder="Present Address"
                                                name="present_address"
                                                value="{{ $employee->present_address ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group md-3">
                                            <span class="input-group-text custom-group-text">Permanent Add
                                                *</span>
                                            <input type="text" class="form-control"
                                                placeholder="Permanent Address" name="permanent_address"
                                                value="{{ $employee->permanent_address ?? '' }}">
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
                                            <span class="input-group-text custom-group-text">Reference Name</span>
                                            <input type="text" class="form-control" placeholder="Reference Name"
                                                name="reference" value="{{ $employee->reference ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group md-3">
                                            <span class="input-group-text custom-group-text">Designation *</span>
                                            <input type="text" class="form-control" placeholder="Designation"
                                                name="designation" value="{{ $employee->designation ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group md-3">
                                            <span class="input-group-text custom-group-text">Role *</span>
                                            <select class="form-control" name="role">
                                                <option value="">Select user role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}"
                                                        @if (!empty($employee) && $employee->role_id == $role->id) selected @endif>
                                                        {{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group md-3">
                                            <span class="input-group-text custom-group-text">Employee Type *</span>
                                            <select class="form-control" id="role" name="staff_type"
                                                required="">
                                                <option>Select type</option>
                                                <option value="On Call"
                                                    @if (!empty($employee) && $employee->employee_type == 'On Call') selected @endif>On Call</option>
                                                <option value="Roster"
                                                    @if (!empty($employee) && $employee->employee_type == 'Roster') selected @endif>Roster</option>
                                                <option value="Monthly salary"
                                                    @if (!empty($employee) && $employee->employee_type == 'Monthly salary') selected @endif>Monthly salary
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Monthly Salary</span>
                                            <input type="number" class="form-control" placeholder="Monthly Salary"
                                                name="monthly_salary" value="{{ $employee->monthly_salary ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group md-3">
                                            <span class="input-group-text custom-group-text">Hourly Salary</span>
                                            <input type="number" class="form-control" placeholder="Hourly Salary"
                                                name="hourly_salary" value="{{ $employee->hourly_salary ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Roster</span>
                                            <input type="number" class="form-control" placeholder="Roster"
                                                name="roster" value="{{ $employee->roster ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Food</span>
                                            <input type="number" class="form-control" placeholder="Food"
                                                name="food" value="{{ $employee->food ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Night</span>
                                            <input type="number" class="form-control" placeholder="Night"
                                                name="night" value="{{ $employee->night ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">BMDC Reg. No</span>
                                            <input type="number" class="form-control" placeholder="BMDC Reg. No"
                                                name="bmdc_reg_no" value="{{ $employee->bmdc_reg_no ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">BNC Reg. No</span>
                                            <input type="number" class="form-control" placeholder="BNC Reg. No"
                                                name="bnc_reg_no" value="{{ $employee->bnc_reg_no ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">On Call (On Duty)</span>
                                            <input type="number" class="form-control"
                                                placeholder="On Call (On Duty)" name="oncall_onduty"
                                                value="{{ $employee->oncall_onduty ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">On Call (Off Duty)</span>
                                            <input type="number" class="form-control"
                                                placeholder="On Call (Off Duty)" name="oncall_offduty"
                                                value="{{ $employee->oncall_offduty ?? '' }}">
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
                                            <input type="number" class="form-control" placeholder="Conveyance"
                                                name="conveyance" value="{{ $employee->conveyance ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Increment</span>
                                            <input type="number" class="form-control" placeholder="Increment"
                                                name="increment" value="{{ $employee->increment ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text custom-group-text">Bonus</span>
                                            <input type="number" class="form-control" placeholder="Bonus"
                                                name="bonus" value="{{ $employee->bonus ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Deduction</span>
                                            <input type="number" class="form-control" placeholder="Deduction"
                                                name="deduction" value="{{ $employee->deduction ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Provident-fund</span>
                                            <input type="number" class="form-control" placeholder="Provident-fund"
                                                name="provident_fund" value="{{ $employee->provident_fund ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Casual Leave</span>
                                            <input type="number" class="form-control" placeholder="Casual Leave"
                                                name="casual_leave" value="{{ $employee->casual_leave ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Sick Leave</span>
                                            <input type="number" class="form-control" placeholder="Sick Leave"
                                                name="sick_leave" value="{{ $employee->sick_leave ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Emergency Leave</span>
                                            <input type="number" class="form-control" placeholder="Emergency Leave"
                                                name="emergency_leave"
                                                value="{{ $employee->emergency_leave ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Pay Leave</span>
                                            <input type="number" class="form-control" placeholder="Pay Leave"
                                                name="pay_leave" value="{{ $employee->pay_leave ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Special Leave</span>
                                            <input type="number" class="form-control" placeholder="Special Leave"
                                                name="special_leave" value="{{ $employee->special_leave ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Status *</span>
                                            <select class="form-control" id="status" required=""
                                                name="status">
                                                <option value="">Select</option>
                                                <option value="Active"
                                                    @if (!empty($employee) && $employee->status == 'Active') selected @endif>Active</option>
                                                <option value="Not Active"
                                                    @if (!empty($employee) && $employee->status == 'Not Active') selected @endif>Not Active
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-primary tn-lg"
                        type="submit">{{ $employee->id ? 'Update' : 'Save' }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
