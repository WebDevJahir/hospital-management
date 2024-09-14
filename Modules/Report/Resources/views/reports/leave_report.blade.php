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
                        <div class="t-header">Leave Report</div>
                        <hr />
                        <div class="table-responsive">
                            <form action="" method="get">
                                <div class="modal-body">
                                    <div class="row gutters">
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
                            </form>
                            @if(count($usedLeaves) != 0)
                            <div class="table-responsive">
                                <table id="salary_table">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="text-center">Employee Name</th>
                                            @php
                                            $leaveTypes = [
                                                ['name' => 'Casual Leave', 'color' => '#58ffd15c', 'type' => 'casual_leave'],
                                                ['name' => 'Emergency Leave', 'color' => '#fbbaff87', 'type' => 'emergency_leave'],
                                                ['name' => 'Sick Leave', 'color' => '#58ffd15c', 'type' => 'sick_leave'],
                                                ['name' => 'Pay Leave', 'color' => '#fbbaff87', 'type' => 'pay_leave'],
                                                ['name' => 'Special Leave', 'color' => '#58ffd15c', 'type' => 'educational_leave']
                                            ];
                                            @endphp
                                            @foreach($leaveTypes as $leave)
                                                <th colspan="3" class="text-center" style="background: {{ $leave['color'] }}">{{ $leave['name'] }}</th>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th colspan="3"></th>
                                            @foreach($leaveTypes as $leave)
                                                <th class="text-center" style="background: {{ $leave['color'] }}">Total</th>
                                                <th class="text-center" style="background: {{ $leave['color'] }}">Used</th>
                                                <th class="text-center" style="background: {{ $leave['color'] }}">Rest</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            @php
                                            $usedLeave = $usedLeaves->get($employee->id, collect()); 
                                            @endphp
                                            <tr>
                                                <th colspan="3">{{ $employee->first_name . ' ' . $employee->last_name ?? '' }}</th>
                                                @foreach($leaveTypes as $leave)
                                                    @php
                                                    $usedLeaveType = $usedLeave->where('leave_type', $leave['type'])->sum('total_days');
                                                    $totalLeaveType = $employee->{$leave['type']};
                                                    @endphp
                                                    <td style="background: {{ $leave['color'] }}">{{ $totalLeaveType }}</td>
                                                    <td style="background: {{ $leave['color'] }}">{{ $usedLeaveType }}</td>
                                                    <td style="background: {{ $leave['color'] }}">{{ $totalLeaveType - $usedLeaveType }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
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