@extends('master.master')
@section('title', 'Salary - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
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
                            <div class="t-header mb-3">Salary</div>

                            <div class="table-responsive">
                                <table id="Example"
                                    class="table custom-table dataTable no-footer table-striped table-bordered">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Employee Name</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Salary</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="incomeHeadTable">
                                        @foreach ($salaries as $salary)
                                            <tr>
                                                <td>
                                                    {{ $salary?->employee?->first_name }}
                                                </td>
                                                <td>{{ $salary->month ? Carbon\Carbon::createFromDate($salary->year, $salary->month, 1)->format('F') : '' }}
                                                </td>
                                                <td>{{ $salary->year }}</td>
                                                <td>{{ $salary->total_salary }}</td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a data-toggle="tooltip" title="Edit"
                                                                href="{{ route('salary.edit', $salary->id) }}"
                                                                class="btn btn-outline-success btn-sm"><i
                                                                    class="fas fa-pen"></i></a>

                                                            <form action="{{ route('salary.destroy', $salary->id) }}"
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
                    this.submit();
                }
            })
        });
        $('#Example').DataTable({
            "order": []
        });
    </script>
@endsection
