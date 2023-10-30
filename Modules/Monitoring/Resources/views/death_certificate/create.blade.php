@extends('master.master')
@section('title', 'Investigation Category - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_heading = $death_certificate->id ? 'Edit Death Certificate' : 'Add Death Certificate';
        $form_url = $death_certificate->id ? route('death-certificate.update', $death_certificate->id) : route('death-certificate.store');
        $form_method = $death_certificate->id ? 'PUT' : 'POST';
    @endphp
    <div class="main-container">
        <div class="content-wrapper">
            <div class="fixedBodyScroll">
                <div class="row">
                    <div class="col-md-12">
                        <form class="" action="{{ $form_url }}" method="POST">
                            {{ method_field($form_method) }}
                            @csrf
                            <div class="table-container">
                                <div class="t-header mb-3">{{ $form_heading }}</div>
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <div class="row gutter">
                                                <div class="col-md-4 col-sm-12 col-6">
                                                    <label class="">Select Patient :</label>
                                                    <select name="patient_id" id="patient_id" class="form-control select2"
                                                        data-width="100%" required>
                                                        <option value="">Select Patient</option>
                                                        @foreach ($patients as $single_patient)
                                                            <option value="{{ $single_patient->id }}"
                                                                @if ($death_certificate && $death_certificate->patient_id == $single_patient->id) selected @endif>
                                                                {{ $single_patient->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Date of Issue :</label>
                                                        <input type="date" name="issue_date" id="issue_date_id"
                                                            class="form-control" placeholder="Date of Issue"
                                                            value="{{ $death_certificate ? $death_certificate->issue_date : '' }}">
                                                    </div>
                                                </div>
                                                {{-- @dd($patient) --}}
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Registration Date :</label>
                                                        <input type="date" id="registration_date"
                                                            name="registration_date" class="form-control"
                                                            placeholder="Enter From Date"
                                                            value="{{ $death_certificate ? $death_certificate->registration_date : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Registration No :</label>
                                                        <input type="number" id="registration_no" name="registration_no"
                                                            class="form-control" placeholder="Enter registration no"
                                                            value="{{ $death_certificate ? $death_certificate->patient->registration_no : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Date of Birth :</label>
                                                        <input type="date" name="date_of_birth" id="date_of_birth"
                                                            class="form-control" placeholder="Date of Birth"
                                                            value="{{ $death_certificate ? $death_certificate->date_of_birth : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Gender :</label>
                                                        <select class="form-control" name="gender" id="gender">
                                                            <option value="">Select Sex</option>
                                                            <option value="Male"
                                                                @if ($death_certificate && $death_certificate->gender == 'Male') selected @endif>Male
                                                            </option>
                                                            <option value="Female"
                                                                @if ($death_certificate && $death_certificate->gender == 'Female') selected @endif>Female
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Religion :</label>
                                                        <select class="form-control" name="religion" id="religion">
                                                            <option value="">Select Religion</option>
                                                            <option value="Islam"
                                                                @if ($death_certificate && $death_certificate->religion == 'Islam') selected @endif>
                                                                Muslim</option>
                                                            <option value="Hindu"
                                                                @if ($death_certificate && $death_certificate->religion == 'Hindu') selected @endif>
                                                                Hindu</option>
                                                            <option value="Christian"
                                                                @if ($death_certificate && $death_certificate->religion == 'Christian') selected @endif>
                                                                Christian</option>
                                                            <option value="Buddhist"
                                                                @if ($death_certificate && $death_certificate->religion == 'Buddhist') selected @endif>
                                                                Buddhist</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Nationality :</label>
                                                        <input type="text" name="nationality" id="nationality"
                                                            class="form-control" placeholder="Nationality"
                                                            value="{{ $death_certificate ? $death_certificate->nationality : '' }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Marital Status :</label>
                                                        <select class="form-control " name="marital_status"
                                                            id="marital_status">
                                                            <option value="" selected>Select Marital status</option>
                                                            <option @if ($death_certificate && $death_certificate->marital_status == 'Married') selected @endif
                                                                value="Married">Married</option>
                                                            <option @if ($death_certificate && $death_certificate->marital_status == 'Single') selected @endif
                                                                value="Single">Single</option>
                                                            <option @if ($death_certificate && $death_certificate->marital_status == 'Widow') selected @endif
                                                                value="Widow">Widow</option>
                                                            <option @if ($death_certificate && $death_certificate->marital_status == 'Separated') selected @endif
                                                                value="Separated">Separated</option>
                                                            <option @if ($death_certificate && $death_certificate->marital_status == 'Divorced') selected @endif
                                                                value="Divorced">Divorced</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">NID No./Passport No. :</label>
                                                        <input type="text" class="form-control" name="nid"
                                                            id="nid" placeholder="NID No./Passport No"
                                                            value="{{ $death_certificate ? $death_certificate->nid_passport : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="">Father’s/Spouse Name :</label>
                                                    <div class="row" style="margin: 0; padding: 0;">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="radio" name="fs_type" id="fs_type"
                                                                    value="Father"
                                                                    @if ($death_certificate && $death_certificate->fs_type == 'Father') checked @endif>Father
                                                                <input type="radio" name="fs_type" id="fs_type"
                                                                    value="Spouse"
                                                                    @if ($death_certificate && $death_certificate->fs_type == 'Spouse') checked @endif>Spouse
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    name="father_spouse_name" id="spouse_name"
                                                                    placeholder="Father’s/Spouse Name"
                                                                    value="{{ $death_certificate ? $death_certificate->father_spouse_name : '' }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Present Address (Include house, road,
                                                            sector
                                                            no. etc.) :</label>
                                                        <input type="text" class="form-control" name="present_address"
                                                            id="present_address" placeholder="Present Address"
                                                            value="{{ $death_certificate ? $death_certificate->present_address : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Permanent Address (Include house, road,
                                                            sector no. etc.) :</label>
                                                        <input type="text" class="form-control"
                                                            name="permanent_address" id="permanent_address"
                                                            placeholder="Permanent Address"
                                                            value="{{ $death_certificate ? $death_certificate->permanent_address : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Primary Diagnosis :</label>
                                                        <input type="text" name="primary_diagnosis"
                                                            id="primary_diagnosis" class="form-control"
                                                            placeholder="Primary Diagnosis"
                                                            value="{{ $death_certificate ? $death_certificate->primary_diagnosis : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Date of Death :</label>
                                                        <input type="date" name="death_date" id="death_date"
                                                            class="form-control" placeholder="Date of Death"
                                                            value="{{ $death_certificate ? $death_certificate->death_date : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Place of Death :</label>
                                                        <select name="death_place" id="death_place" class="form-control"
                                                            required>
                                                            <option value="">Select Place of Death</option>
                                                            <option value="Present Address"
                                                                @if ($death_certificate && $death_certificate->death_place == 'Present Address') selected @endif>
                                                                Present Address</option>
                                                            <option value="Permanent Address"
                                                                @if ($death_certificate && $death_certificate->death_place == 'Permanent Address') selected @endif>
                                                                Permanent Address</option>
                                                            <option value="Other"
                                                                @if ($death_certificate && $death_certificate->death_place == 'Other') selected @endif>
                                                                Other</option>
                                                        </select>
                                                        <input type="hidden" id="other_place" name="other_place"
                                                            class="form-control" placeholder="Other Place">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Cause of Death :</label>
                                                        <input type="text" name="death_cause" class="form-control"
                                                            placeholder="Cause of Death"
                                                            value="{{ $death_certificate ? $death_certificate->death_cause : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Time of Death :</label>
                                                        <input type="time" name="death_time" id="death_time"
                                                            class="form-control" placeholder="Time of Death"
                                                            value="{{ $death_certificate ? $death_certificate->death_time : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Received By :</label>
                                                        <input type="text" name="received_by" class="form-control"
                                                            placeholder="Received By"
                                                            value="{{ $death_certificate ? $death_certificate->received_by : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Relation :</label>
                                                        <input type="text" name="relation" class="form-control"
                                                            placeholder="relation"
                                                            value="{{ $death_certificate ? $death_certificate->relation : '' }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="">Certified By Doctor :</label>
                                                        <select name="doctor_id" class="form-control select2"
                                                            data-width="100%">
                                                            <option value="">Select Doctor Name</option>
                                                            @foreach ($doctors as $doctor)
                                                                <option value="{{ $doctor->id }}"
                                                                    @if ($death_certificate && $death_certificate->doctor_id == $doctor->id) selected @endif>
                                                                    {{ $doctor->doctor_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="box-footer">
                                    <div class="col-md-12 text-center">
                                        <div class="">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let patients = {!! $patients !!}

        $('#patient_id').change(function() {
            let patient_id = $(this).val();
            let patient = patients.find(patient => patient.id == patient_id);
            console.log(patient);
            var dateOfBirth = new Date(patient.date_of_birth);
            var registrationDate = new Date(patient.created_at);
            $('#date_of_birth').val(dateOfBirth.toISOString().split('T')[0]);
            $('#registration_date').val(registrationDate.toISOString().split('T')[0]);
            $('#registration_no').val(patient.registration_no);
            $('#gender').val(patient.gender)
            $('#religion').val(patient.patient_detail.religion)
            $('#nationality').val(patient.patient_detail.nationality)
            $('#marital_status').val(patient.patient_detail.marital_status)
            $('#nid').val(patient.patient_detail.nid_passport)
            $('#present_address').val(patient.present_address)
            $('#permanent_address').val(patient.permanent_address)
            $('#primary_diagnosis').val(patient.primary_diseases.primary_diagnosis)
        })
    </script>
@endsection
