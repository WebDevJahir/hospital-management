<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-0 p-0">

    <!-- Table container start -->
    <div class="table-container m-0 p-0" style="border:2px;">
        <div class="t-header">
            <div class="th-title">
                <div>
                    <div class="d-flex justify-content-between">
                        <span style="margin-top: 5px;">Prescription Create</span>
                        <span class="th-count"><a href="{{ route('prescription.index') }}" class="btn btn-sm btn-info"
                                style="border-radius: 5px; margin-left:5px;">
                                <i class="fas fa-list"></i> List</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-md-2">
                <h5 class="text-center" style="padding-top:10px;">Select Patient</h5>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <span class="input-group-text custom-group-text">
                        <span class="icon-user-plus"></span>
                    </span>
                    <select class="form-control select2" id="status" data-width="90%">
                        <option value="">Select Status</option>
                        <option value="Active">Active</option>
                        <option value="Not Active">Not Active</option>
                        <option value="Subscriber">Subscriber</option>
                        <option value="Payment Pending">Payment Pending</option>
                        <option value="Service Stop">Service Stop</option>
                        <option value="Died">Died</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <span class="input-group-text custom-group-text">
                        <span class="icon-user-plus"></span>
                    </span>
                    <select class="form-control select2" id="patient" data-width="90%">
                        <option selected value="{{ $patient->id }}"></option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <label class="btn btn-sm" for="showGraph"><i style="font-size:22px;"
                        class="fas fa-chart-line text-primary"></i> </label>
                <input type="checkbox" name="checkbox" style="display:none;" class="switch" value="checked"
                    id="showGraph">
            </div>
        </div>
    </div>
    <!-- Table container end -->
</div>
