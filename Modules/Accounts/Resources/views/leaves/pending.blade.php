@extends('master.master')
@section('title', 'Pending Leave - Hospice Bangladesh')
@section('main_content')
    @parent
    <div class="main-container">
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">

                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <!-- Table container start -->
                        <div class="table-container">
                            <div class="t-header">Unapprove Leave List</div>
                            <div class="table-responsive">
                                <table id="Example" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>Application Date</th>
                                            <th>Employee Name</th>
                                            <th>Leave Type</th>
                                            <th>Leave From Date</th>
                                            <th>Joining Date</th>
                                            <th>Total Days</th>
                                            <th style="width:154px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="MedicalProcedureTable">
                                        @foreach ($leaves as $leave)
                                            <tr id="tr{{ $leave->id }}">
                                                <input type="hidden" name="leave_id" class="leave_id"
                                                    value="{{ $leave->id }}">

                                                <td id="application_date{{ $leave->id }}">
                                                    {{ Carbon\Carbon::parse($leave->application_date)->format('m/d/Y') }}
                                                </td>
                                                <td id="staff{{ $leave->id }}">
                                                    {{ $leave->employee->first_name ?? '' }}
                                                    {{ $leave->employee->last_name ?? '' }}
                                                </td>
                                                <td id="from_date{{ $leave->id }}">{{ $leave->leave_type }}</td>
                                                <td id="from_date{{ $leave->id }}">{{ $leave->from_date }}</td>
                                                <td id="to_date{{ $leave->id }}">{{ $leave->to_date }}</td>
                                                <td id="to_date{{ $leave->id }}">{{ $leave->total_days }}</td>
                                                <td>
                                                    <button class="btn btn-sm showDetails" style="background:inherit"
                                                        title="View" style="margin-top: -5px;"><i
                                                            class="fas fa-eye text-primary"></i></button>|
                                                    <button onclick="ApproveAlert({{ $leave->id }})" class="btn btn-sm"
                                                        style="background:inherit" title="Approve"
                                                        style="margin-top: -7px;margin-left: 6px;" type="submit"><i
                                                            class="fas fa-user-check text-success"></i></button>|
                                                    <button onclick="editLeaveView({{ $leave->id }})"
                                                        class="btn btn-inline btn-sm" style="background:inherit"
                                                        title="Edit" type="submit" style="margin:2px;"><i
                                                            class="fas fa-edit text-success"></i></button>|
                                                    <button onclick="deleteLeaveview({{ $leave->id }})"
                                                        class="btn  btn-sm" style="background:inherit" title="Delete"
                                                        style="cursor: pointer; padding-right: 5px;"><i
                                                            class="fas fa-trash-alt text-danger"></i></button>|
                                                    <a href="{{ url('pdf-leave', $leave->id) }}" class="btn btn-sm"
                                                        style="background:inherit" title="Pdf" id="pdf"
                                                        type="submit" target="_blank"><i
                                                            class="fas fa-download text-primary"></i></a>
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

    <!-- modals -->
    <div id="showModal"></div>

@endsection
@section('script')
    <script type="text/javascript">
        $(document).on('click', '.showDetails', function() {
            let this_event = $(this);
            let leave_id = this_event.closest('tr').find('.leave_id').val();
            $.get('{{ route('leave-details') }}', {
                leave_id: leave_id
            }, function(data) {
                $('#showModal').html(data);
                $('#showLeave').modal('show');
            })
        })

        function deleteLeaveview(id) {
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
                    $.get("{{ route('leaves.index') }}", {
                        _token: '{{ @csrf_token() }}',
                        id: id
                    }, function(data) {
                        $('#tr'.concat(id)).remove();
                        Toast.fire({
                            icon: 'success',
                            title: 'Leave has been deleted.',
                        })
                        location.reload(true)
                    });

                }
            })
        }

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
                    $.get("{{ route('approve-leave') }}", {
                        id: id
                    }, function(data) {
                        if (data == 'success') {
                            $('#status' + id).text('Approved')
                            Swal.fire(
                                'Approved!',
                                'Leave has been Approved.',
                                'success'
                            )
                            location.reload(true)
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

        $(document).on('change', '#leave_type', function() {
            var leave_type = $('#leave_type').val();
            var staff_id = $('#staff_id').val();
            $.get('{{ url('get-leave') }}', {
                leave_type: leave_type,
                staff_id: staff_id
            }, function(data) {
                $('#total_leave').val(data);
            })

            $.get('{{ url('get-used-leave') }}', {
                leave_type: leave_type,
                staff_id: staff_id
            }, function(data) {
                $('#used_leave').val(data);
            })
        })

        $('#addLeave').on('click', function(e) {
            e.preventDefault();
            var total_leave = $('#total_leave').val();
            var used_leave = $('#used_leave').val();
            if (total_leave < used_leave) {
                Swal.fire({
                    title: 'Leave type already taken',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, ok it!'
                }).then(function(result) {
                    if (result.value === true) {
                        $('#leaveForm').submit();
                    }
                });
            }
        })
    </script>
@endsection
