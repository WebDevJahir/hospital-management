@extends('master.master')
@section('title', 'Investigation Category - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_heading = !empty($expense->id) ? 'Edit' : 'Create';
        $form_url = !empty($expense->id) ? route('expense.update', $expense->id) : route('expense.store');
        $form_method = !empty($expense->id) ? 'PUT' : 'POST';
        $patient_id = !empty($expense->id) ? $expense->patient_id : '';
        $type = !empty($expense->id) ? $expense->type : '';
        $project_id = !empty($expense->id) ? $expense->project_id : '';
        $employee_id = !empty($expense->id) ? $expense->employee_id : '';
        $received_by = !empty($expense->id) ? $expense->received_by : '';
        $date = !empty($expense->id) ? $expense->date : '';
        $total = !empty($expense->id) ? $expense->total : '';
    @endphp
    <div class="main-container">
        <div class="content-wrapper">
            <div class="fixedBodyScroll">
                <form class="" action="{{ $form_url }}" method="POST">
                    {{ method_field($form_method) }}
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <label class="">Type :</label>
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    <span class="icon-user-plus"></span>
                                </span>
                                <select id="type" name="type" class="form-control select2" data-width="92%">
                                    <option value="">Select Type</option>
                                    <option value="Debit" @if ($type == 'Debit') selected @endif>Debit</option>
                                    <option value="Conveyance" @if ($type == 'Conveyance') selected @endif>Conveyance
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="">Date :</label>
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    <span class="icon-user-plus"></span>
                                </span>
                                <input type="date" class="form-control" placeholder="Invoice Date" id="date"
                                    name="date" value="{{ $date ?? date('Y-m-d') }}">
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
                            <label class="">Employee :</label>
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    <span class="icon-user-plus"></span>
                                </span>
                                <select id="employee_id" name="employee_id" class="form-control select2" data-width="92%">
                                    <option value="">Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"
                                            @if ($employee_id == $employee->id) selected @endif>
                                            {{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="">Received By:</label>
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    <span class="icon-user-plus"></span>
                                </span>
                                <input type="text" class="form-control" placeholder="Received By" id="received_by"
                                    name="received_by" value="{{ $received_by ?? '' }}">
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="table=responsive">
                            <table class="table" id="expenseTable">
                                <thead>
                                    <tr>
                                        <th>Income Head</th>
                                        <th>Subcategory</th>
                                        <th class="from_address_heading @if ($type == 'Debit') d-none @endif">
                                            From</th>
                                        <th class="to_address_heading @if ($type == 'Debit') d-none @endif">To
                                        </th>
                                        <th class="used_transport_heading @if ($type == 'Debit') d-none @endif">
                                            Used Transport</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>
                                            <button type="button" class="btn btn-outline-success" id="addRow"><i
                                                    class="fa fa-plus-square" aria-hidden="true"></i></button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($expense->id))
                                        @foreach ($expense->expenseLines as $line)
                                            <tr>
                                                <td>
                                                    <select class="form-control select2 expense_head_id" data-width="100%"
                                                        name="expense_head_id[]">
                                                        <option value="">Select Income Head</option>
                                                        @foreach ($expense_heads as $expenseHead)
                                                            <option value="{{ $expenseHead->id }}"
                                                                @if ($line->expense_head_id == $expenseHead->id) selected @endif>
                                                                {{ $expenseHead->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control select2 expense_sub_category_id"
                                                        data-width="100%" name="expense_sub_category_id[]">
                                                        <option value="">Select Subcategory</option>
                                                        @foreach ($expense_sub_categories as $expenseSubcategory)
                                                            <option value="{{ $expenseSubcategory->id }}"
                                                                @if ($expenseSubcategory->id == $line->expense_sub_category_id) selected @endif>
                                                                {{ $expenseSubcategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td
                                                    class="from_address_td  @if ($type == 'Debit') d-none @endif">
                                                    <div>
                                                        <input type="text" class="form-control from_address"
                                                            placeholder="From Address" value="{{ $line->from_address }}"
                                                            name="from_address[]">
                                                    </div>
                                                </td>
                                                <td class="to_address_td @if ($type == 'Debit') d-none @endif">
                                                    <div>
                                                        <input type="text" class="form-control to_address"
                                                            placeholder="To address" value="{{ $line->to_address }}"
                                                            name="to_address[]">
                                                    </div>
                                                </td>
                                                <td
                                                    class="used_transport_td @if ($type == 'Debit') d-none @endif">
                                                    <div>
                                                        <input type="text" class="form-control used_transport"
                                                            placeholder="Used Transport"
                                                            value="{{ $line->used_transport }}" name="used_transport[]">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input type="text" class="form-control description"
                                                            placeholder="Description" value="{{ $line->description }}"
                                                            name="description[]">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input type="text" class="form-control amount" name="amount[]"
                                                            placeholder="Amount" value="{{ $line->amount }}"
                                                            oninput="calculateTotal()">
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
                                                <select class="form-control select2 expense_head_id" data-width="100%"
                                                    name="expense_head_id[]">
                                                    <option value="">Select Income Head</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control select2 expense_sub_category_id"
                                                    data-width="100%" name="expense_sub_category_id[]">
                                                    <option value="">Select Subcategory</option>
                                                </select>
                                            </td>
                                            <td class="d-none from_address_td">
                                                <div>
                                                    <input type="text" class="form-control from_address"
                                                        placeholder="From Address" value="" name="from_address[]">
                                                </div>
                                            </td>
                                            <td class="d-none to_address_td">
                                                <div>
                                                    <input type="text" class="form-control to_address"
                                                        placeholder="To Address" value="" name="to_address[]">
                                                </div>
                                            </td>
                                            <td class="d-none used_transport_td">
                                                <div>
                                                    <input type="text" class="form-control used_transport"
                                                        placeholder="Used Transport" value=""
                                                        name="used_transport[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" class="form-control description"
                                                        placeholder="Description" value="" name="description[]">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" class="form-control amount"
                                                        placeholder="Amount" value="" oninput="calculateTotal()"
                                                        name="amount[]">
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
                                        <td id="total_td"
                                            @if ($type == 'Debit') colspan="3" @else colspan="6" @endif style="text-align: right; font-weight: bold;">
                                            <span>Total</span>
                                        </td>
                                        <td id="total_amount_td"
                                            @if ($type == 'Debit') colspan="1" @else colspan="1" @endif>
                                            <div>
                                                <input type="text" class="form-control total" id="total"
                                                    placeholder="Total" value="{{ $total ?? '' }}" name="total">
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
    @include('accounts::expense.js.expense-js')
@endsection
