@extends('master.master')
@section('title', 'Patient - Hospice Bangladesh')
@section('main_content')
    @parent

    <div class="main-container">
        <!-- Page header start -->
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">
                <!-- Row start -->

                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-container">
                            <div class="t-header">Patients Wound Management list</div>
                            <hr />
                            <div class="table-responsive">
                                <table id="Example" class="table">
                                    <thead>
                                        <tr>
                                            <th>Reg No</th>
                                            <th>Full Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="patientTable">
                                        @foreach ($patients as $patient)
                                            <tr id="tr{{ $patient->id }}">
                                                <td>{{ $patient->registration_no }}</td>
                                                <td id="name{{ $patient->id }}">{{ $patient->name }}</td>
                                                <td id="phone{{ $patient->id }}">{{ $patient->contact_no }}</td>
                                                <td>{{ $patient->user->email }}</td>
                                                <td>{{ $patient->status }}</td>
                                                <td>
                                                    <nobr>
                                                        <button onclick="addWoundManagement({{ $patient->id }})"
                                                            class="btn btn-sm edit" type="button">
                                                            <i class="fas fa-plus text-success"></i>
                                                        </button>
                                                        <button onclick="getWoundManagementList({{ $patient->id }})"
                                                            class="btn btn-sm edit" type="button">
                                                            <i class="fas fa-eye text-success"></i>
                                                        </button>
                                                    </nobr>
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
    <div id="dataModal"></div>
@endsection
@section('script')
    <script type="text/javascript">
        $('#Example').DataTable({
            "order": []
        });

        function addWoundManagement(patient_id) {
            $('#dataModal').html(null);
            let url = '{{ route('wound-management.create') }}';
            $.get(url, {
                patient_id: patient_id
            }, function(data) {
                $('#dataModal').html(data);
                $('#woundManagementModal').modal('show');
            });
        }

        function getWoundManagementList(patient_id) {

            $('#modal-body').html(null);
            let url = '{{ route('wound-management-list') }}';
            $.get(url, {
                patient_id: patient_id
            }, function(data) {
                $('#dataModal').html(data);
                $('#WoundManagementListModal').modal('show');
            });
        }

        function editWoundManagement(id) {
            loaderShow();
            $('#dataModal').html(null);
            $('#WoundManagementListModal').modal('hide');
            let url = '{{ route('wound-management.edit', ':id') }}';
            url = url.replace(':id', id);
            $.get(url, function(data) {
                loaderHide();
                $('#dataModal').html(data);
                $('#woundManagementModal').modal('show');
            });
        }
    </script>
@endsection
