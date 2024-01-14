@extends('master.master')
@section('title', 'Investigation Category - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_heading = !empty($invoice->id) ? 'Edit' : 'Create';
        $form_url = !empty($invoice->id) ? route('invoice.update', $invoice->id) : route('invoice.store');
        $form_method = !empty($invoice->id) ? 'PUT' : 'POST';
        $patient_id = !empty($invoice->id) ? $invoice->patient_id : '';
        $project_id = !empty($invoice->id) ? $invoice->project_id : '';
        $police_station_id = !empty($invoice->id) ? $invoice->police_station_id : '';
        $lab_id = !empty($invoice->id) ? $invoice->lab_id : '';
        $admission_date = !empty($invoice->id) ? $invoice->admission_date : '';
        $discharge_date = !empty($invoice->id) ? $invoice->discharge_date : '';
        $invoice_date = !empty($invoice->id) ? $invoice->invoice_date : '';
        $need_date = !empty($invoice->id) ? $invoice->need_date : '';
        $need_time = !empty($invoice->id) ? $invoice->need_time : '';
        $sub_total = !empty($invoice->id) ? $invoice->sub_total : '';
        $discount_type = !empty($invoice->id) ? $invoice->discount_type : '';
        $discount = !empty($invoice->id) ? $invoice->discount : '';
        $discount_amount = !empty($invoice->id) ? $invoice->discount_amount : '';
        $vat_type = !empty($invoice->id) ? $invoice->vat_type : '';
        $vat = !empty($invoice->id) ? $invoice->vat : '';
        $vat_amount = !empty($invoice->id) ? $invoice->vat_amount : '';
        $delivery_charge = !empty($invoice->id) ? $invoice->delivery_charge : '';
        $service_charge = !empty($invoice->id) ? $invoice->service_charge : '';
        $collection_charge = !empty($invoice->id) ? $invoice->collection_charge : '';
        $total = !empty($invoice->id) ? $invoice->total : '';
        $advance = !empty($invoice->id) ? $invoice->advance : '';
        $due = !empty($invoice->id) ? $invoice->due : '';
    @endphp
    <div class="main-container">
        <div class="content-wrapper">
            <div class="fixedBodyScroll">
                <form class="" action="{{ $form_url }}" method="POST">
                    {{ method_field($form_method) }}
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <label class="">Select Patient :</label>
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    <span class="icon-user-plus"></span>
                                </span>
                                <select name="patient_id" id="patient_id" class="form-control select2" data-width="92%">
                                    <option value="">Select Patient</option>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}"
                                            @if ($patient_id == $patient->id) selected @endif>
                                            {{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="">Invoice Date :</label>
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    <span class="icon-user-plus"></span>
                                </span>
                                <input type="date" class="form-control" placeholder="Invoice Date" id="invoice_date"
                                    name="invoice_date" value="{{ $invoice_date ?? date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="">Project :</label>
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    <span class="icon-user-plus"></span>
                                </span>
                                <select id="project_id" name="project_id" class="form-control select2" data-width="92%">
                                    <option value="">Select Project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}"
                                            @if ($project_id == $project->id) selected @endif>
                                            {{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="">Delivery Police Station :</label>
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    <span class="icon-user-plus"></span>
                                </span>
                                <select id="police_station_id" name="police_station_id" class="form-control select2"
                                    data-width="92%">
                                    <option value="">Select Police Station</option>
                                    @foreach ($police_stations as $police_station)
                                        <option value="{{ $police_station->id }}"
                                            @if ($police_station_id == $police_station->id) selected @endif>
                                            {{ $police_station->name }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="">Select Lab :</label>
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    <span class="icon-user-plus"></span>
                                </span>
                                <select id="lab_id" name="lab_id" class="form-control select2" data-width="92%">
                                    <option value="">Select Lab</option>
                                    {{-- @foreach ($labs as $lab)
                                        <option value="{{ $lab->id }}">{{ $lab->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="">Admission Date :</label>
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    <span class="icon-user-plus"></span>
                                </span>
                                <input type="date" class="form-control" placeholder="Admission Date" id="admission_date"
                                    name="admission_date" value="{{ $admission_date ?? date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="">Discharge Date :</label>
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    <span class="icon-user-plus"></span>
                                </span>
                                <input type="date" class="form-control" placeholder="Discharge Date" id="discharge_date"
                                    name="discharge_date" value="{{ $discharge_date ?? date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="">Date (When Need) :</label>
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    <span class="icon-user-plus"></span>
                                </span>
                                <input type="date" class="form-control" placeholder="Need Date" id="need_date"
                                    name="need_date" value="{{ $need_date ?? date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="">Time (When Need):</label>
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    <span class="icon-user-plus"></span>
                                </span>
                                <input type="time" class="form-control" placeholder="Need Time" id="need_time"
                                    name="need_time" value="{{ $need_time ?? date('H:i') }}">
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="table=responsive">
                            <table class="table" id="invoiceTable">
                                <thead>
                                    <tr>
                                        <th>Income Head</th>
                                        <th>Subcategory</th>
                                        <th>Quantity</th>
                                        <th>Unit/Day Price</th>
                                        <th>Amount</th>
                                        <th>
                                            <button type="button" class="btn btn-outline-success" id="addRow"><i
                                                    class="fa fa-plus-square" aria-hidden="true"></i></button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($invoice->id))
                                        @foreach ($invoice->invoiceLines as $line)
                                            <tr>
                                                <td>
                                                    <select class="form-control select2 income_head_id" data-width="100%"
                                                        name="income_head_id[]">
                                                        <option value="">Select Income Head</option>
                                                        @foreach ($income_heads as $incomeHead)
                                                            <option value="{{ $incomeHead->id }}"
                                                                @if ($line->income_head_id == $incomeHead->id) selected @endif>
                                                                {{ $incomeHead->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control select2 income_subcategory_id"
                                                        data-width="100%" name="income_subcategory_id[]">
                                                        <option value="">Select Subcategory</option>
                                                        @foreach ($income_subcategories as $incomeSubcategory)
                                                            <option value="{{ $incomeSubcategory->id }}"
                                                                @if ($incomeSubcategory->id == $line->income_subcategory_id) selected @endif>
                                                                {{ $incomeSubcategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input type="text" class="form-control quantity"
                                                            placeholder="Quantity" value="{{ $line->quantity }}"
                                                            name="quantity[]">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input type="text" class="form-control unit_price"
                                                            placeholder="Unit Price" value="{{ $line->price }}"
                                                            name="unit_price[]">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input type="text" class="form-control amount"
                                                            placeholder="Amount"
                                                            value="{{ $line->quantity * $line->price }}" readonly>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-danger removeRow"><i
                                                            class="fa fa-minus-square" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>
                                                <select class="form-control select2 income_head_id" data-width="100%"
                                                    name="income_head_id[]">
                                                    <option value="">Select Income Head</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control select2 income_subcategory_id"
                                                    data-width="100%" name="income_subcategory_id[]">
                                                    <option value="">Select Subcategory</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" class="form-control quantity"
                                                        placeholder="Quantity" value="1" name="quantity[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" class="form-control unit_price"
                                                        placeholder="Unit Price" value="" name="unit_price[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" class="form-control amount"
                                                        placeholder="Amount" value="" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger removeRow"><i
                                                        class="fa fa-minus-square" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" style="text-align: right">
                                            <span>Sub Total</span>
                                        </td>
                                        <td colspan="4">
                                            <div>
                                                <input type="text" class="form-control sub_total" id="sub_total"
                                                    placeholder="Sub Total" value="{{ $sub_total ?? '' }}"
                                                    name="sub_total" readonly>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: right">
                                            <span>Discount</span>
                                        </td>
                                        <td>
                                            <div>
                                                <select class="form-control discount_type" id="discount_type"
                                                    name="discount_type">
                                                    <option value="$"
                                                        @if ($discount_type == '$') selected @endif>Fixed
                                                    <option value="%"
                                                        @if ($discount_type == '%') selected @endif>Percentage
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <input type="text" class="form-control discount" id="discount"
                                                    name="discount_percent" placeholder="Discount"
                                                    value="{{ $discount ?? '' }}">
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div>
                                                <input type="text" class="form-control discount_amount"
                                                    id="discount_amount" name="discount_amount"
                                                    placeholder="Discount Amount" value="{{ $discount ?? '' }}" </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: right">
                                            <span>VAT</span>
                                        </td>
                                        <td>
                                            <div>
                                                <select class="form-control vat_type" id="vat_type" name="vat_type"
                                                    onchange="calculateTotal()">
                                                    <option value="$"
                                                        @if ($vat_type == '$') selected @endif>Fixed</option>
                                                    <option value="%"
                                                        @if ($vat_type == '%') selected @endif>Percentage
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <input type="text" class="form-control vat"
                                                    placeholder="VAT Percent/Amount" name="vat" id="vat"
                                                    value="{{ $vat ?? '' }}">
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div>
                                                <input type="text" class="form-control vat_amount" name="vat_amount"
                                                    id="vat_amount" placeholder="VAT Amount"
                                                    value="{{ $vat_amount ?? '' }}" </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: right">
                                            <span>Delivery Charge</span>
                                        </td>
                                        <td colspan="4">
                                            <div>
                                                <input type="text" class="form-control delivery_charge"
                                                    name="delivery_charge" id="delivery_charge"
                                                    placeholder="Delivery Charge" value="{{ $delivery_charge ?? '' }}">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: right">
                                            <span>Service Charge</span>
                                        </td>
                                        <td colspan="4">
                                            <div>
                                                <input type="text" class="form-control service_charge"
                                                    name="service_charge" id="service_charge"
                                                    placeholder="Service Charge" value="{{ $service_charge ?? '' }}">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: right">
                                            <span>Collection Charge</span>
                                        </td>
                                        <td colspan="4">
                                            <div>
                                                <input type="text" class="form-control collection_charge"
                                                    name="collection_charge" id="collection_charge"
                                                    placeholder="Collection Charge"
                                                    value="{{ $collection_charge ?? '' }}">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: right">
                                            <span>Total</span>
                                        </td>
                                        <td colspan="4">
                                            <div>
                                                <input type="text" class="form-control total" placeholder="Total"
                                                    name="total" id="total" value="{{ $total ?? '' }}" readonly>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: right">
                                            <span>Advance</span>
                                        </td>
                                        <td colspan="4">
                                            <div>
                                                <input type="text" class="form-control advance" placeholder="Advance"
                                                    name="advance" id="advance" value="{{ $advance ?? '' }}">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: right">
                                            <span>Due</span>
                                        </td>
                                        <td colspan="4">
                                            <div>
                                                <input type="text" class="form-control due" placeholder="Due"
                                                    name="due" id="due" value="{{ $due ?? '' }}" readonly>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="d-grid gap-2 col-4 mx-auto mt-3">
                            <button class="btn btn-outline-success" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('accounts::invoice.js.invoice-js')
@endsection
