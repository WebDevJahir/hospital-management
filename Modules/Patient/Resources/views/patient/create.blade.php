@extends('master.master')
@section('title', 'Patient Add - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $is_old = old() ? true : false;
        $form_heading = isset($patient->id) ? 'Update' : 'Create';
        $form_url = isset($patient->id) ? route('patients.update', $patient->id) : route('patients.store');
        $form_method = isset($patient->id) ? 'PUT' : 'POST';
        $registration_no = isset($patient->id) ? $patient->registration_no : '';
        $name = isset($patient->id) ? $patient->name : '';
        $password = isset($patient->id) ? $patient->text_password : '';
        $confirm_password = isset($patient->id) ? $patient->text_password : '';
        $email = isset($patient->id) ? $patient->user->email : '';
        $contact_no = isset($patient->id) ? $patient->contact_no : '';
        $age = isset($patient->id) ? $patient->age : '';
        $gender = isset($patient->id) ? $patient->gender : '';
        $district_id = isset($patient->id) ? $patient->district_id : '';
        $police_station_id = isset($patient->id) ? $patient->police_station_id : '';
        $present_address = isset($patient->id) ? $patient->present_address : '';
        $permanent_address = isset($patient->id) ? $patient->permanent_address : '';
    @endphp
    <div class="main-container">
        <!-- Page header start -->
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
                                            <span style="margin-top: 5px;">Patient {{ $form_heading }}</span>
                                            <span class="th-count">
                                                <a href="{{ route('patients.index') }}" class="btn btn-sm btn-primary"
                                                    title="Employee List"><i class="fas fa-list"
                                                        style="margin-right: 5px;"></i>Patient List</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="section">
                                    <form action="{{ $form_url }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if (!empty($patient->id))
                                            @method('PUT')
                                        @endif
                                        <div class="personal-information">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Name<span
                                                                class="text-danger">*</span></div>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="name"
                                                                name="name" value="{{ $name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Password<span
                                                                class="text-danger">*</span></div>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Password" name="password" id="password"
                                                                value="{{ $password }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Confirm Password<span
                                                                class="text-danger">*</span></div>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Confirm Password" name="confirm_password"
                                                                id="confirm_password" value="{{ $confirm_password }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Email<span
                                                                class="text-danger">*</span></div>
                                                        <div class="input-group">
                                                            <input type="Email" class="form-control"
                                                                value="{{ $email }}" placeholder="Email"
                                                                name="email" id="email" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Contact No<span
                                                                class="text-danger">*</span></div>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $contact_no }}" placeholder="Contact No"
                                                                name="contact_no" id="contact_no" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Gender<span
                                                                class="text-danger">*</span></div>
                                                        <div class="input-group">
                                                            <select class="form-control" id="gender" name="gender">
                                                                <option @if ($gender == 'Male') selected @endif
                                                                    value="Male">
                                                                    Male</option>
                                                                <option @if ($gender == 'Female') selected @endif
                                                                    value="Female">
                                                                    Female</option>
                                                                <option @if ($gender == 'Other') selected @endif
                                                                    value="Other">
                                                                    Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">District<span
                                                                class="text-danger">*</span></div>
                                                        <div class="input-group">
                                                            <select class="form-control select2" id="district_id"
                                                                name="district_id" required="">
                                                                <option selected value="">District</option>
                                                                @foreach ($districts as $district)
                                                                    <option
                                                                        @if ($district_id == $district->id) selected @endif
                                                                        value="{{ $district->id }}">{{ $district->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Police Station<span
                                                                class="text-danger">*</span></div>
                                                        <div class="input-group">
                                                            <select class="form-control select2" id="police_station_id"
                                                                name="police_station_id" required="">
                                                                <option selected value="">Select Police Station
                                                                </option>
                                                                @if ($police_stations->isNotEmpty())
                                                                    @foreach ($police_stations as $police_station)
                                                                        <option
                                                                            @if ($police_station_id == $police_station->id) selected @endif
                                                                            value="{{ $police_station->id }}">
                                                                            {{ $police_station->name }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Present Address<span
                                                                class="text-danger">*</span></div>
                                                        <div class="input-group">
                                                            <textarea class="form-control" name="present_address" id="present_address" placeholder="Present Address" required>{{ $present_address }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <div style="font-weight: bold;">Permanent Address</div>
                                                        <div class="input-group">
                                                            <textarea class="form-control" name="permanent_address" id="permanent_address" placeholder="Permanent Address">{{ $permanent_address }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
@endsection
@section('script')
    <script type="text/javascript">
        //submit form with ajax request for add and update
        $('form').submit(function(e) {
            e.preventDefault();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var form = $(this);
            var url = form.attr('action');
            var method = form.attr('method');
            var data = form.serialize();
            $.ajax({
                url: url,
                type: method,
                data: data,
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                },
                success: function(response) {
                    console.log(response.status);
                    if (response.status == 'created' || response.status ==
                        'updated') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Patient ' + response.status + ' successfully',
                        });
                        setTimeout(() => {
                            window.location.href = "{{ route('patients.index') }}";
                        }, 1000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    let message = '';
                    $.each(xhr.responseJSON.errors, function(key, item) {
                        $.each(item, function(key, value) {
                            message += value + '<br/>';
                        });
                    });
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: message,
                    });
                }
            });
        });
    </script>
@endsection
