@extends('master.master')
@section('title', 'Income Head - Hospice Bangladesh')
@section('main_content')
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
                                        <div class="col-md-5 col-12">
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
                                        <div class="col-md-5 col-12">
                                            <div class="form-group">
                                                <div style="font-weight: bold">
                                                    Year
                                                </div>
                                                <div class="input-group">
                                                    <select class="form-control" name="year" required="">
                                                        @for($i = date('Y') - 5; $i <= date('Y') + 5; $i++)
                                                        <option value="{{ $i }}" @if($i == date('Y')) selected @endif>
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
                            <table class="table table-border table-stripedx" id="bascExample">
                                <thead>
                                    <tr >
                                        <th style="background: #bad5ff80;">Income Head</th>
                                        <th style="background: #bad5ff80;">Previous Profit (BDT)</th>
                                        @foreach($monthly_totals as $month)
                                        <th style="background: #bad5ff80;">{{ $month['month'] .' '. $month['year'] }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="background: #78f4d680;">Cash on hand (beginning of month)</td>
                                        <td style="background: #78f4d680;">{{$previous_year_profit}}</td>
                                        @foreach($monthly_totals as $monthly_profit)
                                        <td style="background: #78f4d680;">{{ $monthly_profit['profit'] }}</td>
                                        @endforeach
                                    </tr>
                                    @foreach($income_sub_cats as $income_head)
                                    <tr>
                                        <td>{{ $income_head->name }}</td>
                                        <td>{{ $income_head->previous_year_profit }}</td>
                                        @foreach($monthly_totals as $monthly_profit)
                                        <td>
                                            {{ $income_head->invoiceLines->where('project_id',
                                            $project_id)->where('income_head_id', $income_head->id)->where('month',
                                            $monthly_profit['month'])->where('year',
                                            $monthly_profit['year'])->sum('amount') }}
                                        </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td style="background: #b0f5ff8c;">Sub Total</td>
                                        <td style="background: #b0f5ff8c;"></td>
                                        @foreach($monthly_totals as $key => $monthly_profit)
                                        <?php 
                                            $invoices = Modules\Accounts\Entities\Invoice::where('project_id', $project_id)->whereMonth('invoice_date', $monthly_profit['month_number'])->whereYear('invoice_date', $monthly_profit['year'])->get();
                                        ?>
                                        <td style="background: #b0f5ff8c;">
                                            {{ $invoices->sum('sub_total') }}
                                        </td>
                                        @endforeach

                                    </tr>
                                    <tr>
                                        <td style="background: #c1ddf694;">Delivery Charge</td>
                                        <td style="background: #c1ddf694;"></td>
                                        @foreach($monthly_totals as $key => $monthly_profit)
                                        <?php 
                                            $invoices = Modules\Accounts\Entities\Invoice::where('project_id', $project_id)->whereMonth('invoice_date', $monthly_profit['month_number'])->whereYear('invoice_date', $monthly_profit['year'])->get();
                                        ?>
                                        <td style="background: #c1ddf694;">
                                            {{ $invoices->sum('delivery_charge') }}
                                        </td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td style="background: #b0f5ff8c;">Service Charge</td>
                                        <td style="background: #b0f5ff8c;"></td>
                                        @foreach($monthly_totals as $key => $monthly_profit)
                                        <?php 
                                            $invoices = Modules\Accounts\Entities\Invoice::where('project_id', $project_id)->whereMonth('invoice_date', $monthly_profit['month_number'])->whereYear('invoice_date', $monthly_profit['year'])->get();
                                        ?>
                                        <td style="background: #b0f5ff8c;">
                                            {{ $invoices->sum('service_charge') }}
                                        </td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td style="background: #c1ddf694;">Collection Charge</td>
                                        <td style="background: #c1ddf694;"></td>
                                        @foreach($monthly_totals as $key => $monthly_profit)
                                        <?php 
                                            $invoices = Modules\Accounts\Entities\Invoice::where('project_id', $project_id)->whereMonth('invoice_date', $monthly_profit['month_number'])->whereYear('invoice_date', $monthly_profit['year'])->get();
                                        ?>
                                        <td style="background: #c1ddf694;">
                                            {{ $invoices->sum('collection_charge') }}
                                        </td>
                                        @endforeach
                                    </tr>
                                    <!-- Discount -->
                                    <tr>
                                        <td style="background: #b0f5ff8c;">Discount</td>
                                        <td style="background: #b0f5ff8c;"></td>
                                        @foreach($monthly_totals as $key => $monthly_profit)
                                        <?php 
                                            $invoices = Modules\Accounts\Entities\Invoice::where('project_id', $project_id)->whereMonth('invoice_date', $monthly_profit['month_number'])->whereYear('invoice_date', $monthly_profit['year'])->get();
                                        ?>
                                        <td style="background: #b0f5ff8c;">
                                            {{ $invoices->sum('discount') }}
                                        </td>
                                        @endforeach
                                    </tr>
                                    <!-- Vat -->
                                    <tr>
                                        <td style="background: #c1ddf694;">Vat</td>
                                        <td style="background: #c1ddf694;"></td>
                                        @foreach($monthly_totals as $key => $monthly_profit)
                                        <?php 
                                            $invoices = Modules\Accounts\Entities\Invoice::where('project_id', $project_id)->whereMonth('invoice_date', $monthly_profit['month_number'])->whereYear('invoice_date', $monthly_profit['year'])->get();
                                        ?>
                                        <td style="background: #c1ddf694;">
                                            {{ $invoices->sum('vat') }}
                                        </td>
                                        @endforeach
                                    </tr>
                                    <!-- Grand Total -->
                                    <tr>
                                        <td style="background: #dcffdf;">Grand Total</td>
                                        <td style="background: #dcffdf"></td>
                                        @foreach($monthly_totals as $key => $monthly_profit)
                                        <?php 
                                            $invoices = Modules\Accounts\Entities\Invoice::where('project_id', $project_id)->whereMonth('invoice_date', $monthly_profit['month_number'])->whereYear('invoice_date', $monthly_profit['year'])->get();
                                        ?>
                                        <td style="background: #dcffdf;">
                                            {{ $invoices->sum('sub_total') + $invoices->sum('delivery_charge') + $invoices->sum('service_charge') + $invoices->sum('collection_charge') - $invoices->sum('discount') + $invoices->sum('vat') }}
                                        </td>
                                        @endforeach
                                    </tr>
                                    @foreach($expense_sub_cats as $expense_head)
                                    <tr>
                                        <td>{{ $expense_head->name }}</td>
                                        <td></td>
                                        @foreach($monthly_totals as $monthly_profit)
                                        <td>
                                            {{ $expense_head->expenseLines->where('project_id',
                                            $project_id)?->where('expense_head_id', $expense_head->id)->where('month', $monthly_profit['month'])->where('year', $monthly_profit['year'])->sum('amount') }}
                                        </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>Total Expense</td>
                                        <td></td>
                                        @foreach($monthly_totals as $monthly_profit)
                                        <?php
                                            $conveyance = Modules\Accounts\Entities\Expense::where('project_id', $project_id)->whereMonth('date', $monthly_profit['month_number'])->whereYear('date', $monthly_profit['year'])->where('status', 'paid')->get();
                                        ?>
                                        <td>
                                            {{ $conveyance->sum('amount') }}
                                        </td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>Profit</td>
                                        <td></td>
                                        @foreach($monthly_totals as $monthly_profit)
                                        <?php
                                            $invoices = Modules\Accounts\Entities\Invoice::where('project_id', $project_id)->whereMonth('invoice_date', $monthly_profit['month_number'])->whereYear('invoice_date', $monthly_profit['year'])->get();
                                            $conveyance = Modules\Accounts\Entities\Expense::where('project_id', $project_id)->whereMonth('date', $monthly_profit['month_number'])->whereYear('date', $monthly_profit['year'])->where('status', 'paid')->get();
                                        ?>
                                        <td>
                                            {{ $invoices->sum('sub_total') + $invoices->sum('delivery_charge') + $invoices->sum('service_charge') + $invoices->sum('collection_charge') - $invoices->sum('discount') + $invoices->sum('vat') - $conveyance->sum('amount') }}
                                        </td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>Cash in Hand</td>
                                        <td></td>
                                        @php
                                            $cash_in_hand = $previous_year_profit;
                                        @endphp
                                        @foreach($monthly_totals as $monthly_profit)
                                         
                                        <?php
                                            $invoices = Modules\Accounts\Entities\Invoice::where('project_id', $project_id)->whereMonth('invoice_date', $monthly_profit['month_number'])->whereYear('invoice_date', $monthly_profit['year'])->get();
                                            $conveyance = Modules\Accounts\Entities\Expense::where('project_id', $project_id)->whereMonth('date', $monthly_profit['month_number'])->whereYear('date', $monthly_profit['year'])->where('status', 'paid')->get();
                                            $cash_in_hand += $invoices->sum('sub_total') + $invoices->sum('delivery_charge') + $invoices->sum('service_charge') + $invoices->sum('collection_charge') - $invoices->sum('discount') + $invoices->sum('vat') - $conveyance->sum('amount');
                                        ?>
                                        <td>
                                            {{ $cash_in_hand }}
                                        </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
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