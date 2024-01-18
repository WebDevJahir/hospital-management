@extends('master.master')
@section('title', 'Investigation Category - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_heading = !empty($leave->id) ? 'Edit' : 'Create';
        $form_url = !empty($leave->id) ? route('leaves.update', $leave->id) : route('leaves.store');
        $form_method = !empty($leave->id) ? 'PUT' : 'POST';
        $patient_id = !empty($leave->id) ? $leave->patient_id : '';
        $project_id = !empty($leave->id) ? $leave->project_id : '';
        $police_station_id = !empty($leave->id) ? $leave->police_station_id : '';
        $lab_id = !empty($leave->id) ? $leave->lab_id : '';
        $admission_date = !empty($leave->id) ? $leave->admission_date : '';
        $discharge_date = !empty($leave->id) ? $leave->discharge_date : '';
        $leave_date = !empty($leave->id) ? $leave->leave_date : '';
        $need_date = !empty($leave->id) ? $leave->need_date : '';
        $need_time = !empty($leave->id) ? $leave->need_time : '';
        $sub_total = !empty($leave->id) ? $leave->sub_total : '';
        $discount_type = !empty($leave->id) ? $leave->discount_type : '';
        $discount = !empty($leave->id) ? $leave->discount : '';
        $discount_amount = !empty($leave->id) ? $leave->discount_amount : '';
        $vat_type = !empty($leave->id) ? $leave->vat_type : '';
        $vat = !empty($leave->id) ? $leave->vat : '';
        $vat_amount = !empty($leave->id) ? $leave->vat_amount : '';
        $delivery_charge = !empty($leave->id) ? $leave->delivery_charge : '';
        $service_charge = !empty($leave->id) ? $leave->service_charge : '';
        $collection_charge = !empty($leave->id) ? $leave->collection_charge : '';
        $total = !empty($leave->id) ? $leave->total : '';
        $advance = !empty($leave->id) ? $leave->advance : '';
        $due = !empty($leave->id) ? $leave->due : '';
    @endphp
    <div class="main-container">
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">


                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-container">
                            <div class="t-header">Leave Application
                            </div>
                            <br>

                            <form class="" action="{{ $form_url }}" method="POST">
                                {{ method_field($form_method) }}
                                @csrf
                                <div class="">
                                    <!--modal-body-->
                                    <div class="row gutters">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div style="font-weight: bold;">Employee Name</div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><span
                                                                class="icon-account_box"></span></span>
                                                    </div>
                                                    <select name="employee_id" id="employee_id" class="form-control select2"
                                                        required="" onchange="checkLeave()">
                                                        <option value="">Select Employee</option>
                                                        @foreach ($emplyees as $staff)
                                                            <option value="{{ $staff->id }}">
                                                                {{ $staff->first_name }}
                                                                {{ $staff->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div style="font-weight: bold;">Application Date</div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><span
                                                                class="icon-account_box"></span></span>
                                                    </div>
                                                    <input type="date" class="form-control"
                                                        placeholder="Application date" id="date"
                                                        name="date" aria-label="Username"
                                                        aria-describedby="basic-addon1" value="" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div style="font-weight: bold;">Leave From Date</div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><span
                                                                class="icon-account_box"></span></span>
                                                    </div>
                                                    <input type="date" class="form-control"
                                                        placeholder="Leave Starting Date" oninput="getTotalDays()"
                                                        id="from_date" name="from_date" aria-label="Username"
                                                        aria-describedby="basic-addon1" value="" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div style="font-weight: bold;">Joining Date</div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><span
                                                                class="icon-account_box"></span></span>
                                                    </div>
                                                    <input oninput="getTotalDays()" type="date" class="form-control"
                                                        placeholder="Joining Date" id="to_date" name="to_date"
                                                        aria-label="Username" aria-describedby="basic-addon1" value=""
                                                        required="">
                                                </div>
                                            </div>
                                        </div <div class="col-2">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Total Days</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="text" class="form-control" placeholder="" id="total_day_in"
                                                    aria-label="Username" aria-describedby="basic-addon1" value="0"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row gutters">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Leave Type</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><span
                                                            class="icon-account_box"></span></span>
                                                </div>
                                                <select name="leave_type" id="leave_type"
                                                    class="form-control select-height" required=""
                                                    onchange="checkLeave()">
                                                    <option>Select Leave</option>

                                                    <option value="pay_leave">Pay Leave</option>
                                                    <option value="casual_leave">Casual Leave</option>
                                                    <option value="emergency_leave">Emergency Leave</option>
                                                    <option value="sick_leave">Sick Leave</option>
                                                    <option value="educational_leave">Special Leave</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Total</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="text" class="form-control" placeholder="Total Leave"
                                                    id="total_leave" name="total_leave" aria-label="Username"
                                                    aria-describedby="basic-addon1" value="0" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Used</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="text" class="form-control" placeholder="Used Leave"
                                                    id="used_leave" name="used_leave" aria-label="Username"
                                                    aria-describedby="basic-addon1" value="0" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Rest</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="text" class="form-control" placeholder="Rest Leave"
                                                    id="rest_leave" name="rest_leave" aria-label="Username"
                                                    aria-describedby="basic-addon1" value="0" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Address during leave</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><span
                                                            class="icon-account_box"></span></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="Address During Leave" id="address_during_leave"
                                                    name="address_during_leave" aria-label="Username"
                                                    aria-describedby="basic-addon1" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Contact During Leave</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><span
                                                            class="icon-account_box"></span></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="Contact during leave" id="contact_during_leave"
                                                    name="contact_during_leave" aria-label="Username"
                                                    aria-describedby="basic-addon1" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Acting officials name during leave(if
                                                applicable)</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><span
                                                            class="icon-account_box"></span></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="official name"
                                                    id="official_name" name="official_name" aria-label="Username"
                                                    aria-describedby="basic-addon1" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Cause of Leave</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><span
                                                            class="icon-account_box"></span></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Cause of Leave"
                                                    id="cause_of_leave" name="cause_of_leave" aria-label="Username"
                                                    aria-describedby="basic-addon1" value="" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Recommendation Name</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><span
                                                            class="icon-account_box"></span></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="Recommendation name" id="recommendation_name"
                                                    name="recommendation_name" aria-label="Username"
                                                    aria-describedby="basic-addon1" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
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
    @include('accounts::leaves.js.leaves-js')
@endsection
