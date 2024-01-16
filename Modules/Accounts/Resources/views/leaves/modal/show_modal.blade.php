<div class="modal fade" id="showLeave" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payments</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row gutters">
                    <div class="col-4">
                        <div class="form-group">
                            <div style="font-weight: bold;">Employee Name: <span style="font-weight: normal;">
                                    <p>
                                        {{ $leave->employee->first_name ?? '' }}
                                        {{ $leave->employee->last_name ?? '' }}
                                    </p>
                                </span></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div style="font-weight: bold;">Application Date: <span style="font-weight: normal;">
                                    <p>{{ $leave->application_date }}</p>
                                </span></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div style="font-weight: bold;">Leave From Date: <span style="font-weight: normal;">
                                    <p>{{ $leave->from_date }}</p>
                                </span></div>
                        </div>
                    </div>
                </div>
                <div class="row gutters">
                    <div class="col-4">
                        <div class="form-group">
                            <div style="font-weight: bold;"> Joining Date: <span style="font-weight: normal;">
                                    <p>{{ $leave->to_date }}</p>
                                </span></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div style="font-weight: bold;"> Leave Type: <span style="font-weight: normal;">
                                    <p>{{ $leave->leave_type }}</p>
                                </span></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div style="font-weight: bold;"> Address during leave: <span style="font-weight: normal;">
                                    <p>{{ $leave->address_during_leave }}</p>
                                </span></div>
                        </div>
                    </div>
                </div>


                <div class="row gutters">
                    <div class="col-4">
                        <div class="form-group">
                            <div style="font-weight: bold;"> Contact During Leave: <span style="font-weight: normal;">
                                    <p>{{ $leave->contact_during_leave }}</p>
                                </span></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div style="font-weight: bold;"> Acting officials name during leave: <span
                                    style="font-weight: normal;">
                                    <p>{{ $leave->official_name }}</p>
                                </span></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div style="font-weight: bold;"> Cause of Leave: <span style="font-weight: normal;">
                                    <p>{{ $leave->cause_of_leave }}</p>
                                </span></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div style="font-weight: bold;">Recommendation Name: <span style="font-weight: normal;">
                                    <p>{{ $leave->recommendation_name }}</p>
                                </span></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div style="font-weight: bold;">Status: <span style="font-weight: normal;">
                                    <p>
                                        @if ($leave->status == 1)
                                            Approved
                                        @else
                                            Not Approved
                                        @endif
                                    </p>
                                </span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
