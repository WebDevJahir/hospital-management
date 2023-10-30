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
                            <div class="t-header">Invoices</div>

                            <div class="table-responsive">
                                <table id="Example" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>Invoice Date</th>
                                            <th>Invoice No</th>
                                            <th>Sub Total</th>
                                            <th>Discount</th>
                                            <th>Total</th>
                                            <th>Tracking Status</th>
                                            <th>Payment Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="incomeHeadTable">
                                        @foreach ($invoices as $invoice)
                                            <tr>
                                                <td>{{ $invoice->invoice_date }}</td>
                                                <td>{{ $invoice->invoice_no }}</td>
                                                <td>{{ $invoice->sub_total }}</td>
                                                <td>{{ $invoice->discount }}</td>
                                                <td>{{ $invoice->total }}</td>
                                                <td>
                                                    <select name="tracking_status" id="tracking_status"
                                                        onchange="trackingStatus({{ $invoice->id }})" class="form-control">
                                                        <option value="">Select</option>
                                                        <option @if ($invoice->tracking_status == 'Ready to ship') selected @endif
                                                            value="Ready to ship">Ready to ship</option>
                                                        <option @if ($invoice->tracking_status == 'Shipped') selected @endif
                                                            value="Shipped">Shipped</option>
                                                        <option @if ($invoice->tracking_status == 'Delivered') selected @endif
                                                            value="Delivered">Delivered</option>
                                                    </select>
                                                </td>
                                                <td>{{ $invoice->payment_status }}</td>
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
    </script>
@endsection
