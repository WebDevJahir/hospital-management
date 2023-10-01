<div class="modal fade" id="editMedicine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Medicine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gutters">
                    <div class="col-6 col-md-6 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text custom-group-text">
                                <span class="icon-calendar"></span>
                            </span>
                            <input list="europe-countries" type="text" name="medicine" id="update_medicine"
                                class="form-control" value="{{ $edit_medicine->medicine }}">
                            <datalist id="europe-countries">
                                @foreach ($medicines as $medicine)
                                    <option>{{ $medicine->name }}</option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text custom-group-text">
                                <span class="icon-calendar"></span>
                            </span>
                            <input type="text" class="form-control" placeholder="Note" id="update_note"
                                name="note" value="{{ $edit_medicine->note }}">
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text custom-group-text">
                                <span class="icon-calendar"></span>
                            </span>
                            <input type="text" class="form-control" placeholder="Dose" id="update_dose"
                                name="dose" value="{{ $edit_medicine->dose }}">
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text custom-group-text">
                                <span class="icon-calendar"></span>
                            </span>
                            <input type="text" class="form-control" placeholder="Duration" id="update_duration"
                                name="duration" value="{{ $edit_medicine->duration }}">
                        </div>
                    </div>
                    <input type="hidden" id="update_medicine_id" value="{{ $edit_medicine->id }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updatePrescriptionMedicine">Update</button>
            </div>
        </div>
    </div>
</div>
