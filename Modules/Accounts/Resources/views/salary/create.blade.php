@extends('master.master')
@section('title', 'Investigation Category - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_heading = !empty($salary->id) ? 'Edit' : 'Create';
        $form_url = !empty($salary->id) ? route('salary.update', $salary->id) : route('salary.store');
        $form_method = !empty($salary->id) ? 'PUT' : 'POST';
        $employee_id = !empty($salary->id) ? $salary->employee_id : '';
        $month = !empty($salary->id) ? $salary->month : '';
        $year = !empty($salary->id) ? $salary->year : '';
        $monthly_rate = !empty($salary->id) ? $salary->monthly_rate : '';
        $monthly_salary = !empty($salary->id) ? $salary->monthly_salary : '';
        $total_month_amount = !empty($salary->id) ? $salary->total_month_amount : '';
        $hours_rate = !empty($salary->id) ? $salary->hours_rate : '';
        $total_hours = !empty($salary->id) ? $salary->total_hours : '';
        $total_hours_amount = !empty($salary->id) ? $salary->total_hours_amount : '';
        $food_rate = !empty($salary->id) ? $salary->food_rate : '';
        $food = !empty($salary->id) ? $salary->food : '';
        $total_food_amount = !empty($salary->id) ? $salary->total_food_amount : '';
        $oncall_duty_rate = !empty($salary->id) ? $salary->oncall_duty_rate : '';
        $oncall_onduty = !empty($salary->id) ? $salary->oncall_onduty : '';
        $total_oncall_onduty_amount = !empty($salary->id) ? $salary->total_oncall_onduty_amount : '';
        $oncall_offduty_rate = !empty($salary->id) ? $salary->oncall_offduty_rate : '';
        $oncall_offduty = !empty($salary->id) ? $salary->oncall_offduty : '';
        $total_oncall_offduty_amount = !empty($salary->id) ? $salary->total_oncall_offduty_amount : '';
        $conveyance_rate = !empty($salary->id) ? $salary->conveyance_rate : '';
        $conveyance = !empty($salary->id) ? $salary->conveyance : '';
        $total_conveyance_amount = !empty($salary->id) ? $salary->total_conveyance_amount : '';
        $increment_rate = !empty($salary->id) ? $salary->increment_rate : '';
        $increment = !empty($salary->id) ? $salary->increment : '';
        $total_increment_amount = !empty($salary->id) ? $salary->total_increment_amount : '';
        $extra_payment_rate = !empty($salary->id) ? $salary->extra_payment_rate : '';
        $extra_payment = !empty($salary->id) ? $salary->extra_payment : '';
        $total_extra_payment_amount = !empty($salary->id) ? $salary->total_extra_payment_amount : '';
        $bonus_rate = !empty($salary->id) ? $salary->bonus_rate : '';
        $bonus = !empty($salary->id) ? $salary->bonus : '';
        $total_bonus_amount = !empty($salary->id) ? $salary->total_bonus_amount : '';
        $provident_fund_rate = !empty($salary->id) ? $salary->provident_fund_rate : '';
        $provident_fund = !empty($salary->id) ? $salary->provident_fund : '';
        $total_provident_fund_amount = !empty($salary->id) ? $salary->total_provident_fund_amount : '';
        $pay_leave_rate = !empty($salary->id) ? $salary->pay_leave_rate : '';
        $pay_leave = !empty($salary->id) ? $salary->pay_leave : '';
        $total_pay_leave_amount = !empty($salary->id) ? $salary->total_pay_leave_amount : '';
        $sick_leave_rate = !empty($salary->id) ? $salary->sick_leave_rate : '';
        $sick_leave = !empty($salary->id) ? $salary->sick_leave : '';
        $total_sick_leave_amount = !empty($salary->id) ? $salary->total_sick_leave_amount : '';
        $casual_leave_rate = !empty($salary->id) ? $salary->casual_leave_rate : '';
        $casual_leave = !empty($salary->id) ? $salary->casual_leave : '';
        $total_casual_leave_amount = !empty($salary->id) ? $salary->total_casual_leave_amount : '';
        $educational_leave_rate = !empty($salary->id) ? $salary->educational_leave_rate : '';
        $educational_leave = !empty($salary->id) ? $salary->educational_leave : '';
        $total_educational_leave_amount = !empty($salary->id) ? $salary->total_educational_leave_amount : '';
        $emergency_leave_rate = !empty($salary->id) ? $salary->emergency_leave_rate : '';
        $emergency_leave = !empty($salary->id) ? $salary->emergency_leave : '';
        $total_emergency_leave_amount = !empty($salary->id) ? $salary->total_emergency_leave_amount : '';
        $roster_rate = !empty($salary->id) ? $salary->roster_rate : '';
        $roster = !empty($salary->id) ? $salary->roster : '';
        $total_roster_amount = !empty($salary->id) ? $salary->total_roster_amount : '';
        $night_rate = !empty($salary->id) ? $salary->night_rate : '';
        $night = !empty($salary->id) ? $salary->night : '';
        $total_night_amount = !empty($salary->id) ? $salary->total_night_amount : '';
        $deduction_rate = !empty($salary->id) ? $salary->deduction_rate : '';
        $deduction = !empty($salary->id) ? $salary->deduction : '';
        $total_deduction_amount = !empty($salary->id) ? $salary->total_deduction_amount : '';
        $total_salary = !empty($salary->id) ? $salary->total_salary : '';
    @endphp
    <div class="main-container">
        <div class="content-wrapper">
            <div class="fixedBodyScroll">
                <div class="table-container">
                    <div class="t-header">Add Salary</div>
                    <form class="" action="{{ $form_url }}" method="POST">
                        {{ method_field($form_method) }}
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Employee Name</div>
                                    <div class="input-group">
                                        <select name="employee_id" class="form-control select2" id="employee_id"
                                            onchange="get_employee(this)">
                                            <option value="">Select Employee</option>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->first_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Month</div>
                                    <div class="input-group">
                                        <select class="form-control select2" name="month" id="month"
                                            onchange="get_employee(this)">
                                            <option value="">Select Month</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">Aguest</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Year</div>
                                    <div class="input-group">
                                        <select class="form-control select2" name="year" id="year"
                                            onchange="get_employee(this)">
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                            <option value="2032">2032</option>
                                            <option value="2033">2033</option>
                                            <option value="2034">2034</option>
                                            <option value="2035">2035</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Monthly Salary</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control col-4" placeholder="Monthly Rate"
                                            id="monthly_rate" name="monthly_rate" aria-label="Username"
                                            aria-describedby="basic-addon1" readonly value="{{ $monthly_rate }}">
                                        <input type="number" class="form-control col-4" placeholder="Count"
                                            id="total_month" name="monthly_salary" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $monthly_salary }}">
                                        <input type="number" class="form-control col-4" placeholder="Total"
                                            id="total_month_amount" name="total_month_amount" aria-label="Username"
                                            value="0" aria-describedby="basic-addon1" readonly
                                            value="{{ $total_month_amount }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Total Hours</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control col-4" placeholder="Hours Rate"
                                            id="hours_rate" name="hours_rate" aria-label="Username"
                                            aria-describedby="basic-addon1" disabled="" readonly
                                            value="{{ $hours_rate }}">
                                        <input type="number" class="form-control col-4" placeholder="Hours"
                                            id="total_hours" name="total_hours" step="0.1" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $total_hours }}">
                                        <input type="number" class="form-control col-4" placeholder="Total"
                                            id="total_hours_amount" name="total_hours_amount" aria-label="Username"
                                            value="0" aria-describedby="basic-addon1" readonly
                                            value="{{ $total_hours_amount }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Food</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control col-4" placeholder="Food Rate"
                                            id="food_rate" name="food_rate" aria-label="Username"
                                            aria-describedby="basic-addon1" value="" readonly
                                            value="{{ $food_rate }}">
                                        <input type="number" class="form-control col-4" placeholder="Food Count"
                                            id="food" name="food" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $food }}">
                                        <input type="number" class="form-control col-4" placeholder="Total"
                                            id="total_food_amount" name="total_food_amount" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $total_food_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Oncall(Onduty)</div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Oncall onduty Rate"
                                            id="oncall_onduty_rate" name="oncall_duty_rate" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $oncall_duty_rate }}" readonly>
                                        <input type="text" class="form-control" placeholder="Oncall onduty count"
                                            id="oncall_onduty" name="oncall_onduty" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $oncall_onduty }}">
                                        <input type="text" class="form-control" placeholder="Total"
                                            id="total_oncall_onduty_amount" name="total_oncall_onduty_amount"
                                            aria-label="Username" aria-describedby="basic-addon1" value="{{ $total_oncall_onduty_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Oncall(Offduty)</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Oncall Offduty Rate"
                                            id="oncall_offduty_rate" name="oncall_offduty_rate" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $oncall_offduty_rate }}" readonly>
                                        <input type="number" class="form-control" placeholder="Oncall Offduty count"
                                            id="oncall_offduty" name="oncall_offduty" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $oncall_offduty }}">
                                        <input type="number" class="form-control" placeholder="Total"
                                            id="total_oncall_offduty_amount" name="total_oncall_offduty_amount"
                                            aria-label="Username" aria-describedby="basic-addon1" value="{{ $total_oncall_offduty_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Conveyance</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Conveyance Rate"
                                            id="conveyance_rate" name="conveyance_rate" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $conveyance_rate }}" readonly>
                                        <input type="number" class="form-control" placeholder="Conveyance count"
                                            id="conveyance" name="conveyance" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $conveyance }}">
                                        <input type="number" class="form-control" placeholder="Total"
                                            id="total_conveyance_amount" name="total_conveyance_amount"
                                            aria-label="Username" aria-describedby="basic-addon1" value="{{ $total_conveyance_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Increment</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Increment Rate"
                                            id="increment_rate" aria-label="Username" aria-describedby="basic-addon1"
                                            value="{{ $increment_rate }}" readonly>
                                        <input type="number" class="form-control" placeholder="Increment"
                                            id="increment" name="increment" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $increment }}">
                                        <input type="number" class="form-control" placeholder="Increment"
                                            id="total_increment_amount" name="total_increment_amount"
                                            aria-label="Username" aria-describedby="basic-addon1" value="{{ $total_increment_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Extra Payment</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Extra Payment amount"
                                            id="extra_payment_rate" aria-label="Username" aria-describedby="basic-addon1"
                                            value="{{ $extra_payment_rate }}" readonly>
                                        <input type="number" class="form-control" placeholder="Extra Payment"
                                            id="extra_payment" name="extra_payment" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $extra_payment }}">
                                        <input type="number" class="form-control" placeholder="Total"
                                            id="total_extra_payment_amount" name="total_extra_payment_amount"
                                            aria-label="Username" aria-describedby="basic-addon1" value="{{ $total_extra_payment_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Bonus</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Bonus Amount"
                                            id="bonus_rate" aria-label="Username" aria-describedby="basic-addon1"
                                            value="{{ $bonus_rate }}" readonly>
                                        <input type="number" class="form-control" placeholder="Bonus" id="bonus"
                                            name="bonus" aria-label="Username" aria-describedby="basic-addon1"
                                            value="{{ $bonus }}">
                                        <input type="number" class="form-control" placeholder="Total"
                                            id="total_bonus_amount" name="total_bonus_amount" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $total_bonus_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Provident fund</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Provident Fund Amount"
                                            id="provident_fund_rate" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $provident_fund_rate }}" readonly>
                                        <input type="number" class="form-control" placeholder="Provident Fund"
                                            id="provident_fund" name="provident_fund" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $provident_fund }}">
                                        <input type="number" class="form-control" placeholder="Total"
                                            id="total_provident_fund_amount" name="total_provident_fund_amount"
                                            aria-label="Username" aria-describedby="basic-addon1" value="{{ $total_provident_fund_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Pay Leave</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Pay Leave"
                                            id="pay_leave_rate" name="pay_leave_rate" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $pay_leave_rate }}" readonly>
                                        <input type="number" class="form-control" placeholder="Used Pay Leave"
                                            id="pay_leave" name="pay_leave" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $pay_leave }}">
                                        <input type="number" class="form-control" placeholder="Monthly Deducation"
                                            id="total_pay_leave_amount" name="total_pay_leave_amount"
                                            aria-label="Username" aria-describedby="basic-addon1" value="{{ $total_pay_leave_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Sick Leave</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Sick Leave"
                                            id="sick_leave_rate" name="sick_leave_rate" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $sick_leave_rate }}" readonly>
                                        <input type="number" class="form-control" placeholder="Used Sick Leave "
                                            id="sick_leave" name="sick_leave" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $sick_leave }}">
                                        <input type="number" class="form-control" placeholder="Monthly Deducation"
                                            id="total_sick_leave_amount" name="total_sick_leave_amount"
                                            aria-label="Username" aria-describedby="basic-addon1" value="{{ $total_sick_leave_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Casual Leave</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Casual Leave"
                                            id="casual_leave_rate" name="casual_leave_rate" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $casual_leave_rate }}" readonly>
                                        <input type="number" class="form-control" placeholder="Used Casual Leave"
                                            id="casual_leave" name="casual_leave" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $casual_leave }}">
                                        <input type="number" class="form-control" placeholder="Monthly Deducation"
                                            id="total_casual_leave_amount" name="total_casual_leave_amount"
                                            aria-label="Username" aria-describedby="basic-addon1" value="{{ $total_casual_leave_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Special Leave</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Special Leave"
                                            id="educational_leave_rate" name="educational_leave_rate"
                                            aria-label="Username" aria-describedby="basic-addon1" value="{{$educational_leave_rate}}" readonly>
                                        <input type="number" class="form-control" placeholder="Used Special Leave"
                                            id="educational_leave" name="educational_leave" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $educational_leave }}">
                                        <input type="number" class="form-control" placeholder="Monthly Deducation"
                                            id="total_educational_leave_amount" name="total_educational_leave_amount"
                                            aria-label="Username" aria-describedby="basic-addon1" value="{{ $total_educational_leave_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Emergency Leave</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Emergency Leave"
                                            id="emergency_leave_rate" name="emergency_leave_rate" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $emergency_leave_rate }}" readonly>
                                        <input type="number" class="form-control" placeholder="Used Emergency Leave"
                                            id="emergency_leave" name="emergency_leave" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $emergency_leave }}">
                                        <input type="number" class="form-control" placeholder="Monthly Deducation"
                                            id="total_emergency_leave_amount" name="total_emergency_leave_amount"
                                            aria-label="Username" aria-describedby="basic-addon1" value="{{ $total_emergency_leave_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Roster</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Roster rate"
                                            id="roster_rate" name="roster_rate" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $roster_rate }}" readonly>
                                        <input type="number" class="form-control" placeholder="Roster count"
                                            id="roster" name="roster_night" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $roster }}">
                                        <input type="number" class="form-control" placeholder="Total"
                                            id="total_roster_amount" name="total_roster_amount" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $total_roster_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Night</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Night rate"
                                            id="night_rate" name="night_rate" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $night_rate }}" readonly>
                                        <input type="number" class="form-control" placeholder="Night count"
                                            id="night" name="night" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $night }}">
                                        <input type="number" class="form-control" placeholder="Total"
                                            id="total_night_amount" name="total_night_amount" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $total_night_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Deduction</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Deduction rate"
                                            id="deduction_rate" name="deduction_rate" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $deduction_rate }}" readonly>
                                        <input type="number" class="form-control" placeholder="Deduction Count"
                                            id="deduction" name="deduction" aria-label="Username"
                                            aria-describedby="basic-addon1" value="{{ $deduction }}">
                                        <input type="number" class="form-control" placeholder="Total"
                                            id="total_deduction_amount" name="total_deduction_amount"
                                            aria-label="Username" aria-describedby="basic-addon1" value="{{ $total_deduction_amount }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Total Salary</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" readonly placeholder="Total Salary"
                                            onclick="add_total_salary()" id="total_salary" name="total_salary"
                                            aria-label="Username" aria-describedby="basic-addon1" value="{{ $total_salary }}" readonly>
                                        <button type="button" class="btn btn-sm btn-primary"
                                            onclick="add_total_salary()">Sum</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="addProject">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    @include('accounts::salary.js.salary-js')
@endsection
