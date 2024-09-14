<?php

namespace Modules\Report\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Expense;
use Modules\Accounts\Entities\Invoice;
use Modules\Accounts\Entities\Leave;
use Modules\Accounts\Entities\Salary;
use Modules\Admin\Entities\Employee;
use Modules\Admin\Entities\ExpenseHead;
use Modules\Admin\Entities\ExpenseSubCategory;
use Modules\Admin\Entities\IncomeHead;
use Modules\Admin\Entities\IncomeSubCategory;
use Modules\Admin\Entities\Project;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('report::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('report::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('report::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('report::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function cashBookByIncomeAndExpenseHead()
    {
        // Set up the date range and project ID
        $year = !empty(request()->year) ? request()->year : Carbon::now()->year;
        $previous_from_date = Carbon::createFromFormat('Y', $year)->startOfYear()->toDateString();
        $previous_to_date = Carbon::createFromFormat('Y', $year)->subMonths(1)->endOfMonth()->subDays(1)->toDateString();
        $project_id = request('project_id');

        // Fetch the income and expense heads
        $income_heads = IncomeHead::all();
        $expense_heads = ExpenseHead::all();

        // Fetch the income and expenses within the date range
        $income = Invoice::where('invoice_date', '<', $previous_to_date)
            ->where('project_id', $project_id)
            ->where('status', 'Paid')
            ->get();

        $expense = Expense::whereBetween('date', [$previous_from_date, $previous_to_date])
            ->where('project_id', $project_id)
            ->get();

        // Calculate previous year's profit
        $previous_year_profit = $income->sum('sub_total') +
            $income->sum('delivery_charge') +
            $income->sum('service_charge') +
            $income->sum('collection_charge') +
            $income->sum('discount') +
            $income->sum('vat') -
            $expense->sum('amount');

        // Define the months and profit calculation period
        $months = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December'
        ];
        $profit_months = [
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May'
        ];
        $from_year = !empty(request()->year) ? request()->year + 1 : Carbon::now()->year + 1;
        $to_year = !empty(request()->year) ? request()->year : Carbon::now()->year;

        // Initialize the monthly totals
        $monthly_totals = [];

        // Calculate the profit for each month
        foreach ($profit_months as $key => $month) {
            $year = $key <= 5 ?  $from_year : $to_year;


            $monthly_invoices = $income->filter(function ($invoice) use ($year, $month) {
                $invoice_date = Carbon::parse($invoice->invoice_date);
                return $invoice_date->year == $year && $invoice_date->month == $month;
            });

            $monthly_expenses = $expense->filter(function ($expense) use ($year, $month) {
                $expense_date = Carbon::parse($expense->date);
                return $expense_date->year == $year && $expense_date->month == $month;
            });

            $invoice_total = $monthly_invoices->sum(function ($invoice) {
                return $invoice->sub_total + $invoice->delivery_charge + $invoice->service_charge +
                    $invoice->collection_charge + $invoice->vat - $invoice->discount;
            });

            $expense_total = $monthly_expenses->sum('amount');

            $monthly_totals[$month] =  [
                'invoice_total' => $invoice_total,
                'expense_total' => $expense_total,
                'profit' => $invoice_total - $expense_total,
                'month' => $month,
                'year' => $year,
                'month_number' => $key,
            ];
        }



        // dd($monthly_totals);

        // Fetch projects for the dropdown
        $projects = Project::select('id', 'name')->get();

        // Pass the data to the view
        return view('report::reports.cashbook_incomehead', compact(
            'income_heads',
            'expense_heads',
            'income',
            'expense',
            'months',
            'previous_year_profit',
            'projects',
            'profit_months',
            'to_year',
            'from_year',
            'monthly_totals',
            'project_id'
        ));
    }

    public function cashBookByIncomeAndExpenseSubCat()
    {
        // Set up the date range and project ID
        $year = !empty(request()->year) ? request()->year : Carbon::now()->year;
        $previous_from_date = Carbon::createFromFormat('Y', $year)->startOfYear()->toDateString();
        $previous_to_date = Carbon::createFromFormat('Y', $year)->subMonths(1)->endOfMonth()->subDays(1)->toDateString();
        $project_id = request('project_id');

        // Fetch the income and expense heads
        $income_sub_cats = IncomeSubCategory::all();
        $expense_sub_cats = ExpenseSubCategory::all();

        // Fetch the income and expenses within the date range
        $income = Invoice::where('invoice_date', '<', $previous_to_date)
            ->where('project_id', $project_id)
            ->where('status', 'Paid')
            ->get();

        $expense = Expense::whereBetween('date', [$previous_from_date, $previous_to_date])
            ->where('project_id', $project_id)
            ->get();

        // Calculate previous year's profit
        $previous_year_profit = $income->sum('sub_total') +
            $income->sum('delivery_charge') +
            $income->sum('service_charge') +
            $income->sum('collection_charge') +
            $income->sum('discount') +
            $income->sum('vat') -
            $expense->sum('amount');

        // Define the months and profit calculation period
        $months = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December'
        ];
        $profit_months = [
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May'
        ];
        $from_year = !empty(request()->year) ? request()->year + 1 : Carbon::now()->year + 1;
        $to_year = !empty(request()->year) ? request()->year : Carbon::now()->year;

        // Initialize the monthly totals
        $monthly_totals = [];

        // Calculate the profit for each month
        foreach ($profit_months as $key => $month) {
            $year = $key <= 5 ?  $from_year : $to_year;


            $monthly_invoices = $income->filter(function ($invoice) use ($year, $month) {
                $invoice_date = Carbon::parse($invoice->invoice_date);
                return $invoice_date->year == $year && $invoice_date->month == $month;
            });

            $monthly_expenses = $expense->filter(function ($expense) use ($year, $month) {
                $expense_date = Carbon::parse($expense->date);
                return $expense_date->year == $year && $expense_date->month == $month;
            });

            $invoice_total = $monthly_invoices->sum(function ($invoice) {
                return $invoice->sub_total + $invoice->delivery_charge + $invoice->service_charge +
                    $invoice->collection_charge + $invoice->vat - $invoice->discount;
            });

            $expense_total = $monthly_expenses->sum('amount');

            $monthly_totals[$month] =  [
                'invoice_total' => $invoice_total,
                'expense_total' => $expense_total,
                'profit' => $invoice_total - $expense_total,
                'month' => $month,
                'year' => $year,
                'month_number' => $key,
            ];
        }



        // dd($monthly_totals);

        // Fetch projects for the dropdown
        $projects = Project::select('id', 'name')->get();

        // Pass the data to the view
        return view('report::reports.cashbook_incomeSubCat', compact(
            'income_sub_cats',
            'expense_sub_cats',
            'income',
            'expense',
            'months',
            'previous_year_profit',
            'projects',
            'profit_months',
            'to_year',
            'from_year',
            'monthly_totals',
            'project_id'
        ));
    }

    public function salaryReport(Request $request)
    {
        $projects = Project::all();
        if ($request->isMethod('post')) {
            $request->validate([
                'project_id' => 'required|integer',
                'month' => 'required|integer',
                'year' => 'required|integer',
            ]);

            $salaries = Salary::when(!empty($request->project_id), function ($query) use ($request) {
                return $query->where('project_id', $request->project_id);
            })->when(!empty($request->month), function ($query) use ($request) {
                return $query->whereMonth('date', $request->month);
            })->when(!empty($request->year), function ($query) use ($request) {
                return $query->whereYear('date', $request->year);
            })->get();
        } else {
            $salaries = [];
        }

        $data = [
            'salaries' => $salaries,
            'project_id' => $request->project_id ?? null,
            'month' => $request->month ?? null,
            'month_name' => $request->month_name ?? null,
            'year' => $request->year ?? null,
            'projects' => $projects
        ];

        return view('report::reports.salary_report', $data);

        if ($request->has('list')) {
            return view('report::reports.salary_report', $data);
        } else {
            // Generate and return PDF
            $pdf = PDF::loadView('pdf.salary_pdf', $data, [], [
                'title' => 'Salary Report',
                'orientation' => 'L'
            ]);

            return $pdf->stream('Salary_report.pdf');
        }
    }

    public function leaveReport()
    {
        $employees = Employee::all(); // Retrieve all staff
        $year = request('year') ?? null;

        // Get the start and end dates for the current year
        $currentYearStart = Carbon::now()->startOfYear();
        $currentYearEnd = Carbon::now()->endOfYear();

        // If a specific year is selected, adjust the start and end dates
        if ($year) {
            $currentYearStart = Carbon::createFromDate($year)->startOfYear();
            $currentYearEnd = Carbon::createFromDate($year)->endOfYear();
        }

        // Gather all used leave data for the relevant period in one query
        $usedLeaves = Leave::whereBetween('from_date', [$currentYearStart, $currentYearEnd])
            ->where('status', 1)
            ->get()
            ->groupBy('staff_id');

        return view('report::reports.leave_report', compact('employees', 'usedLeaves', 'year'));
    }
}
