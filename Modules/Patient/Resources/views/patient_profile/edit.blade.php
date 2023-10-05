@extends('master.master')
@section('title', 'Patient - Hospice Bangladesh')
@section('main_content')
    <div class="main-container">
        <!-- Page employeeer start -->
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">
                <!-- Row start -->
                <form action="{{ route('patient-profile-update', $patient->id) }}" method="post">
                    @csrf
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div id="example-form">
                                <hr />
                                <h3>Personal Information</h3>
                                <section>
                                    <div class="row gutters">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="patient_name">Patient Name</label>
                                                <input type="text" class="form-control" placeholder="Patient name"
                                                    id="patient_name" name="patient_name"
                                                    value="{{ $patient->name ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input type="text" class="form-control" placeholder="Email"
                                                    id="email" name="email" value="{{ $patient->user->email ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">

                                                <label>Age *</label>
                                                <input type="text" class="form-control" placeholder="Age" id="age"
                                                    name="age" value="{{ $patient->age ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Phone *</label>
                                                <input type="text" class="form-control" placeholder="Phone number"
                                                    id="contact_no" name="contact_no" value="{{ $patient->phone ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Select Religion</label>
                                                <select name="religion" id="religion" class="form-control">
                                                    <option>Select Religion</option>
                                                    <option @if ($patient->patientDetail->religion == 'Islam') selected @endif
                                                        value="Islam">
                                                        Islam</option>
                                                    <option @if ($patient->patientDetail->religion == 'Hinduism') selected @endif
                                                        value="Hinduism">
                                                        Hinduism</option>
                                                    <option @if ($patient->patientDetail->religion == 'Cristianity') selected @endif
                                                        value="Cristianity">Cristianity</option>
                                                    <option @if ($patient->patientDetail->religion == 'Buddhism') selected @endif
                                                        value="Buddhism">
                                                        Buddhism</option>
                                                    <option @if ($patient->patientDetail->religion == 'Others') selected @endif
                                                        value="Others">
                                                        Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input type="date" class="form-control" placeholder="Date of Birth"
                                                    id="dob" name="dob" value="{{ $patient->dob ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Nationality</label>
                                                <input type="text" class="form-control" placeholder="Nationality"
                                                    id="nationality" name="nationality"
                                                    value="{{ $patient->nationality ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Present Address:</label>
                                                <input type="text" class="form-control" placeholder="Present Address"
                                                    id="present_address" name="present_address"
                                                    value="{{ $patient->present_address ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Permanent
                                                    Address:</label>
                                                <input type="text" class="form-control" placeholder="Permanent Address"
                                                    id="permanent_address" name="permanent_address"
                                                    value="{{ $patient->permanent_address ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Sex *</label>
                                                <select class="form-control" id="gender" name="gender">
                                                    <option @if ($patient->gender == 'Male') selected @endif
                                                        value="Male">
                                                        Male</option>
                                                    <option @if ($patient->gender == 'Female') selected @endif
                                                        value="Female">
                                                        Female</option>
                                                    <option @if ($patient->gender == 'Other') selected @endif
                                                        value="Other">
                                                        Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Blood Group</label>
                                                <select class="form-control" id="blood_group" name="blood_group">
                                                    <option value="">Select Blood Group</option>
                                                    <option @if ($patient->patientDetail->blood_group == 'A+') selected @endif
                                                        value="A+">A+
                                                    </option>
                                                    <option @if ($patient->patientDetail->blood_group == 'A-') selected @endif
                                                        value="A-">A-
                                                    </option>
                                                    <option @if ($patient->patientDetail->blood_group == 'B+') selected @endif
                                                        value="B+">
                                                        B+</option>
                                                    <option @if ($patient->patientDetail->blood_group == 'B-') selected @endif
                                                        value="B-">
                                                        B-</option>
                                                    <option @if ($patient->patientDetail->blood_group == 'O+') selected @endif
                                                        value="O+">
                                                        O+</option>
                                                    <option @if ($patient->patientDetail->blood_group == 'O-') selected @endif
                                                        value="O-">
                                                        O-</option>
                                                    <option @if ($patient->patientDetail->blood_group == 'AB+') selected @endif
                                                        value="AB+">
                                                        AB+</option>
                                                    <option @if ($patient->patientDetail->blood_group == 'AB-') selected @endif
                                                        value="AB-">
                                                        AB-</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Marital Status</label>
                                                <select class="form-control" id="marital_status" name="marital_status">
                                                    <option value="">Select Marital Status</option>
                                                    <option @if ($patient->patientDetail->marital_status == 'Married') selected @endif
                                                        value="Married">Married</option>
                                                    <option @if ($patient->patientDetail->marital_status == 'Single') selected @endif
                                                        value="Single">
                                                        Single</option>
                                                    <option @if ($patient->patientDetail->marital_status == 'Widow') selected @endif
                                                        value="Widow">
                                                        Widow</option>
                                                    <option @if ($patient->patientDetail->marital_status == 'Separated') selected @endif
                                                        value="Separated">Separated</option>
                                                    <option @if ($patient->patientDetail->marital_status == 'Divorced') selected @endif
                                                        value="Divorced">Divorced</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>NID/Passport
                                                    Number:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="NID No/Passport No" id="nid_passport"
                                                    name="nid_passport" value="{{ $patient->patientDetail->nid ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Occupation:</label>
                                                <input type="text" class="form-control" placeholder="Occupation"
                                                    id="occupation" name="occupation"
                                                    value="{{ $patient->patientDetail->occupation ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Doctor Contacting
                                                    Number:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Doctor Contact Number" id="doctor_contact_name"
                                                    name="doctor_contact_name"
                                                    value="{{ $patient->patientDetail->doctor_contact_name ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Key Family Contact
                                                    Person:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Key Family Contact Person" id="family_contact_person"
                                                    name="family_contact_person"
                                                    value="{{ $patient->PatiantDetail->family_contact_person ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Relation of Key Family
                                                    Contact Person:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Relation Of Key Family Contact Person"
                                                    id="contact_person_relation" name="contact_person_relation"
                                                    value="{{ $patient->patientDetail->contact_person_relation ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Key Family Contact
                                                    Person
                                                    Number:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Key Family Contact Person Number"
                                                    id="contact_person_number" name="contact_person_number"
                                                    value="{{ $patient->patientDetail->contact_person_number ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Total Family
                                                    Member</label>
                                                <input type="number" class="form-control"
                                                    placeholder="Total Family Member" id="family_member"
                                                    name="family_member"
                                                    value="{{ $patient->patientDetail->family_member }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Social Status:</label>
                                                <input type="text" class="form-control" placeholder="Social Status"
                                                    id="social_status" name="social_status"
                                                    value="{{ $patient->patientDetail->social_status }}">
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                        <input type="hidden" name="patient_id" id="patient_id"
                                            value="{{ $patient->id }}">
                                        <input type="hidden" name="patient_details_id" id="patient_details_id"
                                            value="{{ $patient->patientDetail->id ?? '' }}">
                                    </div>
                                </section>
                                <h3>Referral</h3>
                                <section>
                                    <div class="row gutters">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Hospital Name:</label>
                                                <input type="text" class="form-control" placeholder="Hospital Name"
                                                    id="hospital_name" name="hospital_name"
                                                    value="{{ $patient->patientReferral->hospital_name ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Referring Doctor
                                                    Name:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Referring Doctor Name" id="referring_doctor"
                                                    name="referring_doctor"
                                                    value="{{ $patient->patientReferral->doctor_name ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Agent Name:</label>
                                                <input type="text" class="form-control" placeholder="Agent Name"
                                                    id="agent_name" name="agent_name"
                                                    value="{{ $patient->agent_name }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Referring Patient Family’s Name:</label>
                                                <input type="number" class="form-control"
                                                    placeholder="Referring Patient Family’s Name" id="family_name"
                                                    name="family_name"
                                                    value="{{ $patient->patientReferral->family_name ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Where Know About Us:</label>
                                                <select class="form-control" id="know_about_us" name="know_about_us">
                                                    <option value="">Select Where to know</option>
                                                    <option @if ($patient->patientReferral->know_about_us == 'Website') selected @endif
                                                        value="Website">Website</option>
                                                    <option @if ($patient->patientReferral->know_about_us == 'Social Media') selected @endif
                                                        value="Social Media">Social Media</option>
                                                    <option @if ($patient->patientReferral->know_about_us == 'Patient') selected @endif
                                                        value="Patient">Patient Family's Member</option>
                                                    <option @if ($patient->patientReferral->know_about_us == 'Doctor') selected @endif
                                                        value="Doctor">Doctor</option>
                                                    <option @if ($patient->patientReferral->know_about_us == 'Advertising') selected @endif
                                                        value="Advertising">Advertising</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Consulting Doctor</label>
                                                @php
                                                    $consulting = explode(',', $patient->patientReferral->consulting_doctor);
                                                @endphp
                                                <select class="form-control select2" id="consulting_doctor"
                                                    name="consulting_doctor" multiple="multiple" data-width="100%">

                                                    @foreach ($doctors as $doctor)
                                                        <option @if (in_array($doctor->id, $consulting)) selected @endif
                                                            value="{{ $doctor->id }}">
                                                            {{ $doctor->doctor_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>Primary Diseases</h3>
                                <section>
                                    <div class="row gutters">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Primary diagnosis & co-morbidities:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Primary diagnosis & co-morbidities"
                                                    id="primary_diagnosis" name="primary_diagnosis"
                                                    value="{{ $patient->primaryDiseases->primary_diagnosis ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>How long is suffering:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="How long is suffering" id="suffering_time"
                                                    name="suffering_time"
                                                    value="{{ $patient->primaryDiseases->suffering_time ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Sites of metastases:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Sites of metastases" id="site_of_mitastases"
                                                    name="site_of_mitastases"
                                                    value="{{ $patient->primaryDiseases->site_of_mitastases ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                        <div class="col-4">
                                            <div class="form-group">

                                                <label>Present Condition:</label>
                                                <select class="form-control" id="present_condition"
                                                    name="present_condition">
                                                    <option value="">Present condition</option>
                                                    <option @if ($patient->primaryDiseases->present_condition == 'Stable') selected @endif
                                                        value="Stable">
                                                        Stable</option>
                                                    <option @if ($patient->primaryDiseases->present_condition == 'Deteriorating') selected @endif
                                                        value="Deteriorating">Deteriorating</option>
                                                    <option @if ($patient->primaryDiseases->present_condition == 'Others') selected @endif
                                                        value="Others">
                                                        Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">

                                                <label>Prognosis:</label>
                                                <select class="form-control" id="prognosis" name="prognosis">
                                                    <option value="">Prognosis</option>
                                                    <option @if ($patient->primaryDiseases->prognosis == '0-6 days') selected @endif
                                                        value="0-6 days">0-6 days</option>
                                                    <option @if ($patient->primaryDiseases->prognosis == '1-7 weeks') selected @endif
                                                        value="1-7 weeks">1-7 weeks</option>
                                                    <option @if ($patient->primaryDiseases->prognosis == '2-3 mts') selected @endif
                                                        value="2-3 mts">2-3 mts</option>
                                                    <option @if ($patient->primaryDiseases->prognosis == '4-6 mts') selected @endif
                                                        value="4-6 mts">4-6 mts</option>
                                                    <option @if ($patient->primaryDiseases->prognosis == '7-12 mts') selected @endif
                                                        value="7-12 mts">7-12 mts</option>
                                                    <option @if ($patient->primaryDiseases->prognosis == '12 mts') selected @endif
                                                        value="12 mts">
                                                        12 mts</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Food & medicine allergy
                                                    :</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Food & medicine allergy" name="allergy" id="allergy"
                                                    value="{{ $patient->primaryDiseases->allergy ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    @php
                                                        $referrals = explode(',', $patient->primaryDiseases->referrals);
                                                    @endphp
                                                    <div style="font-weight: bold;">Reason(s) for Referral:</div>
                                                    <input type="checkbox"
                                                        @if (in_array('Pain & symptoms control', $referrals)) checked @endif
                                                        style="margin-left:5px;margin-top: 3px; " name="referral[]"
                                                        value="Pain & symptoms control"><span
                                                        style="margin-left:10px">Pain &
                                                        symptoms control</span>
                                                    <input type="checkbox"
                                                        @if (in_array('Psychological support', $referrals)) checked @endif
                                                        style="margin-left:5px;margin-top: 3px; " name="referral[]"
                                                        value="Psychological support"><span
                                                        style="margin-left:10px">Psychological support</span>
                                                    <input type="checkbox"
                                                        @if (in_array('Drug Titration', $referrals)) checked @endif
                                                        style="margin-left:5px;margin-top: 3px; " name="referral[]"
                                                        value="Drug Titration"><span style="margin-left:10px">Drug
                                                        Titration</span>
                                                    <input type="checkbox"
                                                        @if (in_array('Shared care', $referrals)) checked @endif
                                                        style="margin-left:5px;margin-top: 3px; " name="referral[]"
                                                        value="Shared care"><span style="margin-left:10px">Shared
                                                        care</span>
                                                    <input type="checkbox"
                                                        @if (in_array('Long term care', $referrals)) checked @endif
                                                        style="margin-left:5px;margin-top: 3px; " name="referral[]"
                                                        value="Long term care"><span style="margin-left:10px">Long term
                                                        care</span>
                                                    <input type="checkbox"
                                                        @if (in_array('RPMS', $referrals)) checked @endif
                                                        style="margin-left:5px;margin-top: 3px; " name="referral[]"
                                                        value="RPMS"><span style="margin-left:10px">RPMS</span>
                                                    <input type="checkbox"
                                                        @if (in_array('Acute Care', $referrals)) checked @endif
                                                        style="margin-left:5px;margin-top: 3px; " name="referral[]"
                                                        value="Acute Care"><span style="margin-left:10px">Acute
                                                        Care</span>
                                                    <input type="checkbox"
                                                        @if (in_array('Others', $referrals)) checked @endif
                                                        onclick="referralOther()" id="referral_other_id"
                                                        style="margin-left:5px;margin-top: 3px; " value="Others"><span
                                                        style="margin-left:10px">Others</span>
                                                    <input type="text" name="other" id="ref_other"
                                                        value="{{ $patient->primaryDiseases->others }}"
                                                        placeholder="Others" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>Concern of diseases</h3>
                                <section>
                                    <div class="row gutters">
                                        <label>Concern of diseases</label>
                                        <table class="table table-striped">
                                            <tr>
                                                <th></th>
                                                <th>Yes</th>
                                                <th>No</th>
                                            </tr>
                                            <tr>
                                                <td>Has patient been informed of diagnosis</td>
                                                <td><input @if ($patient->concernDiseases->inform_diagnosis == 'Yes') checked @endif
                                                        type="radio" name="informdiagnosis" value="Yes"></td>
                                                <td><input @if ($patient->concernDiseases->inform_diagnosis == 'No') checked @endif
                                                        type="radio" name="informdiagnosis" value="No"></td>
                                            </tr>
                                            <tr>
                                                <td>Has patient been informed of prognosis</td>
                                                <td><input @if ($patient->concernDiseases->inform_prognosis == 'Yes') checked @endif
                                                        type="radio" name="informprognosis" value="Yes"></td>
                                                <td><input @if ($patient->concernDiseases->inform_prognosis == 'No') checked @endif
                                                        type="radio" name="informprognosis" value="No"></td>
                                            </tr>
                                            <tr>
                                                <td>Has family been informed of diagnosis</td>
                                                <td><input @if ($patient->concernDiseases->inform_diagnosis_family == 'Yes') checked @endif
                                                        type="radio" name="informdiagnosisfamily" value="Yes"></td>
                                                <td><input @if ($patient->concernDiseases->inform_diagnosis_family == 'No') checked @endif
                                                        type="radio" name="informdiagnosisfamily" value="No"></td>
                                            </tr>
                                            <tr>
                                                <td>Has family been informed of prognosis</td>
                                                <td><input @if ($patient->concernDiseases->inform_prognosis_family == 'Yes') checked @endif
                                                        type="radio" name="informprognosisfamily" value="Yes"></td>
                                                <td><input @if ($patient->concernDiseases->inform_prognosis_family == 'No') checked @endif
                                                        type="radio" name="informprognosisfamily" value="No"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </section>
                                <h3>Previous Treatment:</h3>
                                <section>
                                    <div class="row gutters">
                                        <div class="row gutters">
                                            <div class="col-6">
                                                <div class="form-group">

                                                    <label>Surgery
                                                        Name:</label>
                                                    <input type="text" class="form-control" placeholder="Surgery Name"
                                                        name="surgery_name" id="surgery_name"
                                                        value="{{ $patient->previousTreatment->surgery_name ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">

                                                    <span class="input-group-text custom-group-text">Date:</span>
                                                    <input type="text" class="form-control" placeholder="Date"
                                                        name="surgery_date" id="surgery_date"
                                                        value="{{ $patient->previousTreatment->surgery_date ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label style="font-weight: bold;">Chemotherapy :</label><br>
                                                        <input type="radio"
                                                            @if ($patient->previousTreatment->chemotherapy == 'Yes') checked @endif
                                                            style="margin-left: 10px;margin-top: 3px;" name="chemotherapy"
                                                            value="Yes"><span style="margin-left:10px">Yes</span>
                                                        <input type="radio"
                                                            @if ($patient->previousTreatment->chemotherapy == 'No') checked @endif
                                                            style="margin-left: 10px;margin-top: 3px;" name="chemotherapy"
                                                            value="No"><span style="margin-left:10px">No</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label style="font-weight: bold;">Radiotherapy :</label><br>
                                                        <input type="radio"
                                                            @if ($patient->previousTreatment->radiotherapy == 'Yes') checked @endif
                                                            style="margin-left: 10px;margin-top: 3px;" name="radiotherapy"
                                                            value="Yes"><span style="margin-left:10px">Yes</span>
                                                        <input type="radio"
                                                            @if ($patient->previousTreatment->radiotherapy == 'No') checked @endif
                                                            style="margin-left: 10px;margin-top: 3px;" name="radiotherapy"
                                                            value="No"><span style="margin-left:10px">No</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <caption><strong>Over the past three days, have any of these symptoms
                                                            affected you?</strong></caption><br>
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <th></th>
                                                            <th>0 Not at all</th>
                                                            <th>1 Slightly</th>
                                                            <th>2 Moderately</th>
                                                            <th>3 Severely</th>
                                                            <th>4 Overwhelmingly</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Pain</td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->pain == '0 Not at all') checked @endif
                                                                    name="symptomspain" value="0 Not at all"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->pain == '1 Slightly') checked @endif
                                                                    name="symptomspain" value="1 Slightly"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->pain == '2 Moderately') checked @endif
                                                                    name="symptomspain" value="2 Moderately"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->pain == '3 Severely') checked @endif
                                                                    name="symptomspain" value="3 Severely"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->pain == '4 Overwhelmingly') checked @endif
                                                                    name="symptomspain" value="4 Overwhelmingly"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shortness of breath</td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->short_to_breath == '0 Not at all') checked @endif
                                                                    name="symptomsshortofbreath" value="0 Not at all">
                                                            </td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->short_to_breath == '1 Slightly') checked @endif
                                                                    name="symptomsshortofbreath" value="1 Slightly"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->short_to_breath == '2 Moderately') checked @endif
                                                                    name="symptomsshortofbreath" value="2 Moderately">
                                                            </td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->short_to_breath == '3 Severely') checked @endif
                                                                    name="symptomsshortofbreath" value="3 Severely"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->short_to_breath == '4 Overwhelmingly') checked @endif
                                                                    name="symptomsshortofbreath" value="4 Overwhelmingly">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Weakness or lack of energy</td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->lack_of_weakness == '0 Not at all') checked @endif
                                                                    name="symptomsweaknessenergy" value="0 Not at all">
                                                            </td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->lack_of_weakness == '1 Slightly') checked @endif
                                                                    name="symptomsweaknessenergy" value="1 Slightly"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->lack_of_weakness == '2 Moderately') checked @endif
                                                                    name="symptomsweaknessenergy" value="2 Moderately">
                                                            </td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->lack_of_weakness == '3 Severely') checked @endif
                                                                    name="symptomsweaknessenergy" value="3 Severely"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->lack_of_weakness == '4 Overwhelmingly') checked @endif
                                                                    name="symptomsweaknessenergy"
                                                                    value="4 Overwhelmingly">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nausea (feeling like you are going to be sick)</td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->nausea == '0 Not at all') checked @endif
                                                                    name="symptomsnausea" value="0 Not at all"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->nausea == '1 Slightly') checked @endif
                                                                    name="symptomsnausea" value="1 Slightly"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->nausea == '2 Moderately') checked @endif
                                                                    name="symptomsnausea" value="2 Moderately"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->nausea == '3 Severely') checked @endif
                                                                    name="symptomsnausea" value="3 Severely"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->nausea == '4 Overwhelmingly') checked @endif
                                                                    name="symptomsnausea" value="4 Overwhelmingly"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Vomiting (being sick)</td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->vomiting == '0 Not at all') checked @endif
                                                                    name="symptomsvomiting" value="0 Not at all"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->vomiting == '1 Slightly') checked @endif
                                                                    name="symptomsvomiting" value="1 Slightly"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->vomiting == '2 Moderately') checked @endif
                                                                    name="symptomsvomiting" value="2 Moderately"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->vomiting == '3 Severely') checked @endif
                                                                    name="symptomsvomiting" value="3 Severely"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->vomiting == '4 Overwhelmingly') checked @endif
                                                                    name="symptomsvomiting" value="4 Overwhelmingly"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Poor appetite</td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->appetite == '0 Not at all') checked @endif
                                                                    name="symptomsappetite" value="0 Not at all"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->appetite == '1 Slightly') checked @endif
                                                                    name="symptomsappetite" value="1 Slightly"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->appetite == '2 Moderately') checked @endif
                                                                    name="symptomsappetite" value="2 Moderately"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->appetite == '3 Severely') checked @endif
                                                                    name="symptomsappetite" value="3 Severely"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->appetite == '4 Overwhelmingly') checked @endif
                                                                    name="symptomsappetite" value="4 Overwhelmingly"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Constipation</td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->constipation == '0 Not at all') checked @endif
                                                                    name="symptomsconstipation" value="0 Not at all"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->constipation == '1 Slightly') checked @endif
                                                                    name="symptomsconstipation" value="1 Slightly"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->constipation == '2 Moderately') checked @endif
                                                                    name="symptomsconstipation" value="2 Moderately"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->constipation == '3 Severely') checked @endif
                                                                    name="symptomsconstipation" value="3 Severely"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->constipation == '4 Overwhelmingly') checked @endif
                                                                    name="symptomsconstipation" value="4 Overwhelmingly">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sore of dry mouth</td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->dry_mouth == '0 Not at all') checked @endif
                                                                    name="symptomsdrymouth" value="0 Not at all"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->dry_mouth == '1 Slightly') checked @endif
                                                                    name="symptomsdrymouth" value="1 Slightly"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->dry_mouth == '2 Moderately') checked @endif
                                                                    name="symptomsdrymouth" value="2 Moderately"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->dry_mouth == '3 Severely') checked @endif
                                                                    name="symptomsdrymouth" value="3 Severely"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->dry_mouth == '4 Overwhelmingly') checked @endif
                                                                    name="symptomsdrymouth" value="4 Overwhelmingly"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Drowsiness</td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->drowsiness == '0 Not at all') checked @endif
                                                                    name="symptomsdrowsiness" value="0 Not at all"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->drowsiness == '1 Slightly') checked @endif
                                                                    name="symptomsdrowsiness" value="1 Slightly"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->drowsiness == '2 Moderately') checked @endif
                                                                    name="symptomsdrowsiness" value="2 Moderately"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->drowsiness == '3 Severely') checked @endif
                                                                    name="symptomsdrowsiness" value="3 Severely"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->drowsiness == '4 Overwhelmingly') checked @endif
                                                                    name="symptomsdrowsiness" value="4 Overwhelmingly">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Poor morbility</td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->morbility == '0 Not at all') checked @endif
                                                                    name="symptomsmorbility" value="0 Not at all"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->morbility == '1 Slightly') checked @endif
                                                                    name="symptomsmorbility" value="1 Slightly"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->morbility == '2 Moderately') checked @endif
                                                                    name="symptomsmorbility" value="2 Moderately"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->morbility == '3 Severely') checked @endif
                                                                    name="symptomsmorbility" value="3 Severely"></td>
                                                            <td><input type="radio"
                                                                    @if ($patient->previousTreatment->morbility == '4 Overwhelmingly') checked @endif
                                                                    name="symptomsmorbility" value="4 Overwhelmingly">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>Functional Status</h3>
                                <section>
                                    <div class="row gutters">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="">Mental status :</label>
                                                <input type="radio" @if ($patient->functionStatus->metal_status == 'Alert') checked @endif
                                                    style="margin-left: 5px;margin-top: 3px;" name="Metalstaus"
                                                    id="Metalstaus" value="Alert"><span
                                                    style="margin:0px 20px 0px 2px">Alert</span>
                                                <input type="radio" @if ($patient->functionStatus->metal_status == 'Drowsy') checked @endif
                                                    style="margin-left: 5px;margin-top: 3px;" name="Metalstaus"
                                                    id="Metalstaus" value="Drowsy"><span
                                                    style="margin:0px 20px 0px 2px">Drowsy</span>
                                                <input type="radio" @if ($patient->functionStatus->metal_status == 'Comatose') checked @endif
                                                    style="margin-left: 5px;margin-top: 3px;" name="Metalstaus"
                                                    id="Metalstaus" value="Comatose"><span
                                                    style="margin:0px 20px 0px 2px">Comatose</span>
                                                <input type="radio" @if ($patient->functionStatus->metal_status == 'Oriented') checked @endif
                                                    style="margin-left: 5px;margin-top: 3px;" name="Metalstaus"
                                                    vid="Metalstaus" value="Oriented"><span
                                                    style="margin:0px 20px 0px 2px">Oriented</span>
                                                <input type="radio" @if ($patient->functionStatus->metal_status == 'Confused') checked @endif
                                                    style="margin-left: 5px;margin-top: 3px;" name="Metalstaus"
                                                    id="Metalstaus" value="Confused"><span
                                                    style="margin:0px 20px 0px 2px">Confused</span>
                                                <input type="radio" @if ($patient->functionStatus->metal_status == 'Demented') checked @endif
                                                    style="margin-left: 5px;margin-top: 3px;" name="Metalstaus"
                                                    id="Metalstaus" value="Demented"><span
                                                    style="margin:0px 20px 0px 2px">Demented</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="">Poor Morbility :</label>
                                                <input type="radio" @if ($patient->functionStatus->mobility == 'Independent') checked @endif
                                                    style="margin-left: 5px;margin-top: 3px;" name="Mobility"
                                                    value="Independent"><span
                                                    style="margin:0px 20px 0px 2px">Independent</span>
                                                <input type="radio" @if ($patient->functionStatus->mobility == 'Ambulant with supervision') checked @endif
                                                    style="margin-left: 5px;margin-top: 3px;" name="Mobility"
                                                    value="Ambulant with supervision"><span
                                                    style="margin:0px 20px 0px 2px">Ambulant with supervision</span>
                                                <input type="radio" @if ($patient->functionStatus->mobility == 'Ambulant with support') checked @endif
                                                    style="margin-left: 5px;margin-top: 3px;" name="Mobility"
                                                    value="Ambulant with support"><span
                                                    style="margin:0px 20px 0px 2px">Ambulant with support</span>
                                                <input type="radio" @if ($patient->functionStatus->mobility == 'Chair-bound') checked @endif
                                                    style="margin-left: 5px;margin-top: 3px;" name="Mobility"
                                                    value="Chair-bound"><span
                                                    style="margin:0px 20px 0px 2px">Chair-bound</span>
                                                <input type="radio" @if ($patient->functionStatus->mobility == 'Bed bound') checked @endif
                                                    style="margin-left: 5px;margin-top: 3px;" name="Mobility"
                                                    value="Bed bound"><span style="margin:0px 20px 0px 2px">Bed
                                                    bound</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="">Feeding :</label>
                                                <input type="radio" @if ($patient->functionStatus->feeding == 'Independent') checked @endif
                                                    style="margin-left: 5px;margin-top: 3px;" name="Feeding"
                                                    value="Independent"><span
                                                    style="margin:0px 20px 0px 2px">Independent</span>
                                                <input type="radio" @if ($patient->functionStatus->feeding == 'Needs supervision') checked @endif
                                                    style="margin-left: 5px;margin-top: 3px;" name="Feeding"
                                                    value="Needs supervision"><span style="margin:0px 20px 0px 2px">Needs
                                                    supervision</span>
                                                <input type="radio" @if ($patient->functionStatus->feeding == 'Partially dependent') checked @endif
                                                    style="margin-left: 5px;margin-top: 3px;" name="Feeding"
                                                    value="Partially dependent"><span
                                                    style="margin:0px 20px 0px 2px">Partially dependent</span>
                                                <input type="radio" @if ($patient->functionStatus->feeding == 'Totally dependent') checked @endif
                                                    style="margin-left: 5px;margin-top: 3px;" name="Feeding"
                                                    value="Totally dependent"><span
                                                    style="margin:0px 20px 0px 2px">Totally
                                                    dependent</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            $accessory = explode(',', $patient->functionStatus->medical_accessory); ?>
                                            <label class="">Medical accessory needed :</label> <input
                                                type="checkbox" class="" name="accessory[]"
                                                value="Feeding Tube"><span style="margin:0px 20px 0px 2px">Feeding
                                                Tube</span>
                                            <input type="checkbox" @if (in_array('Intranasal oxygen', $accessory)) checked @endif
                                                class="" name="accessory[]" value="Intranasal oxygen"><span
                                                style="margin:0px 20px 0px 2px">Intranasal oxygen</span>
                                            <input type="checkbox" @if (in_array('Cope loop', $accessory)) checked @endif
                                                class="" name="accessory[]" value="Cope loop"><span
                                                style="margin:0px 20px 0px 2px">Cope loop</span>
                                            <input type="checkbox" @if (in_array('Tracheostomy', $accessory)) checked @endif
                                                class="" name="accessory[]" value="Tracheostomy"><span
                                                style="margin:0px 20px 0px 2px">Tracheostomy</span>
                                            <input type="checkbox" @if (in_array('Urinary catheter', $accessory)) checked @endif
                                                class="" name="accessory[]" value="Urinary catheter"><span
                                                style="margin:0px 20px 0px 2px">Urinary catheter</span>
                                            <input type="checkbox" @if (in_array('Others', $accessory)) checked @endif
                                                class="" name="accessory[]" value="Others"
                                                id="medical_accessory_other"><span
                                                style="margin:0px 20px 0px 2px">Others</span>
                                            <input type="text" name="accessoryneeded_other"
                                                value="{{ $patient->functionStatus->others }}"
                                                id="accessory_other_detail" class="form-control"
                                                placeholder="Medical Accessory Other Details">
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <label class="">Previous medication name :</label>
                                                    <input
                                                        value="{{ $patient->functionStatus->previous_medication ?? '' }}"
                                                        type="text" class="form-control" id="previousmedication"
                                                        name="previousmedication" placeholder="Previous medication name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>Current Problem</h3>
                                <section>
                                    <div class="row gutters">
                                        <div class="col-12">
                                            <div class="form-group">
                                                @php $problems = explode(',', $patient->currentProblem->problem); @endphp
                                                <div class="col-md-12">
                                                    <div class="form-group" id="AdviceRow" rel="1">
                                                        <label>Current Problems:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text" id="basic-addon1"><span
                                                                        class="icon-list"></span></div>
                                                            </div>
                                                            <input type="text" name="current_problem[]"
                                                                class="form-control current_problem"
                                                                placeholder="Current Problems">
                                                            <div class="input-group-addon" onclick="addProblem()">
                                                                <div class="input-group-text" id="basic-addon1"><i
                                                                        style="color: green;cursor: pointer;"
                                                                        class="fas fa-plus"></i></div>
                                                                <input type="hidden" id="current_row" value="1">
                                                            </div>
                                                            <div id="breack"><br></div>
                                                            @if ($problems[0] != '')
                                                                @foreach ($problems as $key => $problem)
                                                                    <br>
                                                                    <div class="input-group"
                                                                        id="current_row_{{ $key }}">
                                                                        <div class="input-group-prepend"><span
                                                                                class="input-group-text"
                                                                                id="basic-addon1"><span
                                                                                    class="icon-list"></span></span></div>
                                                                        <input name="current_problem[]"
                                                                            id="current_problem({{ $key }})"
                                                                            class="form-control"
                                                                            value="{{ $problem }}">
                                                                        <div class="input-group-addon"
                                                                            onclick="removeRow({{ $key }})">
                                                                            <div class="input-group-text"
                                                                                id="basic-addon1"><i
                                                                                    style="color: red;cursor: pointer;"
                                                                                    class="fas fa-minus"></i></div>
                                                                        </div>
                                                                        <br>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        <div id="breack"><br></div>
                                                        <div class="input-group" id="current_row_">
                                                        </div>
                                                        <div id="breack"><br></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </section>
                            </div>
                            <!-- Table container end -->
                            <div class="text-center"><button class="btn btn-success btn-lg"
                                    style="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->
                </form>
            </div>
            <!-- Fixed body scroll end -->
        </div>
        <!-- Content wrapper end -->
    </div>
    <script src="assets/vendor/wizard/jquery.steps.custom.js"></script>
@endsection
@section('script')
    <script>
        function addProblem() {
            var nextRow = parseInt($('#current_row').val()) + 1;
            $('#current_row').val(nextRow);

            var addRow = `
        <div class="input-group" id="current_row_${nextRow}">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <span class="icon-list"></span>
                </span>
            </div>
            <input name="current_problem[]" id="current_problem" class="form-control">
            <div class="input-group-addon" onclick="removeRow(${nextRow})">
                <div class="input-group-text" id="basic-addon1">
                    <i style="color: red; cursor: pointer;" class="fas fa-minus"></i>
                </div>
            </div>
        </div>
        <div id="breack_${nextRow}"><br></div>
    `;

            $('#AdviceRow').append(addRow);
        }

        function removeRow(row) {
            if (confirm('Are you sure to delete?')) {
                $(`#current_row_${row}, #breack_${row}`).remove();
            }
        }
    </script>
@endsection
