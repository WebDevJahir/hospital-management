@extends('master.master')
@section('title', 'Investigation Category - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_heading = $invoice->id ? 'Edit Invoice' : 'Add Invoice';
        $form_url = $invoice->id ? route('invoice.update', $invoice->id) : route('invoice.store');
        $form_method = $invoice->id ? 'PUT' : 'POST';
    @endphp
    <div class="main-container">
        <div class="content-wrapper">
            <div class="fixedBodyScroll">
                <form class="" action="{{ $form_url }}" method="POST">
                    {{ method_field($form_method) }}
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="">Select Patient :</label>
                                <select name="patient_id" id="patient_id" class="form-control select2">
                                    <option value="">Select Patient</option>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="">Invoice Date :</label>
                                <input type="date" class="form-control" placeholder="Invoice Date" id="invoice_date"
                                    name="invoice_date" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="">Project :</label>
                                <select id="project_id" name="project_id" class="form-control select2">
                                    <option value="">Select Project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Income Head</th>
                                    <th>Subcategory</th>
                                    <th>Quantity</th>
                                    <th>Unit/Day Price</th>
                                    <th>Amount</th>
                                    <th>VAT</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control select2" id="income_head_id">
                                            <option value="">Select Income Head</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control select2" id="income_subcategory_id">
                                            <option value="">Select Subcategory</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div>
                                            <input type="text" class="form-control" id="quantity_fetch"
                                                placeholder="Quantity" value="1" oninput="amount_calc()">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input type="text" class="form-control" id="unit_price_fetch"
                                                placeholder="Unit Price" oninput="amount_calc()">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input type="text" class="form-control" id="amount_fetch"
                                                placeholder="Amount" value="" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <span id="vat-icon"></span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success" id="addRow"><i
                                                class="fa fa-plus-square" aria-hidden="true"></i> Add</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/invoice.js') }}"></script>
@endsection
