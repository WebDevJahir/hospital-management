<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Accounts\Entities\Advance;
use Modules\Admin\Entities\District;
use Modules\Patient\Entities\Patient;
use Modules\Accounts\Entities\Invoice;
use Modules\Accounts\Entities\InvoiceLine;
use Modules\Accounts\Entities\Payment;
use Modules\Admin\Entities\IncomeHead;
use Modules\Admin\Entities\IncomeSubCategory;
use Modules\Admin\Entities\PoliceStation;
use Modules\Admin\Entities\Project;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $invoices = Invoice::with('patient')->where('payment_status', 'Due')->orderBy('id', 'desc')->get();
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
        $police_stations = PoliceStation::all();
        return view('accounts::invoice.create', compact('patients', 'projects', 'police_stations'));
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
            $data['invoice_no'] = 'INV-' . date('Ymd') . '-' . time();
            $data['payment_status'] = 'Due';
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
        $police_stations = PoliceStation::all();
        $income_heads = IncomeHead::where('project_id', $invoice->project_id)->get();
        $income_subcategory_ids = InvoiceLine::where('invoice_id', $invoice->id)->pluck('income_subcategory_id')->toArray();
        $income_subcategories = IncomeSubCategory::whereIn('id', $income_subcategory_ids)->get();
        return view('accounts::invoice.create', compact('invoice', 'patients', 'projects', 'income_heads', 'income_subcategories', 'police_stations'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Invoice $invoice)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $invoice->update($data);
            $invoice->invoiceLines()->delete();
            $this->invoiceLine($invoice, $data);
            DB::commit();
            return redirect()->route('invoice.index')->with('success', 'Invoice updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
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

    public function updateInvoiceStatus(Request $request)
    {
        try {
            DB::beginTransaction();
            $invoice = Invoice::find($request->invoice_id);
            if ($request->payment_status == 'Due') {
                $invoice->update(['payment_status' => 'Due']);
                $invoice->invoiceLines->map(function ($line) {
                    $line->update(['status' => 'Due']);
                });
                $payment = Payment::create([
                    'project_id' => $invoice->project_id,
                    'invoice_id' => $invoice->id,
                    'payment_method_id' => $request->payment_method_id,
                    'amount' => $invoice->total,
                    'date' => date('Y-m-d'),
                    'note' => $request->note,
                ]);
                DB::commit();
                return response()->json(['success' => 'Invoice status updated successfully']);
            } else {
                return response()->json(['error' => 'This Invoice is already paid']);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function getAdvanceModal(Request $request)
    {
        $invoice = Invoice::find($request->invoice_id);
        $advances = Advance::where('invoice_id', $invoice->id)
            ->orderBy('id', 'desc')
            ->get();
        $invoice->paid = $advances->sum('paid') + $invoice->advance;
        $invoice->due = $invoice->total - $invoice->paid;
        return view('accounts::invoice.modal.advance_modal', compact('invoice', 'advances'));
    }

    public function addAdvance(Request $request)
    {
        $advance = Advance::create($request->all());
        $invoice = Invoice::find($request->invoice_id);
        $advances = Advance::where('invoice_id', $invoice->id)
            ->orderBy('id', 'desc')
            ->get();
        $totalPaid = $advances->sum('paid') + $invoice->advance;
        if ($totalPaid >= $invoice->total) {
            $invoice->update(['payment_status' => 'Paid']);
        } else {
            $invoice->update(['payment_status' => 'Due']);
        }

        return redirect()->back()->with('success', 'Advance Saved Successfully');
    }
}
