@extends('master.master')
@section('title', 'Investigation Category - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_heading = !empty($leave->id) ? 'Edit' : 'Create';
        $form_url = !empty($leave->id) ? route('leaves.update', $leave->id) : route('leaves.store');
        $form_method = !empty($leave->id) ? 'PUT' : 'POST';
        $employee_id = !empty($leave->employee_id) ? $leave->employee_id : '';
        $date = !empty($leave->date) ? $leave->date : '';
        $from_date = !empty($leave->from_date) ? $leave->from_date : '';
        $to_date = !empty($leave->to_date) ? $leave->to_date : '';
        $leave_type = !empty($leave->leave_type) ? $leave->leave_type : '';
        $total_days = !empty($leave->total_days) ? $leave->total_days : 0;
        $used_leave = !empty($usedleave) ? $usedleave : 0;
        $rest_leave = !empty($restLeave) ? $restLeave : 0;
        $address_during_leave = !empty($leave->address_during_leave) ? $leave->address_during_leave : '';
        $contact_during_leave = !empty($leave->contact_during_leave) ? $leave->contact_during_leave : '';
        $official_name = !empty($leave->official_name) ? $leave->official_name : '';
        $cause_of_leave = !empty($leave->cause_of_leave) ? $leave->cause_of_leave : '';
        $recommendation_name = !empty($leave->recommendation_name) ? $leave->recommendation_name : '';
    @endphp
    <div class="main-container">
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">


                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <form class="" action="{{ $form_url }}" method="POST">
                            <div class="table-container">
                                <div class="t-header">Leave Application
                                </div>
                                <br>


                                {{ method_field($form_method) }}
                                @csrf
                                <!--modal-body-->
                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Employee Name</div>
                                            <div class="input-group">
                                                <select name="employee_id" id="employee_id" class="form-control select2"
                                                    required="" onchange="checkLeave()">
                                                    <option value="">Select Employee</option>
                                                    @foreach ($emplyees as $employee)
                                                        <option value="{{ $employee->id }}"
                                                            @if ($employee_id == $employee->id) selected @endif>
                                                            {{ $employee->first_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Cause of Leave</div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Cause of Leave"
                                                    id="cause_of_leave" name="cause_of_leave" aria-label="Username"
                                                    aria-describedby="basic-addon1" value="{{ $cause_of_leave }}"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Recommendation Name</div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Recommendation name"
                                                    id="recommendation_name" name="recommendation_name"
                                                    aria-label="Username" aria-describedby="basic-addon1"
                                                    value="{{ $recommendation_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Application Date</div>
                                            <div class="input-group">
                                                <input type="date" class="form-control" placeholder="Application date"
                                                    id="date" name="date" aria-label="Username"
                                                    aria-describedby="basic-addon1" value="{{ $date }}"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Address during leave</div>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Address During Leave" id="address_during_leave"
                                                    name="address_during_leave" value="{{ $address_during_leave }}"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Contact During Leave</div>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Contact during leave" id="contact_during_leave"
                                                    name="contact_during_leave" value="{{ $contact_during_leave }}"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Leave From Date</div>
                                            <div class="input-group">
                                                <input type="date" class="form-control" placeholder="Leave Starting Date"
                                                    oninput="getTotalDays()" id="from_date" name="from_date"
                                                    value="{{ $from_date }}" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Joining Date</div>
                                            <div class="input-group">
                                                <input oninput="getTotalDays()" type="date" class="form-control"
                                                    placeholder="Joining Date" id="to_date" name="to_date"
                                                    aria-label="Username" aria-describedby="basic-addon1"
                                                    value="{{ $to_date }}" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Total Days</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="text" class="form-control" placeholder=""
                                                    id="total_day_in" aria-label="Username"
                                                    aria-describedby="basic-addon1" value="{{ $total_days }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Leave Type</div>
                                            <div class="input-group">
                                                <select name="leave_type" id="leave_type"
                                                    class="form-control select-height" required=""
                                                    onchange="checkLeave()">
                                                    <option>Select Leave</option>

                                                    <option value="pay_leave"
                                                        @if ($leave_type == 'pay_leave') selected @endif>
                                                        Pay Leave</option>
                                                    <option value="casual_leave"
                                                        @if ($leave_type == 'casual_leave') selected @endif>
                                                        Casual Leave</option>
                                                    <option value="emergency_leave"
                                                        @if ($leave_type == 'emergency_leave') selected @endif>
                                                        Emergency Leave</option>
                                                    <option value="sick_leave"
                                                        @if ($leave_type == 'sick_leave') selected @endif>
                                                        Sick Leave</option>
                                                    <option value="educational_leave"
                                                        @if ($leave_type == 'educational_leave') selected @endif>
                                                        Educational Leave</option>
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
                                                    id="total_leave" name="total_days" aria-label="Username"
                                                    aria-describedby="basic-addon1" value="{{ $total_days }}" readonly>
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
                                                    id="used_leave" name="used_leave" value="{{ $used_leave }}"
                                                    readonly>
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
                                                    id="rest_leave" name="rest_leave" value="{{ $rest_leave }}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Acting officials name during leave(if
                                                applicable)</div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="official name"
                                                    id="official_name" name="official_name"
                                                    value="{{ $official_name }}">
                                            </div>
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
