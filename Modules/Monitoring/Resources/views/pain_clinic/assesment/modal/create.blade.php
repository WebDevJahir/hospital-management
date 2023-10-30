@php
    $url = !empty($assesment) ? route('pain-assesment.update', $assesment->id) : route('pain-assesment.store');
    $method = !empty($assesment) ? 'PUT' : 'POST';
    $patient_id = !empty($assesment) ? $assesment->patient_id : $patient_id;
    $date = !empty($assesment) ? $assesment->date : '';
    $pain_location = !empty($assesment) ? $assesment->pain_location : '';
    $radiation = !empty($assesment) ? $assesment->radiation : '';
    $severity = !empty($assesment) ? $assesment->severity : '';
    $change_of_time = !empty($assesment) ? $assesment->change_of_time : '';
    $relieving_factors = !empty($assesment) ? $assesment->relieving_factors : '';
    $cause_of_pain = !empty($assesment) ? $assesment->cause_of_pain : '';
@endphp

<div class="modal fade" id="painAsmtModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assesment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ $url }}" method="POST">
                @csrf
                @method($method)
                <div class="modal-body">
                    <div class="row gutters">
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Date:</div>
                                <div class="input-group">
                                    <input type="date" class="form-control" placeholder="Date" aria-label="Username"
                                        aria-describedby="basic-addon1" name="date" id="date"
                                        value="{{ $date ?? '' }}" required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Location:</div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Location"
                                        aria-label="Username" aria-describedby="basic-addon1" name="pain_location"
                                        id="pain_location" value="{{ $pain_location }}" required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Radiation:</div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Radiation"
                                        aria-label="Username" aria-describedby="basic-addon1" name="radiation"
                                        id="radiation" value="{{ $radiation }}" required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Severity:</div>
                                <div class="input-group">
                                    <select class="form-control" id="severity" name="severity">
                                        <option value="">Select Severity</option>
                                        <option value="Mild" @if ($severity == 'Mild') selected @endif>Mild
                                        </option>
                                        <option value="Moderate" @if ($severity == 'Moderate') selected @endif>
                                            Moderate</option>
                                        <option value="Severe" @if ($severity == 'Severe') selected @endif>Severe
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Change Of Time:</div>
                                <div class="input-group">
                                    <select class="form-control" id="change_of_time" name="change_of_time"
                                        required="">
                                        <option value="">Select change of time</option>
                                        <option value="Change over times"
                                            @if ($change_of_time == 'Change over times') selected @endif>Change over times</option>
                                        <option value="Constant" @if ($change_of_time == 'Constant') selected @endif>
                                            Constant</option>
                                        <option value="Breakthrough" @if ($change_of_time == 'Breakthrough') selected @endif>
                                            Breakthrough</option>
                                        <option value="Intermittent Acute"
                                            @if ($change_of_time == 'Intermittent Acute') selected @endif>Intermittent Acute
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div style="font-weight: bold;">Relieving factors:</div>
                                <div class="input-group">
                                    <select class="form-control" id="relieving_factors" name="relieving_factors"
                                        required="">
                                        <option value="">Select relieving factors</option>
                                        <option value="Medicine" @if ($relieving_factors == 'Medicine') selected @endif>
                                            Medicine</option>
                                        <option value="Message" @if ($relieving_factors == 'Message') selected @endif>
                                            Message</option>
                                        <option value="Movement" @if ($relieving_factors == 'Movement') selected @endif>
                                            Movement</option>
                                        <option value="Posture" @if ($relieving_factors == 'Posture') selected @endif>
                                            Posture</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div style="font-weight: bold;">What do you think is the causing of pain?</div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cause of pain"
                                        aria-label="Username" aria-describedby="basic-addon1" name="cause_of_pain"
                                        id="cause_of_pain" value="{{ $cause_of_pain }}" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="patient_id" value="{{ $patient_id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>
