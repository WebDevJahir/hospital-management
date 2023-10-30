@extends('master.master')
@section('title', 'Prescription - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_heading = $opd_patient_info->id ? 'Edit OPD Prescription' : 'Add OPD Prescription';
        $form_url = $opd_patient_info->id ? route('opd-prescription.update', $opd_patient_info->id) : route('opd-prescription.store');
        $form_method = $opd_patient_info->id ? 'PUT' : 'POST';
    @endphp
    <div class="main-container">
        <div class="content-wrapper">
            <div class="fixedBodyScroll">
                <form action="{{ $form_url }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method($form_method)
                    <div class="card" style="border: 1px #dddddd solid; box-shadow: inset 0px 0px 6px 0px $dddddd;">
                        <h5 class="card-header text-center"
                            style="background: #dee5f1; border-bottom: 1px solid #dddddd; color:black;padding:8px">
                            OPD Prescription Information</h5>
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Patient Name:</label>
                                        <div class="input-group">
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Patient Name" required
                                                value="{{ !empty($opd_patient_info->name) ? $opd_patient_info->name : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Select Doctor:</label>
                                        <div class="input-group">
                                            <select name="doctor_id" class="form-control select2" required>
                                                <option value="">Select Doctor</option>
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}"
                                                        @if (isset($opd_patient_info) && $opd_patient_info->doctor_id == $doctor->id) selected @endif>
                                                        {{ $doctor->doctor_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date:</label>
                                        <div class="input-group">
                                            <input type="date" name="date" id="opd_date_id" class="form-control"
                                                placeholder="Date"
                                                value="{{ isset($opd_patient_info) ? $opd_patient_info->date : date('Y-m-d') }}"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Time:</label>
                                        <div class="input-group">
                                            <input type="time" name="time" id="opd_time_id" class="form-control"
                                                placeholder="Time"
                                                value="{{ isset($opd_patient_info) ? $opd_patient_info->time : date('H:i') }}"
                                                required step="any">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Select Blood Group:</label>
                                        <div class="input-group">
                                            <select name="blood_group" class="form-control select2">
                                                <option value="">Select Blood Group</option>
                                                <option @if (isset($opd_patient_info) && $opd_patient_info->blood_group == 'A+') selected @endif value="A+">A+
                                                </option>
                                                <option @if (isset($opd_patient_info) && $opd_patient_info->blood_group == 'B+') selected @endif value="B+">
                                                    B+</option>
                                                <option @if (isset($opd_patient_info) && $opd_patient_info->blood_group == 'AB+') selected @endif value="AB+">AB+
                                                </option>
                                                <option @if (isset($opd_patient_info) && $opd_patient_info->blood_group == 'O+') selected @endif value="O+">O+
                                                </option>
                                                <option @if (isset($opd_patient_info) && $opd_patient_info->blood_group == 'A-') selected @endif value="A-">A-
                                                </option>
                                                <option @if (isset($opd_patient_info) && $opd_patient_info->blood_group == 'B-') selected @endif value="B-">B-
                                                </option>
                                                <option @if (isset($opd_patient_info) && $opd_patient_info->blood_group == 'AB-') selected @endif value="AB-">AB-
                                                </option>
                                                <option @if (isset($opd_patient_info) && $opd_patient_info->blood_group == 'O-') selected @endif value="O-">O-
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Age:</label>
                                        <div class="input-group">
                                            {{-- @php  $years = Carbon\Carbon::parse($patient->details->dob)->age; @endphp --}}
                                            <input type="text" name="age" class="form-control" placeholder="Age"
                                                value="{{ isset($opd_patient_info) ? $opd_patient_info->age : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Height:</label>
                                        <div class="input-group">
                                            <input type="text" name="height" class="form-control" placeholder="Height"
                                                value="{{ isset($opd_patient_info) ? $opd_patient_info->height : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Weight:</label>
                                        <div class="input-group">
                                            <input type="text" name="weight" class="form-control" placeholder="Weight"
                                                value="{{ isset($opd_patient_info) ? $opd_patient_info->weight : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gender:</label>
                                        <div class="input-group">
                                            <select name="gender" class="form-control" readonly>
                                                <option value="">Select Gender</option>
                                                <option @if (isset($opd_patient_info) && $opd_patient_info->gender == 'Male') selected @endif value="Male">
                                                    Male </option>
                                                <option @if (isset($opd_patient_info) && $opd_patient_info->gender == 'Female') selected @endif value="Female">
                                                    Female </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Contact No.:</label>
                                        <div class="input-group">
                                            <input type="text" name="contact_no" class="form-control"
                                                placeholder="Mobile No."
                                                value="{{ isset($opd_patient_info) ? $opd_patient_info->contact_no : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <div class="input-group">
                                            <input type="text" name="email" class="form-control"
                                                placeholder="Email"
                                                value="{{ isset($opd_patient_info) ? $opd_patient_info->email : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Visit No.:</label>
                                        <div class="input-group">
                                            {{-- @php$visit_no = App\OpdDetail::where('patient_id', $patient->id)->count(); @endphp --}}
                                            <input type="text" name="visit_no" class="form-control"
                                                placeholder="Visit No."
                                                value="{{ isset($opd_patient_info) ? $opd_patient_info->visit_no : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Referred By:</label>
                                        <div class="input-group">
                                            <input type="text" name="referred_by" class="form-control"
                                                placeholder="Referred By"
                                                value="{{ isset($opd_patient_info) ? $opd_patient_info->referred_by : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <div class="input-group">
                                            <input type="text" name="address" class="form-control"
                                                placeholder="Enter patient address"
                                                value="{{ isset($opd_patient_info) ? $opd_patient_info->address : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Diagnosis:</label>
                                        <div class="input-group">
                                            <input type="text" name="diagnosis" class="form-control"
                                                placeholder="Diagnosis"
                                                value="{{ isset($opd_patient_info) ? $opd_patient_info->diagnosis : '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-3 col-md-3">
                            <div class="card" style="border: 1px #dddddd solid;">
                                <h5 class="card-header text-center"
                                    style="background: #dee5f1; border-bottom: 1px solid #dddddd; color:black;padding:8px">
                                    Main Problems</h5>
                                <div class="card-body">
                                    <div class="row gutters">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>BP:</label>
                                                <div class="input-group">
                                                    <input type="text" name="bp" class="form-control"
                                                        placeholder="BP"
                                                        value="{{ !empty($opd_patient_info?->opdMainProblem) ? $opd_patient_info?->opdMainProblem->bp : '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Pulse:</label>
                                                <div class="input-group">
                                                    <input type="text" name="pulse" class="form-control"
                                                        placeholder="Pulse"
                                                        value="{{ !empty($opd_patient_info?->opdMainProblem) ? $opd_patient_info?->opdMainProblem->pulse : '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Temp:</label>
                                                <div class="input-group">
                                                    <input type="text" name="temp" class="form-control"
                                                        placeholder="Temp"
                                                        value="{{ !empty($opd_patient_info?->opdMainProblem) ? $opd_patient_info?->opdMainProblem->temp : '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>O<sub>2</sub>:</label>
                                                <div class="input-group">
                                                    <input type="text" name="o2saturation" class="form-control"
                                                        placeholder="O2"
                                                        value="{{ !empty($opd_patient_info?->opdMainProblem) ? $opd_patient_info?->opdMainProblem->o2saturation : '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Pain:</label>
                                                <div class="input-group">
                                                    <input type="text" name="pain" class="form-control"
                                                        placeholder="Pain"
                                                        value="{{ !empty($opd_patient_info?->opdMainProblem) ? $opd_patient_info?->opdMainProblem->pain : '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group m-0">
                                                <label>What have been your main problems?</label>
                                                <div class="input-group">
                                                    <textarea name="main_problems" id="main_problems_id" class="form-control" style="width:100%"> {{ !empty($opd_patient_info?->opdMainProblem) ? $opd_patient_info?->opdMainProblem->main_problems : '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6" style="max-height: 400px !important">
                            <div class="card" style="border: 1px solid #dddddd;">
                                <h5 class="card-header text-center"
                                    style="background: #dee5f1; border-bottom: 1px solid #dddddd; color:black;padding:8px">
                                    Prescription
                                </h5>
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text custom-group-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                                        <path
                                                            d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z" />
                                                    </svg>
                                                </span>
                                                <input list="medicines" type="text" name="medicine" id="medicine"
                                                    class="form-control">
                                                <datalist id="medicines">
                                                    @foreach ($medicines as $medicine)
                                                        <option>{{ $medicine->name }}</option>
                                                    @endforeach
                                                </datalist>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text custom-group-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-card-checklist"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                        <path
                                                            d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                                    </svg>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Note"
                                                    id="note" name="note" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text custom-group-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                                        <path
                                                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                                    </svg>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Dose"
                                                    id="dose" name="dose" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text custom-group-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
                                                        <path
                                                            d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                                                    </svg>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Duration"
                                                    id="duration" name="duration" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary text-center" type="button"
                                                id="addMedicine">Add</button>
                                        </div>
                                    </div>
                                    <hr />
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Medicine</th>
                                                <th>Note</th>
                                                <th>Dose</th>
                                                <th>Duration</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="medicineTable">
                                            @if (isset($opd_patient_info))
                                                @foreach ($opd_patient_info->opdPrescription as $prescription)
                                                    <tr>
                                                        <td colspan="2">
                                                            <input type="text" name="medicine[]"
                                                                value="{{ $prescription->medicine }}"
                                                                class="form-control" readonly>
                                                            <input type="hidden" name="opd_prescription_id[]"
                                                                value="{{ $prescription->id }}">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="note[]"
                                                                value="{{ $prescription->note }}" class="form-control"
                                                                readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="dose[]"
                                                                value="{{ $prescription->dose }}" class="form-control"
                                                                readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="duration[]"
                                                                value="{{ $prescription->duration }}"
                                                                class="form-control" readonly>
                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                class="btn btn-outline-danger btn-sm removeMedicine">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 col-md-3">
                            <div class="card" style="border: 1px solid #dddddd;">
                                <h5 class="card-header text-center"
                                    style="background: #dee5f1; border-bottom: 1px solid #dddddd; color:black;padding:8px">
                                    Next Plan</h5>
                                <div class="card-body row pb-2 pt-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Next Visit Date:</label>
                                            <div class="input-group">
                                                <input type="date" name="next_visit_date" id="visit_date_id"
                                                    class="form-control"
                                                    value="{{ isset($opd_patient_info) ? $opd_patient_info->opdNextPlan->next_visit_date : '' }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Investigation:</label>
                                            <div class="input-group">
                                                <input type="text" name="investigation" id="investigation"
                                                    class="form-control" placeholder="Enter Investigation"
                                                    value="{{ isset($opd_patient_info) ? $opd_patient_info->opdNextPlan->investigation : '' }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border: 1px solid #dddddd;">
                                <h5 class="card-header text-center"
                                    style="background: #dee5f1; border-bottom: 1px solid #dddddd; color:black;padding:8px">
                                    Advice</h5>
                                <div class="card-body">
                                    <label>Advice:</label>
                                    <div class="form-group" id="AdviceRow" rel="1">
                                        <div class="input-group adviceDiv">
                                            <textarea name="advice" id="advice" class="form-control" style="width:100%">
                                                {{ isset($opd_patient_info) ? $opd_patient_info->opdAdvice->advice : '' }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="deleted_prescription_id" id="deleted_prescription_id"
                                value="">
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button class="btn btn-block btn-primary text-center">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
    @include('monitoring::opd_prescription.js')
@endsection
