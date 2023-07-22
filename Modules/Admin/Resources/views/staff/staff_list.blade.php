@extends('master.master')
@section('title', 'Staff - Hospice Bangladesh')
@section('main_content')
    @parent
    <!-- *************
         ************ Main container start *************
        ************* -->
    <div class="main-container">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="basicModalLabel">Add new staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Row start -->
                        <form action="{{ route('staffs.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div id="example-form">
                                        <!-- Patient Details -->

                                        <h3>Personal Information</h3>
                                        <section>
                                            <div class="row gutters">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">First Name *</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-account_box"></span></span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="name"
                                                                id="name" name="name" aria-label="Username"
                                                                aria-describedby="basic-addon1" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Last Name *</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-account_box"></span></span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="name"
                                                                id="last_name" name="last_name" aria-label="Username"
                                                                aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Father's Name *</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-account_box"></span></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                placeholder="Father's Name" id="father_name"
                                                                name="father_name" aria-label="Username"
                                                                aria-describedby="basic-addon1" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Mother's Name *</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-account_box"></span></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                placeholder="Mother's Name" id="mother_name"
                                                                name="mother_name" aria-label="Username"
                                                                aria-describedby="basic-addon1" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;"> image</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">

                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" name="image" class="form-control"
                                                                    id="image">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;"> Email</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-phone"></span></span>
                                                            </div>
                                                            <input type="email" class="form-control"
                                                                placeholder="Email" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="email"
                                                                id="email" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;"> Password *</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-phone"></span></span>
                                                            </div>
                                                            <input type="text" class="form-control" required=""
                                                                placeholder="Password" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="password"
                                                                id="password" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Age:</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-home"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Age"
                                                                aria-label="Username" aria-describedby="basic-addon1"
                                                                name="age" id="age">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Sex *</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user-check"></span></span>
                                                            </div>
                                                            <select class="custom-select" id="gender" name="gender"
                                                                class="form-control" aria-label="Username"
                                                                aria-describedby="basic-addon1">
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">NID/Passport/Birth-Cirtificate
                                                        </div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user-check"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="NID/Passport/Birth-Cirtificate no"
                                                                aria-label="Username" aria-describedby="basic-addon1"
                                                                name="nid" id="nid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Parent's NID</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user-check"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Parent's NID" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="parents_nid"
                                                                id="nid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Phone Number: *</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Mobile Number" aria-label="Username"
                                                                aria-describedby="basic-addon1" required=""
                                                                name="mobile" id="mobile">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Alternative Phone Number:</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Alternative Mobile Number"
                                                                aria-label="Username" aria-describedby="basic-addon1"
                                                                name="alternative_mobile" id="alternative_mobile">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Present Address *</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-account_box"></span></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                placeholder="Present Address" id="present_address"
                                                                name="present_address" aria-label="Username"
                                                                aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Permanent Address</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-account_box"></span></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                placeholder="Permanent address" id="permanent_address"
                                                                name="permanent_address" aria-label="Username"
                                                                aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <h3>Salary particularizes</h3>
                                        <section>

                                            <div class="row gutters">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Reference Name</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-account_box"></span></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                placeholder="Reference name" id="reference"
                                                                name="reference" aria-label="Username"
                                                                aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Degination</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-account_box"></span></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                placeholder="Designation" id="designation"
                                                                name="designation" aria-label="Username"
                                                                aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;"> Role *</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user-check"></span></span>
                                                            </div>
                                                            <select class="custom-select" id="role" name="role"
                                                                required="">
                                                                <option value="">Select user role</option>
                                                                @php $roles = App\UserRole::get(); @endphp
                                                                @foreach ($roles as $role)
                                                                    <option value="{{ $role->id }}">
                                                                        {{ $role->rolename }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;"> Staff Type *</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user-check"></span></span>
                                                            </div>
                                                            <select class="custom-select" id="role"
                                                                name="staff_type" required="">
                                                                <option>Select type</option>
                                                                <option value="On Call">On Call</option>
                                                                <option value="Roster">Roster</option>
                                                                <option value="Monthly salary">Monthly salary</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Monthly Salary:</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-home"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Monthly Salary" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="monthly_salary"
                                                                id="monthly_salary">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Hourly Salary</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user-check"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Hourly Salary" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="hourly_salary"
                                                                id="hourly_salary">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Roster</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user-check"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Hourly Salary" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="roster_morning"
                                                                id="roster_morning">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Food:</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Food"
                                                                aria-label="Username" aria-describedby="basic-addon1"
                                                                name="food" id="food">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Night:</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Night" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="night"
                                                                id="night">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">BMDC Reg. No:</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-account_box"></span></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                placeholder="BMDC Reg. No" id="bmdc_reg_no"
                                                                name="bmdc_reg_no" aria-label="Username"
                                                                aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">BNC Reg. No:</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-account_box"></span></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                placeholder="BNC Registration No" id="bnc_reg_no"
                                                                name="bnc_reg_no" aria-label="Username"
                                                                aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">On call (On Duty):</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder=""
                                                                id="oncall_onduty" name="oncall_onduty"
                                                                aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">On call (Off Duty):</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder=""
                                                                id="oncall_offduty" name="oncall_offduty"
                                                                aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <h3>Facilities</h3>
                                        <section>

                                            <div class="row gutters">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Conveyance</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-account_box"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Conveyance" id="conveyance"
                                                                name="conveyance" aria-label="Username"
                                                                aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Increment</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-account_box"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Increment" id="increment" name="increment"
                                                                aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;"> Bonus</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user-check"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Bonus" id="bonus" name="bonus"
                                                                aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;"> Deduction</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user-check"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Deduction" id="deduction" name="deduction"
                                                                aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Provident-fund:</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-home"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Provident Fund" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="provident_fund"
                                                                id="provident_fund">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Casual Leave</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user-check"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Casual Leave" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="casual_leave"
                                                                id="casual_leave">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Sick Leave</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user-check"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Sick Leave" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="sick_leave"
                                                                id="sick_leave">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Emergency Leave</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user-check"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Emergency Leave" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="emergency_leave"
                                                                id="emergency_leave">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Pay Leave</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user-check"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Pay Leave" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="pay_leave"
                                                                id="pay_leave">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Special Leave</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-user-check"></span></span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                placeholder="Educational Leave" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="educational_leave"
                                                                id="educational_leave">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Status *</div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-account_box"></span></span>
                                                            </div>
                                                            <select class="custom-select" id="status" required=""
                                                                name="status">
                                                                <option value="">Select</option>
                                                                <option value="Active">Active</option>
                                                                <option value="Not Active">Not Active</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                </div>
                                            </div>
                                            <div class="text-center"><button
                                                    class="btn btn-success btn-lg">Submit</button></div>
                                        </section>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Add Modal -->

        <!-- Page header end -->
        <!-- Content wrapper start -->
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">

                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <!-- Table container start -->
                        @php $permission = Session::get('permission'); @endphp
                        {{-- @dd($permission) --}}
                        <div class="table-container">
                            <div class="t-header">staffs
                                <button type="button" class="btn-info btn-rounded" data-toggle="modal"
                                    data-target="#addModal">Add new </button>

                            </div>

                            <div class="table-responsive">
                                <table id="Example" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            @if (Auth::id() == 40)
                                                <th>Password</th>
                                            @endif
                                            <th>Phone Number</th>
                                            <th>Image</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="roleTable">
                                        @foreach ($staffs as $staff)
                                            <tr id="tr{{ $staff->id }}">

                                                <td id="staff{{ $staff->id }}">{{ $staff->name }}</td>
                                                <td id="staff{{ $staff->id }}">{{ $staff->email }}</td>
                                                @if (Auth::id() == 40)
                                                    <td id="staff{{ $staff->id }}">{{ $staff->text_password }}</td>
                                                @endif
                                                <td id="staff{{ $staff->id }}">{{ $staff->mobile }}</td>
                                                <td>
                                                    @if ($staff->image)
                                                        <a target="blank"
                                                            href="{{ asset('public/storage/' . $staff->image) }}"><i
                                                                class="far fa-eye text-success"></i></a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>
                                                <td id="staff{{ $staff->id }}"></td>
                                                <td>
                                                    {{-- @if (in_array(13, $permission)) --}}
                                                    <button class="btn btn-sm" style="background:inherit" title="Edit"
                                                        onclick="editStaffView({{ $staff->id }})" type="submit"><i
                                                            class="fas fa-edit text-success"></i></button>|
                                                    {{-- @endif --}}
                                                    {{-- @if (in_array(14, $permission)) --}}
                                                    <form action="{{ route('staffs.destroy', $staff->id) }}"
                                                        method="POST" data-toggle="tooltip" title="Delete"
                                                        class="d-inline deleteData">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-outline-danger btn-sm delete"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                    {{-- @endif --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
    <!-- *************
         ************ Main container end *************
        ************* -->
    <!-- edit modals -->
    <div id="edit_modal_body">

    </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script type="text/javascript">
                Toast.fire({
                    icon: 'error',
                    title: '{!! $error !!}',
                })
            </script>
        @endforeach
    @endif
    @if (Session::has('success'))
        <script type="text/javascript">
            Toast.fire({
                icon: 'success',
                title: '{!! Session::get('success') !!}',
            })
        </script>
        @php Session::forget('success') @endphp
    @endif

    @if (Session::has('failed'))
        <script type="text/javascript">
            Toast.fire({
                icon: 'success',
                title: '{!! Session::get('failed') !!}',
            })
        </script>
    @endif
@endsection
@section('script')
    <script type="text/javascript">
        $('#Example').DataTable({
            "order": []
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
        function editStaffView(staff_id) {
            $('#modal-body').html(null);
            $.get("{{ route('staffs.edit', $staff->id) }}", function(data) {
                $('#edit_modal_body').html(data);
                $('#editStaffModal').modal();
            });
        }

        $('.deleteData').submit(function(e) {
            e.preventDefault();
            let form = this;
            let id = $(this).data('id');
            let url = "{{ route('staffs.destroy', ':id') }}";
            url = url.replace(':id', id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }); //end of submit
    </script>
@endsection
