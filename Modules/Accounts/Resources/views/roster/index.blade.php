@extends('master.master')
@section('title', 'Income Head - Hospice Bangladesh')
@section('main_content')
    @parent

    <div class="main-container">
        <!-- Page header start -->
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">
                <!-- Row start -->
                <div class="row gutters">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-container">
                            <div class="t-header">Roster Report</div>

                            <div>
                                <form action="{{ route('get-roster-report') }}" method="get" id="form">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div style="font-weight: bold;">Employee Name</div>
                                                <div class="input-group">
                                                    <select name="employee_id" class="form-control select2">
                                                        <option value="all">All</option>
                                                        @foreach ($all_employee as $employee)
                                                            <option value="{{ $employee->id }}">{{ $employee->first_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div style="font-weight: bold;">Month</div>
                                                <div class="input-group">
                                                    <select class="form-control select2" name="month">
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
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div style="font-weight: bold;">Year</div>
                                                <div class="input-group">
                                                    <select class="form-control select2" name="year">
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
                                        <div class="col-2">
                                            <button class="btn btn-success" style="margin-top: 20px;">Get Report</button>
                                        </div>
                                    </div>
                                </form>

                                @if ($employee_id == 'all')
                                    <div class="table-container">
                                        <div class="t-header">Duty List
                                        </div>
                                        <div><br>
                                            <h4 class="text-center">Duty Report</h4>
                                            <br>
                                            <p class="text-center" style="font-weight: bold;font-size: 15px;">Month:
                                                @if ($month)
                                                    {{ Carbon\Carbon::createFromDate($year, $month, 1)->format('F') }}
                                                @endif | Year:
                                                @if ($year)
                                                    {{ $year }}
                                                @endif
                                        </div>
                                        <div class="table-responsive">
                                            <table id="dutyTable" class="table custom-table">
                                                <thead>
                                                    <tr>
                                                        <th>Employee Name</th>
                                                        <th>Morning</th>
                                                        <th>Evening</th>
                                                        <th>Night</th>
                                                        <th>Visit</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="MedicalProcedureTable">
                                                    @foreach ($employees as $employee)
                                                        <tr>
                                                            <td>{{ $employee->first_name ?? '' }}</td>
                                                            <td>{{ $employee->morning_roster_count ?? '' }}</td>
                                                            <td>{{ $employee->evening_roster_count ?? '' }}</td>
                                                            <td>{{ $employee->night_roster_count ?? '' }}</td>
                                                            <td>{{ $employee->visit_roster_count ?? '' }}</td>
                                                            <td>{{ $employee->night_roster_count + $employee->morning_roster_count + $employee->evening_roster_count + $employee->visit_roster_count }}
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div class="table-container">
                                        <div class="t-header">Duty List
                                        </div>
                                        <div><br>
                                            <h4 class="text-center">Duty Report</h4>
                                            <br>
                                            <p class="text-center" style="font-weight: bold;font-size: 15px;">Month:
                                                @if ($month)
                                                    {{ Carbon\Carbon::createFromDate($year, $month, 1)->format('F') }}
                                                @endif | Year:
                                                @if ($year)
                                                    {{ $year }}
                                                @endif
                                        </div>
                                        <div class="table-responsive">
                                            <table id="dutyTable" class="table custom-table">
                                                <thead>
                                                    <tr>
                                                        <th>Employee Name</th>
                                                        <th>Morning</th>
                                                        <th>Evening</th>
                                                        <th>Night</th>
                                                        <th>Visit</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="MedicalProcedureTable">
                                                    <td>{{ $employee->first_name ?? '' }}</td>
                                                    <td>{{ $employee->morning_roster_count ?? '' }}</td>
                                                    <td>{{ $employee->evening_roster_count ?? '' }}</td>
                                                    <td>{{ $employee->night_roster_count ?? '' }}</td>
                                                    <td>{{ $employee->visit_roster_count ?? '' }}</td>
                                                    <td>{{ $employee->night_roster_count + $employee->morning_roster_count + $employee->evening_roster_count + $employee->visit_roster_count }}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
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
    <div id="modal"></div>
@endsection


@section('script')

@endsection
