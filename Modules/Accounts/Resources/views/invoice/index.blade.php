@extends('master.master')
@section('title', 'Income Head - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $is_old = old('client_no') ? true : false;
        $form_heading = !empty($sale->id) ? 'Update' : 'Add';
        $form_url = !empty($sale->id) ? route('income-head.update', $sale->id) : route('income-head.store');
        $form_method = !empty($sale->id) ? 'PUT' : 'POST';
    @endphp

    <div class="main-container">
        <!-- Page header start -->
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-container">
                            <div class="t-header mb-2">Invoices</div>
                            <table id="Example"
                                class="table custom-table dataTable no-footer table-striped table-bordered ">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Invoice Date</th>
                                        <th>Invoice No</th>
                                        <th>Sub Total</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="incomeHeadTable">
                                    @foreach ($invoices as $invoice)
                                        <tr>
                                            <td>
                                                {{ $invoice->patient->name }}
                                            </td>
                                            <td>
                                                {{ $invoice->invoice_date }}
                                                <input type="hidden" name="invoice_id" class="invoice_id"
                                                    value="{{ $invoice->id }}">
                                            </td>
                                            <td>{{ $invoice->invoice_no }}</td>
                                            <td>{{ $invoice->sub_total }}</td>
                                            <td>{{ $invoice->discount }}</td>
                                            <td>{{ $invoice->total }}</td>
                                            <td class="payment_status">{{ $invoice->payment_status }}</td>
                                            <td>
                                                <div class="icon-btn">
                                                    <nobr>
                                                        <a data-toggle="tooltip" title="Edit"
                                                            href="{{ route('invoice.edit', $invoice->id) }}"
                                                            class="btn btn-outline-success btn-sm"><i
                                                                class="fas fa-pen"></i></a>

                                                        <form action="{{ route('invoice.destroy', $invoice->id) }}"
                                                            method="POST" data-toggle="tooltip" title="Delete"
                                                            class="d-inline deleteData">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-sm delete"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
                                                        <button type="button" data-toggle="tooltip" title="Pay Now"
                                                            class="btn btn-outline-info btn-sm pay_now">
                                                            <i class="fab fa-amazon-pay text-primary"></i>
                                                        </button>
                                                        <button class="btn btn-outline-success btn-sm addAdvance"
                                                            title="Advance">
                                                            <i class="fas fa-hand-holding-usd">
                                                            </i>
                                                        </button>
                                                    </nobr>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
    <script type="text/javascript">
        $('.deleteData').submit(function(e) {
            e.preventDefault();
            let form = this;
            let id = $(this).data('id');
            let url = "{{ route('income-head.destroy', ':id') }}";
            url = url.replace(':id', id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }); //end of submit


        $(document).on('click', '.pay_now', function() {
            loaderShow();
            let this_event = $(this);
            $.get('{{ route('get-payment-method') }}', function(data) {
                loaderHide();
                var options = {};
                $.each(data, function(i, item) {
                    options[item.id] = item.bank_name + ' (' + item.branch + ')'
                });
                Swal.fire({
                    title: 'Select Payment method',
                    input: 'select',
                    inputOptions: options,
                    showCancelButton: true,
                    inputValidator: function(value) {
                        return new Promise(function(resolve, reject) {
                            if (value != null) {
                                resolve()
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Select payment method!',
                                })
                            }
                        })
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        var payment_method_id = result.value;
                        let invoice_id = this_event.closest('tr').find('#invoice_id').val();
                        loaderShow();
                        $.get('{{ route('update-invoice-status') }}', {
                            payment_method_id: payment_method_id,
                            invoice_id: invoice_id
                        }, function(data) {
                            loaderHide();
                            if (data == 'failed') {
                                Swal.fire(
                                    'Sorry!',
                                    'Invoice already Paid.',
                                    'error'
                                )
                            } else {
                                Swal.fire(
                                    'Paid!',
                                    'Invoice has been Paid.',
                                    'success'
                                )
                                this_event.closest('tr').find('.payment_status').html(
                                    'Paid');
                            }
                            // location.reload(true)
                        });
                    }
                })
            })
        })

        $(document).on('click', '.addAdvance', function() {
            let this_event = $(this);
            let invoice_id = this_event.closest('tr').find('.invoice_id').val();
            $.get('{{ route('get-advance-modal') }}', {
                invoice_id: invoice_id
            }, function(data) {
                $('#modal').html(data);
                $('#advanceModal').modal('show');
            })
        })

        $('#Example').DataTable({
            "order": []
        });
    </script>
@endsection
