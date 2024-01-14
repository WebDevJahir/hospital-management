<?php

namespace Modules\Accounts\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Accounts\Entities\Expense;
use Modules\Accounts\Entities\ExpenseLine;
use Modules\Admin\Entities\Employee;
use Modules\Admin\Entities\ExpenseHead;
use Modules\Admin\Entities\ExpenseSubCategory;
use Modules\Admin\Entities\Project;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $expenses = Expense::with('project', 'expenseLines')->latest()->get();
        return view('accounts::expense.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $projects = Project::all();
        $employees = Employee::all();
        return view('accounts::expense.create', compact('projects', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
            $data['invoice_no'] = 'EXINV-' . date('Ymd') . '-' . rand(100, 999);
            $data['created_by'] = auth()->user()->id;
            $data['payment_status'] = 'Due'; // ['Due', 'Partial', 'Paid
            $expense = Expense::create($data);
            if ($expense) {
                foreach ($request->expense_head_id as $key => $value) {
                    $expenseLine = new ExpenseLine();
                    $expenseLine->expense_id = $expense->id;
                    $expenseLine->date = $request->date;
                    $expenseLine->expense_head_id = $request->expense_head_id[$key];
                    $expenseLine->expense_sub_category_id = $request->expense_sub_category_id[$key];
                    $expenseLine->from_address = $request->from_address[$key] ?? '';
                    $expenseLine->to_address = $request->to_address[$key] ?? '';
                    $expenseLine->used_transport = $request->used_transport[$key] ?? '';
                    $expenseLine->description = $request->description[$key] ?? '';
                    $expenseLine->amount = $request->amount[$key] ?? 0;
                    $expenseLine->status = 'Due'; // 'approved', 'pending', 'rejected
                    $expenseLine->save();
                }
            }
            DB::commit();
            return redirect()->route('expense.index')->with('success', 'Expense created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('accounts::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $expense = Expense::find($id);
        $projects = Project::all();
        $employees = Employee::all();
        $expense_heads = ExpenseHead::where('project_id', $expense->project_id)->get();
        $expense_sub_categories = ExpenseSubCategory::whereIn('expense_head_id', $expense_heads->pluck('id'))->get();
        return view('accounts::expense.create', compact('expense', 'projects', 'employees', 'expense_heads', 'expense_sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
            $data['payment_status'] = 'Due'; // ['Due', 'Partial', 'Paid
            $expense = Expense::find($id);
            $expense->update($data);
            if ($expense) {
                $expense->expenseLines()->delete();
                foreach ($request->expense_head_id as $key => $value) {
                    $expenseLine = new ExpenseLine();
                    $expenseLine->expense_id = $expense->id;
                    $expenseLine->date = $request->date;
                    $expenseLine->expense_head_id = $request->expense_head_id[$key];
                    $expenseLine->expense_sub_category_id = $request->expense_sub_category_id[$key];
                    $expenseLine->from_address = $request->from_address[$key] ?? '';
                    $expenseLine->to_address = $request->to_address[$key] ?? '';
                    $expenseLine->used_transport = $request->used_transport[$key] ?? '';
                    $expenseLine->description = $request->description[$key] ?? '';
                    $expenseLine->amount = $request->amount[$key] ?? 0;
                    $expenseLine->status = 'Due'; // 'approved', 'pending', 'rejected
                    $expenseLine->save();
                }
            }
            DB::commit();
            return redirect()->route('expense.index')->with('success', 'Expense updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $expense = Expense::find($id);
        if ($expense) {
            $expense->delete();
            return redirect()->back()->with('success', 'Expense deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Expense not found!');
        }
    }
}
