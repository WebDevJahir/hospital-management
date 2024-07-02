@extends('master.master')
@section('title', 'Death-certificate - Hospice Bangladesh')
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
                                            <span style="margin-top: 5px;">Death Certificates</span>
                                            <span class="th-count"><a href="{{ route('death-certificate.create') }}"
                                                    class="btn btn-sm btn-info"
                                                    style="border-radius: 5px; margin-left:5px;">
                                                    <i class="fas fa-plus"></i> Add New
                                                </a>
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
                                            <th>Contact</th>
                                            <th>Issue Date</th>
                                            <th>Death Date</th>
                                            <th>Received By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($death_certificates as $death_certificate)
                                            <tr>
                                                <td>{{ $death_certificate->patient->registration_no }}</td>
                                                <td>{{ $death_certificate->patient->name }}</td>
                                                <td>{{ $death_certificate?->patient?->package?->name }}</td>
                                                <td>{{ $death_certificate->patient->contact_no }}</td>
                                                <td>{{ $death_certificate->issue_date }}</td>
                                                <td>{{ $death_certificate->death_date }}</td>
                                                <td>{{ $death_certificate->received_by }}</td>
                                                <td>
                                                    <nobr>
                                                        <a title="Edit"
                                                            href="{{ route('death-certificate.edit', $death_certificate->id) }}"
                                                            class="btn btn-outline-warning btn-sm"><i
                                                                class="fas fa-pen"></i></a>
                                                        <a title="View"
                                                            href="{{ route('death-certificate.show', $death_certificate->id) }}"
                                                            class="btn btn-outline-info btn-sm"><i
                                                                class="fas fa-eye"></i></a>
                                                        <form
                                                            action="{{ route('death-certificate.destroy', $death_certificate->id) }}"
                                                            method="POST" data-toggle="tooltip" title="Delete"
                                                            class="d-inline deleteData">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-sm delete"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
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

    <div class="dataModal"></div>
@endsection


@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#Example').DataTable({
            "order": []
        });
    });
@endsection
