@php
    $form_heading = 'Update';
    $form_url = route('patient.plan.and.status.update', $patient->id);
    $form_method = 'POST';
@endphp
<form action="{{ $form_url }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="dataModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Patient Plan and Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="personal-information">
                        <div class="row gutters">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text custom-group-text">Status*</span>
                                        <select class="form-control" id="status" name="status" required="">
                                            <option @if ($patient->status == 'Active') selected @endif value="Active">
                                                Active</option>
                                            <option @if ($patient->status == 'Not Active') selected @endif
                                                value="Not Active">Not Active</option>
                                            <option @if ($patient->status == 'Service Stop') selected @endif
                                                value="Service Stop">Service Stop</option>
                                            <option @if ($patient->status == 'Died') selected @endif value="Died">
                                                Death</option>
                                            <option @if ($patient->status == 'Payment Pending') selected @endif
                                                value="Payment Pending">Payment Pending</option>
                                            <option value="Renew">Renew Package</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-primary tn-lg"
                        type="submit">{{ $patient->id ? 'Update' : 'Save' }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
