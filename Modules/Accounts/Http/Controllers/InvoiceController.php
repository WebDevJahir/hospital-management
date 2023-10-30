<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\District;
use Modules\Patient\Entities\Patient;
use Modules\Accounts\Entities\Invoice;
use Modules\Accounts\Entities\InvoiceLine;
use Modules\Admin\Entities\IncomeHead;
use Modules\Admin\Entities\IncomeSubCategory;
use Modules\Admin\Entities\Project;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $invoices = Invoice::orderBy('id', 'desc')->get();
        return view('accounts::invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $patients = Patient::all();
        $projects = Project::take(10)->get();
        return view('accounts::invoice.create', compact('patients', 'projects'));
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
            $data = $request->all();
            $data['invoice_no'] = 'INV-' . date('Ymd') . time();
            $invoice = Invoice::create($data);
            $this->invoiceLine($invoice, $data);
            DB::commit();
            return redirect()->route('invoice.index')->with('success', 'Invoice created successfully');
        } catch (\Exception $e) {
            DB::rollback();
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
    public function edit(Invoice $invoice)
    {
        $patients = Patient::all();
        $projects = Project::get();
        $income_heads = IncomeHead::where('project_id', $invoice->project_id)->get();
        $income_subcategory_ids = InvoiceLine::where('invoice_id', $invoice->id)->pluck('income_subcategory_id')->toArray();
        $income_subcategories = IncomeSubCategory::whereIn('id', $income_subcategory_ids)->get();
        return view('accounts::invoice.create', compact('invoice', 'patients', 'projects', 'income_heads', 'income_subcategories'));
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

    public function invoiceLine($invoice, $data)
    {
        $lines = [];
        foreach ($data['income_head_id'] as $key => $value) {
            $lines[] = [
                'invoice_id' => $invoice->id,
                'invoice_date' => $data['invoice_date'],
                'project_id' => $data['project_id'],
                'income_head_id' => $data['income_head_id'][$key],
                'income_subcategory_id' => $data['income_subcategory_id'][$key],
                'quantity' => $data['quantity'][$key],
                'price' => $data['unit_price'][$key],
            ];
        }
        InvoiceLine::insert($lines);
    }
}
