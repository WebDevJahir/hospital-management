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
                            <div class="t-header">
                                <div class="th-title">
                                    <div style="">
                                        <div class="d-flex justify-content-between">
                                            <span style="margin-top: 5px;">Prescription Patient</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="tableOfData" class="table custom-table">
                                    <thead>
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
                                                    <a class="btn m-0 p-0 btn-sm" style="background:inherit"
                                                        title="Generate"
                                                        href="{{ route('prescription.create', $patient->id) }}"><i
                                                            style="font-size:18px;"
                                                            class="p-0 m-0 fas fa-prescription text-success"></i></a>
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
        function dataModal(id) {
            var url = id ? `/patient/patients/${id}/edit` : "{{ route('patients.create') }}";
            url = url.replace(':id', id);
            //get data by ajax
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    $('.dataModal').html(response);
                    $('#dataModal').modal('show');
                }
            });
        }

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
            $('#tableOfData').DataTable({
                "order": []
            });
        });
    </script>
@endsection
