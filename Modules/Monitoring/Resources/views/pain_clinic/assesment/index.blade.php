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
                <div id="loader-container" class="loader-container" style="display: none;">
                    <div class="loader"></div>
                </div>
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-container">
                            <div class="t-header">Patients Pain Asseessment list</div>
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
                                                        <button onclick="addPainAsmt({{ $patient->id }})"
                                                            class="btn btn-sm edit" type="button">
                                                            <i class="fas fa-plus text-success"></i>
                                                        </button>
                                                        <button onclick="getPainAsmtReport({{ $patient->id }})"
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

        function loaderShow() {
            $("#loader-container").show();
            $("#content").css("pointer-events", "none");
        }

        function loaderHide() {
            $("#loader-container").hide();
            $("#content").css("pointer-events", "auto");
        }

        function addPainAsmt(patient_id) {
            $('#dataModal').html(null);
            let url = '{{ route('pain-assesment.create') }}';
            $.get(url, {
                patient_id: patient_id
            }, function(data) {
                $('#dataModal').html(data);
                $('#painAsmtModal').modal('show');
            });
        }

        function getPainAsmtReport(patient_id) {

            $('#modal-body').html(null);
            let url = '{{ route('pain-assesment-list') }}';
            $.get(url, {
                patient_id: patient_id
            }, function(data) {
                $('#dataModal').html(data);
                $('#painAsmtListModal').modal('show');
            });
        }

        function editPainAsmt(id) {
            loaderShow();
            $('#dataModal').html(null);
            $('#painAsmtListModal').modal('hide');
            let url = '{{ route('pain-assesment.edit', ':id') }}';
            url = url.replace(':id', id);
            $.get(url, function(data) {
                loaderHide();
                $('#dataModal').html(data);
                $('#painAsmtModal').modal('show');
            });
        }
    </script>
@endsection
