<div class="col-4" style="max-height: 1100px;">

    <form action="{{ url('add-follow-up-discussion') }}" method="post">
        @csrf

        <div class="card" style="margin-bottom:0px;padding:10px;border:2px solid #dddddd;height: 1120px;">
            <div class="card-header" style="background:#dee5f1;padding:.3rem 1.25rem .1rem 1.25rem;">
                <h5 style="color: black;margin:0px;" class="text-center">Follow Up Discussion</h5>
            </div>
            <hr style="margin:10px;">
            <div class="row gutters">
                <div class="form-group col-md-6">
                    <div style="font-weight: bold;"> Place Name :</div>
                    <div class="input-group">
                        <select class="form-control" id="place" name="place">
                            <option value="1">Select Place</option>
                            <option value="Home">Home</option>
                            <option value="Hospital">Hospital</option>

                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div style="font-weight: bold;"> Call/Visit Type :</div>
                    <div class="input-group">
                        <select class="form-control" id="type" name="type">
                            <option value="1">Select Call/Visit Type</option>
                            <option value="Schedule">Schedule</option>
                            <option value="UnSchedule">UnSchedule</option>

                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header" style="background:#dee5f1;padding:.3rem 1.25rem .1rem 1.25rem;">
                    <h5 class="text-center m-0" style="color:black;">Vital Sign</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div style="font-weight: bold;"> Blood Pressure(mmm of Hg)</div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="BP High" id="bp_high"
                                name="bp_high" aria-label="Username" aria-describedby="basic-addon1">
                            <input type="text" class="form-control" placeholder="BP Low" id="bp_low"
                                name="bp_low" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="row gutters">
                        <div class="form-group col-md-6">
                            <div style="font-weight: bold;">Pulse(/min)</div>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Pulse" name="pulse"
                                    id="pulse" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div style="font-weight: bold;">Saturation(%)</div>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Saturation" name="saturation"
                                    id="saturation" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div style="font-weight: bold;">Temperature(degree F)</div>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Temperature" name="temp"
                                    id="temp" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div style="font-weight: bold;">Intake(ml)</div>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Intake" name="intake"
                                    id="intake" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div style="font-weight: bold;">Output(ml)</div>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Output" name="output"
                                    id="output" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div style="font-weight: bold;">Insulin(Unit)</div>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Insulin" name="insulin"
                                    id="insulin" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div style="font-weight: bold;">Blood Sugar(mmol/L)</div>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Blood Sugar" name="sugar"
                                    id="sugar" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header" style="background:#dee5f1;padding:.3rem 1.25rem .1rem 1.25rem;">
                <h5 class="text-center m-0" style="color:black;">Reason for Call/Visit</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <div style="font-weight: bold;"> Physical :</div>
                    <!-- Inline Checkbox example -->
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="reason[]" id="reason"
                            value="Pain">
                        <label style="color: #495057;" for="reason">Pain</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox2"
                            value="Nausea">
                        <label style="color: #495057;" for="Nausea">Nausea</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox3"
                            value="Breathlessness">
                        <label style="color: #495057;" for="Breathlessness">Breathlessness</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox4"
                            value="Constipation">
                        <label style="color: #495057;" for="Constipation">Constipation</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox5"
                            value="Restlessness">
                        <label style="color: #495057;" for="Restlessness">Restlessness</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox6"
                            value="Drowsiness">
                        <label style="color: #495057;" for="Drowsiness">Drowsiness</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox6"
                            value="Poor Appetite">
                        <label style="color: #495057;" for="Poor Appetite">Poor Appetite</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox6"
                            value="Dyspepsia">
                        <label style="color: #495057;" for="Dyspepsia">Dyspepsia</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox6"
                            value="Cough">
                        <label style="color: #495057;" for="Cough">Cough</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox6"
                            value="Swelling">
                        <label style="color: #495057;" for="Swelling">Swelling</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox6"
                            value="Fever">
                        <label style="color: #495057;" for="Fever">Fever</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox6"
                            value="Vomiting">
                        <label style="color: #495057;" for="Vomiting">Vomiting</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox6"
                            value="Urinary Problem">
                        <label style="color: #495057;" for="Urinary Problem">Urinary Problem</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox6"
                            value="Lymphedema">
                        <label style="color: #495057;" for="Lymphedema">Lymphedema</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox6"
                            value="Bedsore">
                        <label style="color: #495057;" for="Bedsore">Bedsore</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox6"
                            value="Sleep disturbance">
                        <label style="color: #495057;" for="Sleep disturbance">Sleep
                            disturbance</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="reason[]" type="checkbox" id="inlineCheckbox6"
                            value="No Complain">
                        <label style="color: #495057;" for="No Complain">No Complain</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="others" id="check_reason"
                            value="Others">
                        <label style="color: #495057;" for="reason">Others</label>
                    </div>
                    <input type="text" name="other_reason" id="other_reason" placeholder="Other reasons"
                        class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div style="font-weight: bold;"> Functional Status :</div>
                <div class="input-group">
                    <span class="input-group-text custom-group-text"
                        style="background: #e4e9ef !important; border: 1px solid #e4e9ef !important">
                        <span class="icon-folder-plus" style="color: black; "></span>
                    </span>
                    <select class="form-control" id="functional_status" name="functional_status">
                        <option value="">Select Functional Status</option>
                        <option value="Stable">Stable</option>
                        <option value="Deteriorating">Deteriorating</option>

                    </select>
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="background:#dee5f1;padding:.3rem 1.25rem .1rem 1.25rem;">
                    <h5 class="text-center m-0" style="color:black;">Response to Call/Visit</h5>
                </div>
                <div class="card-body">
                    <div style="font-weight: bold;"> Response :</div>
                    <!-- Inline Checkbox example -->
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="response[]" id="reason"
                            value="Medication Change">
                        <label class="form-check-label" for="reason"> Medication Change</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="response[]" id="reason"
                            value="Admission Recommendation">
                        <label class="form-check-label" for="reason">Admission
                            Recommendation</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="response[]" id="reason"
                            value="Counselling">
                        <label class="form-check-label" for="reason">Counselling </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="response[]" id="reason"
                            value="Home Visit">
                        <label class="form-check-label" for="reason"> Home Visit</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="response[]" id="reason"
                            value="No Change">
                        <label class="form-check-label" for="reason"> No Change </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="others" id="check_response"
                            value="Others">
                        <label class="form-check-label" for="reason">Others</label>
                    </div>
                    <input type="text" name="other_response" id="other_response" placeholder="Other reasons"
                        class="form-control">
                </div>
            </div>
            <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient->id }}">

            <button class="btn btn-success btn" type="submit">Add</button>
    </form>

</div>
