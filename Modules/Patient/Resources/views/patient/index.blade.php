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
                            <div class="t-header mb-3">
                                <div class="th-title">
                                    <div style="">
                                        <div class="d-flex justify-content-between">
                                            <span style="margin-top: 5px;">Patient List</span>
                                            <span class="th-count">
                                                <a href="{{ route('patients.create') }}"
                                                    class="btn btn-sm btn-outline-primary" style="background:inherit;"
                                                    title="Add Employee"><i class="fas fa-plus"
                                                        style="margin-right: 5px;"></i>Add New</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="Example"
                                    class="table custom-table dataTable no-footer table-striped table-bordered">
                                    <thead class="table-primary">
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
                                    <tbody>
                                        @foreach ($patients as $patient)
                                            <tr id="tr{{ $patient->id }}">
                                                <td>{{ $patient->registration_no }}</td>
                                                <td>{{ $patient->name }}</td>
                                                <td>{{ $patient->package->incomeSubCategory->name ?? '' }}</td>
                                                <td>{{ $patient->contact_no ?? '' }}</td>
                                                <td>{{ $patient->user->email ?? '' }}</td>
                                                <td>{{ $patient->password ?? '' }}</td>
                                                <td>{{ $patient->status ?? '' }}</td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a class="btn btn-outline-warning" style="background:inherit"
                                                                title="Edit"
                                                                href="{{ route('patients.edit', $patient->id) }}"><i
                                                                    class="fas fa-edit text-warning"></i></a>
                                                            <a onclick="editPlan({{ $patient->id }})"
                                                                class="btn btn-outline-success" style="background:inherit"
                                                                title="Plan and Status"><i
                                                                    class="fas fa-user-tag text-success"></i></a>

                                                            <form action="{{ route('employee.destroy', $patient->id) }}"
                                                                method="POST" style="display: inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-outline-danger"
                                                                    style="background:inherit" title="Delete"
                                                                    onclick="deleteData(event)" type="submit"><i
                                                                        class="fas fa-trash text-danger"></i></button>
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

    <div class="dataModal"></div>
@endsection


@section('script')
    <script type="text/javascript">
        function editPlan(id) {
            var url = "{{ route('patient.plan.and.statu.edit') }}"
            //get data by ajax
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    id: id
                },
                success: function(response) {
                    $('.dataModal').html(response);
                    $('#dataModal').modal('show');
                }
            });
        }

        function deleteData(e) {
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
