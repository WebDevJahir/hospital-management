<div class="modal fade" id="advanceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payments</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('add-advance') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Invoice No</th>
                                    <th>Patient Name</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Collection</th>
                                    <th>Remain</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" name="invoice_id" id="invoice_id"
                                            value="{{ $invoice->id }}" class="form-control" readonly="">
                                    </td>
                                    <td>
                                        <input type="hidden" name="patient_id" id="patient_id" value=""
                                            class="form-control">
                                        <input type="text" name="patient_name" value="{{ $invoice->patient->name }}"
                                            class="form-control" readonly="">
                                        <input type="hidden" name="patient_id" value="{{ $invoice->patient->id }}"
                                            class="form-control" readonly="">
                                    </td>
                                    <td>
                                        <input type="number" name="total_amount" id="total_amount" class="form-control"
                                            value="{{ $invoice->total }}" readonly="">
                                    </td>
                                    <td>
                                        <input type="number" name="total" id="total_advance" class="form-control"
                                            value="{{ $invoice->paid }}" readonly="">
                                    </td>
                                    <td>
                                        <input type="number" name="total" id="total_due" class="form-control"
                                            value="{{ $invoice->due }}" readonly="">
                                    </td>
                                    <td>
                                        <div>
                                            <input type="number" name="paid" id="paid" class="form-control"
                                                value="0"
                                                @if ($invoice->due == 0) readonly="" style="background:#e7d2d2;" @endif>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input type="number" name="due" id="due" class="form-control"
                                                value="0" readonly="">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-outline-success" id="edit_add_list_btn"><i
                                                class="fa fa-plus-square" aria-hidden="true"></i>Save</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <h5>Advance List</h5>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Patient Name</th>
                                    <th>Due</th>
                                    <th>Paid</th>
                                    <th>Remain</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($advances as $advance)
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder=""
                                                value="{{ $advance->created_at }}" readonly="">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder=""
                                                value="{{ $advance->patient->name }}" readonly="">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder=""
                                                value="{{ $advance->total }}" readonly="">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder=""
                                                value="{{ $advance->paid }}" readonly="">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder=""
                                                value="{{ $advance->due }}" readonly="">
                                        </td>
                                        <td>
                                            <a href="{{ url('delete-advance', $advance->id) }}"
                                                style="cursor: pointer; padding-right: 5px;"><i
                                                    class="fas fa-trash-alt text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
