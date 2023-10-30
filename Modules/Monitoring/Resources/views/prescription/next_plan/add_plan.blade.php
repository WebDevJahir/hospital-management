<div class="modal fade" id="nextPlanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Next Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gutters">
                    <div class="col-6 col-md-6 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text custom-group-text">
                                <span class="icon-calendar"></span>
                            </span>
                            <input type="text" class="form-control" placeholder="Plan" id="plan" name="plan"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text custom-group-text">
                                <span class="icon-calendar"></span>
                            </span>
                            <input type="date" class="form-control" placeholder="Date" id="notification_date"
                                name="notification_date" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addNextPlanButton">Save</button>
            </div>
        </div>
    </div>
</div>
