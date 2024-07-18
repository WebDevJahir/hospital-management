@extends('master.master')
@section('title', 'Approve Leave - Hospice Bangladesh')
@section('main_content')
    @parent
    <!-- *************
             ************ Main container start *************
            ************* -->
    <div class="main-container">
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">
                @php $permission = Session::get('permission'); @endphp
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-container">
                            <div class="t-header mb-3">Leaves</div>

                            <div class="table-responsive">
                                <table id="Example"
                                    class="table custom-table dataTable no-footer table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Application Date</th>
                                            <th>Employee Name</th>
                                            <th>Leave Type</th>
                                            <th>Leave From Date</th>
                                            <th>Joining Date</th>
                                            <th>Total Days</th>
                                            <th style="width:153px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="incomeHeadTable">
                                        @foreach ($leaves as $leave)
                                            <tr>
                                                <td>
                                                    {{ Carbon\Carbon::parse($leave->application_date)->format('m/d/Y') }}
                                                </td>
                                                <td>{{ $leave->employee->last_name ?? '' }}
                                                    {{ $leave->employee->first_name ?? '' }}</td>
                                                <td>{{ $leave->leave_type }}</td>
                                                <td>{{ $leave->from_date }}</td>
                                                <td>{{ $leave->to_date }}</td>
                                                <td>{{ $leave->total_days }}</td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a data-toggle="tooltip" title="Edit"
                                                                href="{{ route('leaves.edit', $leave->id) }}"
                                                                class="btn btn-outline-success btn-sm"><i
                                                                    class="fas fa-pen"></i></a>
                                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                                onclick="ApproveAlert({{ $leave->id }})"><i
                                                                    class="far fa-check-square"></i></button>
                                                            <form action="{{ route('leaves.destroy', $leave->id) }}"
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
    <!-- *************
             ************ Main container end *************
            ************* -->
    <!-- edit modals -->
    <div id="edit_modal_body">

    </div>
@endsection
@section('script')
<script>
    $('.deleteData').submit(function(e) {
        e.preventDefault();
        var form = this;
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    });

    function ApproveAlert(id) {
        Swal.fire({
            title: 'Are you sure approve?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.get('{{ route('approve-leave') }}', {
                    id: id
                }, function(data) {
                    if (data == 'success') {
                        $('#status' + id).text('Approved')
                        Swal.fire(
                            'Approved!',
                            'Leave has been Approved.',
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Sorry!',
                            'Leave already Approved.',
                            'error'
                        )
                    }

                })
            }
        })
    }
</script>
@endsection
