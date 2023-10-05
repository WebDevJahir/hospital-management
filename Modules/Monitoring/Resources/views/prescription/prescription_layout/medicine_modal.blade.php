<!-- Modal -->
<div class="modal fade" id="addMedicine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Medicine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gutters">
                    <div class="col-6 col-md-6 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text custom-group-text">
                                <span class="icon-calendar"></span>
                            </span>
                            <input list="europe-countries" type="text" name="medicine" id="medicine"
                                class="form-control">
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
                            <input type="text" class="form-control" placeholder="Note" id="note" name="note"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text custom-group-text">
                                <span class="icon-calendar"></span>
                            </span>
                            <input type="text" class="form-control" placeholder="Dose" id="dose" name="dose"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text custom-group-text">
                                <span class="icon-calendar"></span>
                            </span>
                            <input type="text" class="form-control" placeholder="Duration" id="duration"
                                name="duration" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addMedicine()">Add</button>
                </div>
            </div>
            <hr class="m-1" />
            <div class="modal-body">
                <h3 class="text-center">Active Medicine List</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2">Medicine</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="activeMedicineModalTable">
                        @php $sl = 1; @endphp
                        @foreach ($getMedicines as $medicine)
                            <tr id="tr{{ $medicine->id }}">
                                <td colspan="2">
                                    {{ $medicine->medicine }}<br> {{ $medicine->dose }}
                                    <br>
                                    {{ $medicine->note }}-{{ $medicine->duration }}
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($medicine->created_at)->format('d/m/Y g:i A') }}
                                </td>
                                <td> <button class="btn btn-inline btn-sm" style="background:inherit" title="Edit"
                                        onclick="editMedicine({{ $medicine->id }})" type="submit"
                                        style="margin:2px;"><i class="fas fa-edit text-success"></i></button><br>
                                    <button class="btn btn-inline btn-sm" style="background:inherit" title="Cancel"
                                        onclick="cancelMedicine({{ $medicine->id }})" type="submit"
                                        style="margin:2px;"><i class="fas fa-trash-alt text-danger"></i></button>
                                    <br><a class="btn btn-inline btn-sm" style="background:inherit" title="Send SMS"
                                        href="{{ url('send-medicine-sms', $medicine->id) }}" style="margin:2px;"><i
                                            class="fas fa-sms text-primary"></i></a>
                                </td>
                            </tr>
                            @php $sl++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
