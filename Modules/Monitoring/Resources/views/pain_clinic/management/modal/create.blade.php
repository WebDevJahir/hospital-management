@php
    $url = !empty($pain_management) ? route('pain-management.update', $pain_management->id) : route('pain-management.store');
    $method = !empty($pain_management) ? 'PUT' : 'POST';
    $patient_id = !empty($pain_management) ? $pain_management->patient_id : $patient->id;
    $medicine = !empty($pain_management) ? $pain_management->medicine : '';
    $dose = !empty($pain_management) ? $pain_management->dose : '';
    $note = !empty($pain_management) ? $pain_management->note : '';
    $duration = !empty($pain_management) ? $pain_management->duration : '';
    $dose1 = !empty($pain_management) ? $pain_management->dose1 : '';
    $dose2 = !empty($pain_management) ? $pain_management->dose2 : '';
    $dose3 = !empty($pain_management) ? $pain_management->dose3 : '';
    $dose4 = !empty($pain_management) ? $pain_management->dose4 : '';
    $dose5 = !empty($pain_management) ? $pain_management->dose5 : '';
    $dose6 = !empty($pain_management) ? $pain_management->dose6 : '';
@endphp

<div class="modal fade" id="painMgtModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Morphin Docs</h5>
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
                                    <span class="icon-calendar"></span>
                                </span>
                                <input type='text' id="patient_name" class="form-control" placeholder="Patient Name"
                                    value="{{ $patient->user->name }}" readonly />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    <span class="icon-calendar"></span>
                                </span>
                                <input type='text' id="contact_no" class="form-control" placeholder="Contact No"
                                    value="{{ $patient->contact_no }}" readonly />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span class="input-group-text custom-group-text">
                                    <span class="icon-calendar"></span>
                                </span>
                                <input type='text' id="email" class="form-control" placeholder="Email"
                                    value="{{ $patient->user->email }}" readonly />
                            </div>
                        </div>
                    </div>
                    <br />
                    <hr />

                    <div class="row gutters">
                        <div class="col-6">
                            <div class="form-group">
                                <div style="font-weight: bold;">Medicine</div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Medicine" id="medicine"
                                        name="medicine" value="{{ $medicine }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div style="font-weight: bold;">Dose</div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Dose" id="dose"
                                        name="dose" value="{{ $dose }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-6">
                            <div class="form-group">
                                <div style="font-weight: bold;">Note</div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Note" id="note"
                                        name="note" value="{{ $note }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div style="font-weight: bold;">Duration</div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Duration" id="duration"
                                        name="duration" value="{{ $duration }}" required>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Dose 1</div>
                                <div class="input-group">
                                    <input type="time" class="form-control" placeholder="Dose 1" id="dose1"
                                        name="dose1" value="{{ $dose1 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Dose 2</div>
                                <div class="input-group">
                                    <input type="time" class="form-control" placeholder="Dose 2" id="dose2"
                                        name="dose2" value="{{ $dose2 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Dose 3</div>
                                <div class="input-group">
                                    <input type="time" class="form-control" placeholder="Dose 3" id="dose3"
                                        name="dose3" value="{{ $dose3 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Dose 4</div>
                                <div class="input-group">
                                    <input type="time" class="form-control" placeholder="Dose 4" id="dose4"
                                        name="dose4" value="{{ $dose4 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Dose 5</div>
                                <div class="input-group">
                                    <input type="time" class="form-control" placeholder="Dose 5" id="dose5"
                                        name="dose5" value="{{ $dose5 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Dose 6</div>
                                <div class="input-group">
                                    <input type="time" class="form-control" placeholder="Dose 6" id="dose6"
                                        name="dose6" value="{{ $dose6 }}">
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
