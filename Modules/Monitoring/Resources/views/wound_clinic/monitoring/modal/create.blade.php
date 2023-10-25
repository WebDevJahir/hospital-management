@php
    $url = !empty($pain_monitoring) ? route('pain-monitoring.update', $pain_monitoring->id) : route('pain-monitoring.store');
    $method = !empty($pain_monitoring) ? 'PUT' : 'POST';
    $patient_id = !empty($pain_monitoring) ? $pain_monitoring->patient_id : $patient->id;
    $id = !empty($pain_monitoring) ? $pain_monitoring->id : '';
    $dose1 = !empty($pain_monitoring) ? $pain_monitoring->dose1 : '';
    $dose1_status = !empty($pain_monitoring) ? $pain_monitoring->dose1_status : '';
    $dose2 = !empty($pain_monitoring) ? $pain_monitoring->dose2 : '';
    $dose2_status = !empty($pain_monitoring) ? $pain_monitoring->dose2_status : '';
    $dose3 = !empty($pain_monitoring) ? $pain_monitoring->dose3 : '';
    $dose3_status = !empty($pain_monitoring) ? $pain_monitoring->dose3_status : '';
    $dose4 = !empty($pain_monitoring) ? $pain_monitoring->dose4 : '';
    $dose4_status = !empty($pain_monitoring) ? $pain_monitoring->dose4_status : '';
    $dose5 = !empty($pain_monitoring) ? $pain_monitoring->dose5 : '';
    $dose5_status = !empty($pain_monitoring) ? $pain_monitoring->dose5_status : '';
    $dose6 = !empty($pain_monitoring) ? $pain_monitoring->dose6 : '';
    $dose6_status = !empty($pain_monitoring) ? $pain_monitoring->dose6_status : '';
    $extra_dose = !empty($pain_monitoring) ? $pain_monitoring->extra_dose : ''; 
@endphp

<div class="modal fade" id="painMonitoringModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pain Monitoring</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ $url }}" method="POST">
                @csrf
                @method($method)
                <div class="modal-body">
                    <div class="row gutters">
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    Patient Name:
                                </span>
                                <input type='text' id="patient_name" class="form-control" placeholder="Patient Name"
                                    value="{{ $patient->name }}" readonly />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    Contact No:
                                </span>
                                <input type='text' id="contact_no" class="form-control" placeholder="Contact No"
                                    value="{{ $patient->contact_no }}" readonly />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    Email:
                                </span>
                                <input type='text' id="email" class="form-control" placeholder="Email"
                                    value="{{ $patient->user->email }}" readonly />
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row gutters">
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    Medicine:
                                </span>
                                <input type='text' id="medicine" name="medicine" class="form-control"
                                    placeholder="Medicine" value="{{ $last_pain_management->medicine }}" readonly />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    Dose:
                                </span>
                                <input type='text' id="dose" class="form-control" placeholder="Dose"
                                    value="{{ $last_pain_management->dose }}" readonly />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    Note:
                                </span>
                                <input type='text' id="note" class="form-control" placeholder="Note"
                                    value="{{ $last_pain_management->note }}" readonly />
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    Duration:
                                </span>
                                <input type='text' id="duration" class="duration" class="form-control"
                                    placeholder="Duration" value="{{ $last_pain_management->duration }}" readonly />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        <input type="hidden" class="form-control" placeholder="date" id="date" name="date"
                            aria-label="Username" aria-describedby="basic-addon1" value="{{ date('d-m-Y') }}">
                        <input type="hidden" class="form-control" placeholder="date" id="date" name="medicine"
                            aria-label="Username" aria-describedby="basic-addon1"
                            value="{{ $last_pain_management->id }}">
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Dose 1</div>
                                <div class="input-group">
                                    <input type="time" name="dose1" class="form-control"
                                        value="{{ $last_pain_management->dose1 ?? '' }}">
                                    <div class="input-group-prepend" style="margin-left:5px;">
                                        <span style="padding: 5px;">Yes</span><input type="radio"
                                            name="dose1_status" value="Yes" {{ $dose1_status == 'Yes' ? 'checked' : '' }}>
                                        <span style="padding: 5px;">No</span><input type="radio"
                                            name="dose1_status" value="No" {{ $dose1_status == 'No' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Dose 2</div>
                                <div class="input-group">
                                    <input type="time" name="dose2" class="form-control"
                                        value="{{ $last_pain_management->dose2 ?? '' }}">
                                    <div class="input-group-prepend" style="margin-left:5px;">
                                        <span style="padding: 5px;">Yes</span><input type="radio"
                                            name="dose2_status" value="Yes" {{ $dose2_status == 'Yes' ? 'checked' : '' }}>
                                        <span style="padding: 5px;">No</span><input type="radio"
                                            name="dose2_status" value="No" {{ $dose2_status == 'No' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Dose 3</div>
                                <div class="input-group">
                                    <input type="time" name="dose3" class="form-control"
                                        value="{{ $last_pain_management->dose3 ?? '' }}">
                                    <div class="input-group-prepend" style="margin-left:5px;">
                                        <span style="padding: 5px;">Yes</span><input type="radio"
                                            name="dose3_status" value="Yes" {{ $dose3_status == 'Yes' ? 'checked' : '' }}>
                                        <span style="padding: 5px;">No</span><input type="radio"
                                            name="dose3_status" value="No" {{ $dose3_status == 'No' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Dose 4</div>
                                <div class="input-group">
                                    <input type="time" name="dose4" class="form-control"
                                        value="{{ $last_pain_management->dose4 ?? '' }}">
                                    <div class="input-group-prepend" style="margin-left:5px;">
                                        <span style="padding: 5px;">Yes</span><input type="radio"
                                            name="dose4_status" value="Yes" {{ $dose4_status == 'Yes' ? 'checked' : '' }}>
                                        <span style="padding: 5px;">No</span><input type="radio"
                                            name="dose4_status" value="No" {{ $dose4_status == 'No' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Dose 5</div>
                                <div class="input-group">
                                    <input type="time" name="dose5" class="form-control"
                                        value="{{ $last_pain_management->dose5 ?? '' }}">
                                    <div class="input-group-prepend" style="margin-left:5px;">
                                        <span style="padding: 5px;">Yes</span><input type="radio"
                                            name="dose5_status" value="Yes" {{ $dose5_status == 'Yes' ? 'checked' : '' }}>
                                        <span style="padding: 5px;">No</span><input type="radio"
                                            name="dose5_status" value="No" {{ $dose5_status == 'No' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Dose 6</div>
                                <div class="input-group">
                                    <input type="time" name="dose6" class="form-control"
                                        value="{{ $last_pain_management->dose6 ?? '' }}">
                                    <div class="input-group-prepend" style="margin-left:5px;">
                                        <span style="padding: 5px;">Yes</span><input type="radio"
                                            name="dose6_status" value="Yes" {{ $dose6_status == 'Yes' ? 'checked' : '' }}>
                                        <span style="padding: 5px;">No</span><input type="radio"
                                            name="dose6_status" value="No"  {{ $dose6_status == 'No' ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Extra Dose</div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Extra Dose"
                                        id="extra_dose" name="extra_dose" aria-label="Username"
                                        aria-describedby="basic-addon1" value="{{ $extra_dose }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
