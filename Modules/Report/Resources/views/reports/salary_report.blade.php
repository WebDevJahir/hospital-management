@extends('master.master')
@section('title', 'Income Head - Hospice Bangladesh')
@section('main_content')
<style>
    .salary_table {
        border-collapse: collapse;
        height: calc(103vh - 140px);
        display: block;
        overflow: auto;
    }

    table {
        text-align: left;
        position: relative;
        display: block;
        /*width: 50em;*/
        /*max-width: 50%;*/
    }

    th,
    td {
        white-space: nowrap;
        padding: 10px !important;
        border: 1px solid #dddddd;
        font-size: 14px;
    }

    tr.sticky_row th {
        background: #d9fae2;
        color: black;
    }

    thead th {
        background: white;
        position: sticky;
        top: 0;
        /* Don't forget this, required for the stickiness */
        box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
    }

    tbody th {
        background: #aefbff !important;
        position: sticky;
        left: 0;
        /* Don't forget this, required for the stickiness */
        box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
        opacity: 1;
    }

    tfoot th {
        background: #ffe0f6;
        position: sticky;
        bottom: 0;
        /* Don't forget this, required for the stickiness */
        box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
    }

    #fixed_col {
        z-index: 9;
        left: 0;
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
                        <div class="t-header">Income Head</div>
                        <hr />
                        <div class="table-responsive">
                            <form action="" method="get">
                                <div class="modal-body">
                                    <div class="row gutters">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <div style="font-weight: bold">
                                                    Project
                                                </div>
                                                <div class="input-group">
                                                    <select name="project_id" class="form-control" required="">
                                                        @foreach($projects as $project)
                                                        <option value="{{ $project->id }}">
                                                            {{ $project->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="form-group">
                                                <div style="font-weight: bold">
                                                    Year
                                                </div>
                                                <div class="input-group">
                                                    <select class="form-control" name="year" required="">
                                                        @for($i = date('Y') - 5; $i <= date('Y') + 5; $i++) <option
                                                            value="{{ $i }}" @if($i==date('Y')) selected @endif>
                                                            {{ $i }}
                                                            </option>
                                                            @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- select month -->
                                        <div class="col-md-3 col-12">
                                            <div class="form-group ">
                                                <div style="font-weight: bold">
                                                    Month
                                                </div>
                                                <div class="input-group">
                                                    <select class="form-control" name="month" required="">
                                                        <option value="1" @if(date('m')==1) selected @endif>January
                                                        </option>
                                                        <option value="2" @if(date('m')==2) selected @endif>February
                                                        </option>
                                                        <option value="3" @if(date('m')==3) selected @endif>March
                                                        </option>
                                                        <option value="4" @if(date('m')==4) selected @endif>April
                                                        </option>
                                                        <option value="5" @if(date('m')==5) selected @endif>May</option>
                                                        <option value="6" @if(date('m')==6) selected @endif>June
                                                        </option>
                                                        <option value="7" @if(date('m')==7) selected @endif>July
                                                        </option>
                                                        <option value="8" @if(date('m')==8) selected @endif>August
                                                        </option>
                                                        <option value="9" @if(date('m')==9) selected @endif>September
                                                        </option>
                                                        <option value="10" @if(date('m')==10) selected @endif>October
                                                        </option>
                                                        <option value="11" @if(date('m')==11) selected @endif>November
                                                        </option>
                                                        <option value="12" @if(date('m')==12) selected @endif>December
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <button type="submit" class="btn btn-primary" style="
                                                    margin-top: 20px;
                                                    padding: 5px 10px;
                                                ">
                                                Get Reports
                                            </button>
                                        </div>
                                    </div>
                                </div>
 /                           </form>
                            @if(count($salaries) != 0)
                            <table id="kt_datatable_example_5"
                                class="table table-row-bordered gy-5 gs-7 border rounded salary_table">
                                <thead>
                                    <tr class="sticky_row">
                                        <th colspan="2" id="fixed_col">Employee Name</th>
                                        <th>Per Roster</th>
                                        <th>No. of Duty</th>
                                        <th>Roster Salary</th>
                                        <th>Per Food</th>
                                        <th>No. of Food</th>
                                        <th>Food</th>
                                        <th>Increment</th>
                                        <th>Extra Payment</th>
                                        <th>Per Night</th>
                                        <th>No. of Night</th>
                                        <th>Night</th>
                                        <th>Per Oncall (Onduty)</th>
                                        <th>No. of Oncall (Onduty)</th>
                                        <th>Oncall (Onduty)</th>
                                        <th>Per Oncall (Offduty)</th>
                                        <th>No. of Oncall (Offduty)</th>
                                        <th>Oncall (Offduty)</th>
                                        <th>Per Hour Salary</th>
                                        <th>No. of Hours</th>
                                        <th>Total Hour Salary</th>
                                        <th>Bonus</th>
                                        <th>Conveyance</th>
                                        <th>Provident Fund</th>
                                        <th>Absent</th>
                                        <th>Total Salary</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salaries as $salary)
                                    <tr>
                                        <th scope="row" colspan="2">{{$salary->staff->name}}</th>
                                        <td>{{$salary->roster_rate}}</td>
                                        <td>{{$salary->roster}}</td>
                                        <td>{{$salary->total_roster_amount}}</td>
                                        <td>{{$salary->food_rate}}</td>
                                        <td>{{$salary->food}}</td>
                                        <td>{{$salary->total_food_amount}}</td>
                                        <td>{{$salary->total_increment_amount}}</td>
                                        <td>{{$salary->total_extra_payment_amount}}</td>
                                        <td>{{$salary->night_rate}}</td>
                                        <td>{{$salary->night}}</td>
                                        <td>{{$salary->total_night_amount}}</td>
                                        <td>{{$salary->oncall_onduty_rate}}</td>
                                        <td>{{$salary->oncall_onduty}}</td>
                                        <td>{{$salary->total_oncall_onduty_amount}}</td>
                                        <td>{{$salary->oncall_offduty_rate}}</td>
                                        <td>{{$salary->oncall_offduty}}</td>
                                        <td>{{$salary->total_oncall_offduty_amount}}</td>
                                        <td>{{$salary->hours_rate}}</td>
                                        <td>{{$salary->total_hours}}</td>
                                        <td>{{$salary->total_hours_amount}}</td>
                                        <td>{{$salary->total_bonus_amount}}</td>
                                        <td>{{$salary->total_conveyance_amount}}</td>
                                        <td>{{$salary->total_provident_fund_amount}}</td>
                                        <td>{{$salary->total_deduction_amount}}</td>
                                        <td>{{$salary->total_salary}}</td>
                                        <td>

                                            @if(in_array(276, $permission))
                                            <span onclick="editSalaryView({{$salary->id}})" type="submit"><i
                                                    class="fas fa-edit text-success"></i></span>
                                            <span onclick="deleteSalaryview({{$salary->id}})" type="submit"><i
                                                    class="fas fa-trash-alt text-danger"></i></span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    <input type="hidden" name="month_name" id="month_name"
                                        value="{{$month_name ?? ''}}">
                                    <input type="hidden" name="year" id="year" value="{{$year ?? ''}}">
                                </tbody>

                                <tfoot style="text-align:center; background: #ffe0f6;">
                                    <tr class="sticky_row">
                                        <th id="fixed_col" colspan="2">Total</th>
                                        <th>-</th>
                                        <th>{{$salaries->sum('roster')}}</th>
                                        <th>{{$salaries->sum('total_roster_amount')}}</th>
                                        <th>-</th>
                                        <th>{{$salaries->sum('food')}}</th>
                                        <th>{{$salaries->sum('total_food_amount')}}</th>
                                        <th>{{$salaries->sum('total_increment_amount')}}</th>
                                        <th>{{$salaries->sum('total_extra_payment_amount')}}</th>
                                        <th>-</th>
                                        <th>{{$salaries->sum('night')}}</th>
                                        <th>{{$salaries->sum('total_night_amount')}}</th>
                                        <th>-</th>
                                        <th>{{$salaries->sum('oncall_onduty')}}</th>
                                        <th>{{$salaries->sum('total_oncall_onduty_amount')}}</th>
                                        <th>-</th>
                                        <th>{{$salaries->sum('oncall_offduty')}}</th>
                                        <th>{{$salaries->sum('total_oncall_offduty_amount')}}</th>
                                        <th>-</th>
                                        <th>{{$salaries->sum('total_hours')}}</th>
                                        <th>{{$salaries->sum('total_hours_amount')}}</th>
                                        <th>{{$salaries->sum('total_bonus_amount')}}</th>
                                        <th>{{$salaries->sum('total_conveyance_amount')}}</th>
                                        <th>{{$salaries->sum('total_provident_fund_amount')}}</th>
                                        <th>{{$salaries->sum('total_deduction_amount')}}</th>
                                        <th>{{$salaries->sum('total_salary')}}</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                            @else
                            <div class="alert alert-primary" role="alert">
                                No data found!
                            </div>  
                            @endif
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

</div>
@endsection