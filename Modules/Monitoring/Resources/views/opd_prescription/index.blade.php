@extends('master.master')
@section('title', 'Patient - Hospice Bangladesh')
@section('main_content')
    @parent
    <div class="main-container">
        <!-- Page employeeer start -->
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-container">
                            <div class="t-employeeer">
                                <div class="t-header">
                                    <div class="th-title">
                                        <div style="">
                                            <div class="d-flex justify-content-between">
                                                <span style="margin-top: 5px;">OPD Prescription Create</span>
                                                <span class="th-count"><a href="{{ route('opd-prescription.create') }}"
                                                        class="btn btn-sm btn-info"
                                                        style="border-radius: 5px; margin-left:5px;">
                                                        <i class="fas fa-plus"></i> Add New
                                                    </a>
                                                </span>
                                            </div>
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
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($opd_patients as $opd_patient)
                                            <tr>
                                                <td>{{ $opd_patient->patient_name }}</td>
                                                <td>{{ $opd_patient->gender }}</td>
                                                <td>{{ $opd_patient->email }}</td>
                                                <td>{{ $opd_patient->date }}</td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a href="{{ route('opd-prescription.edit', $opd_patient->id) }}"
                                                                class="btn btn-outline-info btn-sm edit"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <a href="{{ route('opd-prescription.show', $opd_patient->id) }}"
                                                                class="btn btn-outline-success btn-sm"><i
                                                                    class="fas fa-eye"></i></a>
                                                            <form
                                                                action="{{ route('opd-prescription.destroy', $opd_patient->id) }}"
                                                                method="POST" class="d-inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-outline-danger btn-sm delete"><i
                                                                        class="fas fa-trash-alt"></i></button>
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
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#Example').DataTable();
        });
    </script>
@endsection
