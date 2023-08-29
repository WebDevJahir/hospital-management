@php
    $is_old = old() ? true : false;
    $form_heading = !empty($patient->id) ? 'Update' : 'Add';
    $form_url = !empty($patient->id) ? route('patient.update', $patient->id) : route('patient.store');
    $form_method = !empty($patient->id) ? 'PUT' : 'POST';
    $package_id = !empty($patient->id) ? $patient->package_id : $package->id;
    $package_name = !empty($patient->id) ? $patient->package->incomeSubCategory->name : $package->incomeSubCategory->name;
    $registration_no = !empty($patient->id) ? $patient->registration_no : '';
    $name = !empty($patient->id) ? $patient->name : '';
    $password = !empty($patient->id) ? $patient->password : '';
    $confirm_password = !empty($patient->id) ? $patient->password : '';
    $email = !empty($patient->id) ? $patient->user->email : '';
    $contact_no = !empty($patient->id) ? $patient->contact_no : '';
    $age = !empty($patient->id) ? $patient->age : '';
    $gender = !empty($patient->id) ? $patient->gender : '';
    $district_id = !empty($patient->id) ? $patient->district_id : '';
    $police_station_id = !empty($patient->id) ? $patient->police_station_id : '';
    $present_address = !empty($patient->id) ? $patient->present_address : '';
    $permanent_address = !empty($patient->id) ? $patient->permanent_address : '';
@endphp
<form action="{{ $form_url }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if (!empty($patient->id))
        @method('PUT')
    @endif
    <div class="modal fade" id="dataModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">{{ $form_heading }} Patient</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="personal-information">
                        <div class="row gutters">
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text custom-group-text">Registration No</span>
                                        <input type="text" class="form-control" placeholder="Registration no"
                                            name="registration_no" value="{{ $registration_no ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text custom-group-text">Package</span>
                                        <input type="text" class="form-control" placeholder="Package" name="package"
                                            value="{{ $package_name ?? '' }}" readonly="">
                                        <input type="hidden" name="package_id" value="{{ $package_id }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text custom-group-text">Patient Name *</span>
                                        <input type="text" class="form-control" placeholder="name" name="name"
                                            value="{{ $name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text custom-group-text">Password *</span>
                                        <input type="text" class="form-control" placeholder="Password"
                                            name="password" id="password" value="{{ $password }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text custom-group-text">Confirm Password *</span>
                                        <input type="text" class="form-control" placeholder="Confirm Password"
                                            name="confirm_password" id="confirm_password"
                                            value="{{ $confirm_password }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text custom-group-text">Email</span>
                                        <input type="Email" class="form-control" value="{{ $email }}"
                                            placeholder="Email" name="email" id="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text custom-group-text">Mobile Number *</span>
                                        <input type="number" class="form-control" placeholder="Phone number"
                                            name="contact_no" id="contact_no" value="{{ $contact_no }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text custom-group-text">Age</span>
                                        <input type="number" class="form-control" name="age" id="age"
                                            placeholder="Age" value="{{ $age }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text custom-group-text">Gender</span>
                                        <select class="form-control" id="gender" name="gender">
                                            <option @if ($gender == 'Male') selected @endif value="Male">
                                                Male</option>
                                            <option @if ($gender == 'Female') selected @endif value="Female">
                                                Female</option>
                                            <option @if ($gender == 'Other') selected @endif value="Other">
                                                Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text custom-group-text">District*</span>
                                        <select class="form-control select2" id="district_id" name="district_id"
                                            data-width="90%" required="">
                                            <option selected value="">District</option>
                                            @foreach ($districts as $district)
                                                <option @if ($district_id == $district->id) selected @endif
                                                    value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text custom-group-text">Police Station*</span>
                                        <select class="form-control select2" id="police_station_id"
                                            name="police_station_id" data-width="90%" required="">
                                            <option selected value="">Select Police Station</option>
                                            @if ($police_stations->isNotEmpty())
                                                @foreach ($police_stations as $police_station)
                                                    <option @if ($police_station_id == $police_station->id) selected @endif
                                                        value="{{ $police_station->id }}">{{ $police_station->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text custom-group-text">Present Address</span>
                                        <input type="text" class="form-control" name="present_address"
                                            id="present_address" placeholder="Present Address"
                                            value="{{ $present_address }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text custom-group-text">Permanent Address</span>
                                        <input type="text" class="form-control" name="permanent_address"
                                            id="permanent_address" placeholder="Permanent Address"
                                            value="{{ $permanent_address }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-primary tn-lg"
                        type="submit">{{ $patient->id ? 'Update' : 'Save' }}</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    let police_stations = @json($police_stations);
    $('#district_id').on('change', function() {
        let district_id = $(this).val();
        $('#police_station_id').empty();
        $('#police_station_id').append(`<option value="">Select Police Station</option>`);
        police_stations.forEach(function(police_station) {
            if (police_station.district_id == district_id) {
                $('#police_station_id').append(
                    `<option value="${police_station.id}">${police_station.name}</option>`);
            }
        });
    });
</script>
