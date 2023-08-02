@extends('master.master')
@section('title', 'Patient - Hospice Bangladesh')
@section('main_content')
    @parent
    <style>
        section {
            border: 2px solid gray;
            padding: 10px;
            border-radius: 10px;
        }

        .legend {
            margin-top: -22px;
            margin-bottom: 10px;
        }

        .legend-title {
            background-color: white;
            padding: 0 10px;
            margin-left: 10px;
            font-size: 15px;
            font-weight: bold;
        }

        .input-group-text {
            width: 130px;
        }
    </style>

    <div class="main-container">
        <!-- Page employeeer start -->
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-container">
                            <div class="t-employeeer">Patient list
                                <button type="button" class="btn-info btn-rounded" onclick="editStaff()">Add Employee</button>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="Example" class="table custom-table">
                                    <tr>
                                        <th>Reg No</th>
                                        <th>Full Name</th>
                                        <th>Package</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="patientTable">
                                        @foreach ($patients as $patient)
                                            <tr id="tr{{ $patient->id }}">
                                                <td id="name{{ $patient->id }}">{{ $patient->reg_no }}</td>
                                                <td id="name{{ $patient->id }}">{{ $patient->patient_name }}</td>
                                                <td id="name{{ $patient->id }}">{{ $patient->package->name }}</td>
                                                <td id="phone{{ $patient->id }}">{{ $patient->phone ?? '' }}</td>
                                                <td id="email{{ $patient->id }}">{{ $patient->user->email ?? '' }}</td>
                                                <td id="email{{ $patient->id }}">{{ $patient->password ?? '' }}</td>
                                                <td id="status{{ $patient->id }}">{{}}</td>
                                                <td>
                                                    {{-- @if (in_array(13, $permission)) --}}
                                                    <button class="btn btn-sm" style="background:inherit" title="Edit"
                                                        onclick="editStaff({{ $employee->id }})" type="submit"><i
                                                            class="fas fa-edit text-success"></i></button>|
                                                    {{-- @endif --}}
                                                    {{-- @if (in_array(14, $permission)) --}}
                                                    <form action="{{ route('employee.destroy', $employee->id) }}"
                                                        method="POST" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm" style="background:inherit" title="Delete"
                                                            onclick="deleteEmployee(event)" type="submit"><i
                                                                class="fas fa-trash text-danger"></i></button>
                                                    </form>
                                                    {{-- @endif --}}
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

    <div class="staffModal"></div>
@endsection


@section('script')
    <script type="text/javascript">
        // function addStaff() {
        //     $('#staffModal').modal('show');
        //     $('#staffModal').closest('.modal-body').find('input').val('');
        // }

        function editStaff(id) {
            var url = id ? `/admin/employee/${id}/edit` : "{{ route('employee.create') }}";
            url = url.replace(':id', id);
            //get data by ajax
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    $('.staffModal').html(response);
                    $('#staffModal').modal('show');
                }
            });
        }

        function deleteEmployee(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this employee!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',

                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.target.closest('form').submit();
                }
            })
        }

        $(document).ready(function() {
            $('#Example').DataTable({
                "order": []
            });
        });
    </script>
@endsection
