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
                                <button type="button" class="btn-info btn-rounded" onclick="dataModal()">Add Patient</button>
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
                                                    {{-- @if (in_array(13, $permission)) --}}
                                                    <a href="{{ route('patient-profile-edit', $patient->id) }}"
                                                        class="btn btn-sm" style="background:inherit" title="View"><i
                                                            class="fas fa-edit text-success"></i>
                                                    </a>
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

    <div class="dataModal"></div>
@endsection


@section('script')

@endsection
