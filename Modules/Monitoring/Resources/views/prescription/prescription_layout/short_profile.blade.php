<div class="col-4">
    <div class="prescription" style="border: 2px solid #e1e4f4;padding: 10px;">
        <div class="card m-0">
            <div class="card-header" style="background:#dee5f1;padding:.3rem 1.25rem .1rem 1.25rem;">
                <h5 style="color: black;margin:0px;" class="text-center">Short Profile</h5>
            </div>
        </div>

        <hr style="margin:10px;">
        <p id="name"><span style="font-weight: bold;">Name:</span>
            {{ $patient->name }}</p>
        <p id="package"><span style="font-weight: bold;">Package Name:</span>
            {{ $package->incomeSubCategory->name ?? '' }}</p>
        <p id="age"><span style="font-weight: bold;">Age: </span> {{ $patient->age }}</p>
        <p id="sex"><span style="font-weight: bold;">Sex:</span> {{ $patient->gender }}
        </p>
        <p id="sex"><span style="font-weight: bold;">City:</span>
            {{ $patient->district->name }}</p>
        <p id="sex"><span style="font-weight: bold;">Thana:</span>
            {{ $patient->thana->name ?? '' }}</p>
        <p id="address"><span style="font-weight: bold;">Address:</span>
            {{ $patient->present_address }}</p>
        <p id="number"><span style="font-weight: bold;">Follow Up Number:</span>
            {{ $patient->patientDetail->doctor_contact_name }}</p>
        <p id="email"><span style="font-weight: bold;">Email:</span>
            {{ $patient->user->email }}</p>
        <p id="primaryDiseases"><span style="font-weight: bold;">Primary Diagnosis:</span>
            {{ $patient->primaryDiseases->primary_diagnosis ?? '' }}</p>
        <p id="primaryDiseases"><span style="font-weight: bold;">Food & medicine allergy :</span>
            {{ $patient->primaryDiseases->allergy ?? '' }}</p>
        <p id="nurse"><span style="font-weight: bold;">Nurse Duty: </span>
            @foreach ($nurse_duty as $nurse)
                {{ $nurse->title }} -
            @endforeach
        </p>
        <p id="nurse"><span style="font-weight: bold;">Consulting Doctors: </span>
            @php
                $consulting = explode(',', $patient->patientReferral->consulting_doctor);
            @endphp
            @foreach ($doctors as $doctor)
                @if (in_array($doctor->id, $consulting))
                    {{ $doctor->doctor_name }},
                @endif
            @endforeach
        </p>
        <a class="btn btn-sm btn-primary" href="{{ url('view-patient-profile', $patient->id ?? '') }}">More <i
                class="fas fa-arrow-right"></i> </a>
    </div>
    <br>
    <div class="prescription1" style="border: 2px solid #e1e4f4;padding: 10px;">

        <div class="card m-0">
            <div class="card-header" style="background:#dee5f1;padding:.3rem 1.25rem .1rem 1.25rem;">
                <h5 style="color: black;margin:0px;" class="text-center">Last Discusion</h5>
            </div>
        </div>

        <p id="date"><span style="font-weight: bold;">Date & Time:</span>
            {{ $followup->created_at ?? '' }} </p>
        <p id="home"><span style="font-weight: bold;">Place:</span>{{ $followup->place ?? '' }}
        </p>
        <p id="home"><span style="font-weight: bold; text-decoration: underline;">Vital
                Sign: </span></p>
        <div class="row">
            <div class="col-md-6">
                <p id="home"><span style="font-weight: bold;"></span> BP:
                    {{ $followup->bp_high ?? '' }} / {{ $followup->bp_min ?? '' }}</p>
            </div>
            <div class="col-md-6">
                <p id="home"><span style="font-weight: bold;"></span> Pulse:
                    {{ $followup->pulse ?? '' }}</p>
            </div>
            <div class="col-md-6">
                <p id="home"><span style="font-weight: bold;"></span> Saturation:
                    {{ $followup->saturation ?? '' }}</p>
            </div>
            <div class="col-md-6">
                <p id="home"><span style="font-weight: bold;"></span> Intake:
                    {{ $followup->intake ?? '' }}</p>
            </div>
            <div class="col-md-6">
                <p id="home"><span style="font-weight: bold;"></span> Output:
                    {{ $followup->output ?? '' }}</p>
            </div>
            <div class="col-md-6">
                <p id="home"><span style="font-weight: bold;"></span> Blood Suger:
                    {{ $followup->sugar ?? '' }}</p>
            </div>
            <div class="col-md-6">
                <p id="home"><span style="font-weight: bold;"></span> Insulin:
                    {{ $followup->insulin ?? '' }}</p>
            </div>
            <div class="col-md-6">
                <p id="home"><span style="font-weight: bold;"></span> Temperature:
                    {{ $followup->temp ?? '' }}</p>
            </div>
            <div class="col-md-6">
                <p>
                    <span style="font-weight: bold;">Reason for Call:</span>{{ $followup->type ?? '' }}
                </p>
            </div>
        </div>

        <div class="card-body">

            <ul style="" class="bookmarks">
                <li>
                    <p id="reason"><span style="font-weight: bold;"><i class="icon-info1"></i>Physical:
                        </span>{{ $followup->reason . ',' ?? '' }}
                        {{ $followup->other_reason ?? '' }} </p>
                </li>
                <li>
                    <p id="function"><span style="font-weight: bold;"><i class="icon-info1"></i>Functional Status:
                        </span>
                        {{ $followup->functional_status ?? '' }}</p>
                </li>

            </ul>
        </div>

        <p><span style="font-weight: bold;">Response to Call:</span></p>

        <div class="card-body">
            <ul style="" class="bookmarks">
                <li>
                    <p id="response"><span style="font-weight: bold;"><i
                                class="icon-info1"></i>Response:</span>{{ $followup->response . ',' ?? '' }}
                        {{ $followup->other_response ?? '' }} </p>
                </li>
            </ul>
        </div>
    </div>
    <br />
    <div class="prescription2">
        <div class="card m-0">
            <div class="card-header" style="background:#dee5f1;padding:.3rem 1.25rem .1rem 1.25rem;">
                <h5 style="color: black;margin:0px;" class="text-center">Previous Medicine</h5>
            </div>
        </div>
        <div class="card-body" style="height: 170px; overflow: scroll;" onMouseOver="this.style.overflow='scroll'">
            <div class="table-responsive Canceltable">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th class="text-center">Medicine</th>
                            <th class="text-center">Cancelled</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="Canceltable">
                        @foreach ($getCancelMedicines as $cancel_medicine)
                            <tr id="tr">
                                <td style="margin: 5px;">
                                    <span>
                                        {{ $cancel_medicine->medicine ?? '' }}-
                                    </span>

                                    <span>
                                        {{ $cancel_medicine->dose ?? '' }}-
                                    </span>

                                    <span>
                                        {{ $cancel_medicine->duration ?? '' }}-
                                    </span>
                                </td>
                                <td style="margin: 5px;">
                                    {{ $cancel_medicine->updated_at ?? '' }}
                                    <input type="hidden" class="cancel_medicine_id"
                                        value="{{ $cancel_medicine->id ?? '' }}">
                                </td>
                                <td style="margin: 0px; padding:0px">
                                    <button class="btn btn-sm activeMedicineButton" style="background:inherit"
                                        title="Active Again">
                                        <i class="fas fa-undo-alt text-success"></i>
                                    </button>
                                    <button class="btn btn-sm deleteMedicineButton" style="background:inherit" title="Delete"
                                        onclick="deleteMedicine({{ $cancel_medicine->id }})">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
