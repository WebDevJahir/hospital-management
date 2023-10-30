<div class="col-4" style="border:2px solid #e1e4f4; padding-top: 10px; height:1120px;">
    <div class="presrip">
        <div class="card m-0">
            <div class="card-header" style="background:#dee5f1;padding:.3rem 1.25rem .1rem 1.25rem;">
                <h5 style="color: black;margin:0px;" class="text-center">Prescription</h5>
            </div>
        </div>
        <hr style="margin:10px" />
        <div class="row">
            <div class="col-md-3 " style="text-align: center;">
                <div style="font-weight: bold;"> Prescription</div>
                <a class="btn btn-sm" style="background:inherit" title="Prescription pdf" id="pdf"
                    href="{{ url('/print-prescription', $patient->id) }}" type="submit" target="_blank"><i
                        class="fas fa-download text-primary"></i></a>|
                <a class="btn btn-sm" style="background:inherit" title="Prescription Mail" id="pdf"
                    href="{{ url('/send-prescription-mail', $patient->id) }}" type="submit"><i
                        class="fas fa-envelope text-warning"></i></a>
            </div>
            <div class="col-md-3" style="text-align: center;">
                <div style="font-weight: bold;"> Investigation</div>
                <span onclick="viewInvReport()" type="submit" style="background:inherit" title="Investigation report"
                    style="margin-top: -5px;"><i class="fas fa-eye text-primary"></i></span> |
                <button class="btn btn-sm" style="background:inherit" title="Investigation add" onclick="addInvReport()"
                    style="margin-top: -7px; margin-left: 6px;" type="submit"><i
                        class="fas fa-plus text-success"></i></button>
            </div>
            <div class="col-md-3" style="text-align: center;">
                <div style="font-weight: bold;"> Next Plan</div>
                <span onclick="nextplanList()" style="margin-top: -5px;" style="background:inherit"
                    title="Next plan report" type="submit"><i class="fas fa-eye text-primary"></i></span> |
                <span class="btn btn-sm" style="background:inherit" title="Next plan add" onclick="addNextPlan()"
                    type="submit" style="margin-top: -7px; margin-left: 6px;"><i
                        class="fas fa-plus text-success"></i></span>
            </div>
            <div class="col-md-3" style="text-align: center;">
                <div style="font-weight: bold;">Medicine</div>
                <button type="button" class="btn btn-sm" style="background:inherit" title="Add medicine"
                    data-bs-toggle="modal" data-bs-target="#addMedicine">
                    <i class="fas fa-plus text-success"></i>
                </button>
            </div>
            <!-- Modal -->
            @include('monitoring::prescription.prescription_layout.medicine_modal')
        </div>
    </div>
    <div style="height: 20px;"></div>
    <div style="overflow-y: scroll;max-height: 960px;" class="yyyy">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2">Medicine</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="medicineTable">
                @php $sl = 1; @endphp
                @foreach ($getMedicines as $medicine)
                    <tr id="tr{{ $medicine->id }}">
                        <td colspan="2">
                            <input type="hidden" class="medicine_id" value="{{ $medicine->id }}">
                            {{ $medicine->medicine }}<br>
                            {{ $medicine->dose }} <br>
                            {{ $medicine->note }}<br>{{ $medicine->duration }}
                        </td>
                        <td>{{ $medicine->created_at }}</td>
                        <td>
                            <button class="btn btn-sm" style="background:inherit" title="Edit"
                                onclick="editMedicine({{ $medicine->id }})" type="submit" style="margin:2px;">
                                <i class="fas fa-edit text-success"></i>
                            </button>
                            <br>
                            <button class="btn btn-sm cancelMedicineButton" style="background:inherit" title="Cancel"
                                type="submit" style="margin:2px;">
                                <i class="fas fa-trash-alt text-danger"></i>
                            </button>
                            <br>
                            <a class="btn  btn-sm" style="background:inherit" title="Send sms"
                                href="{{ url('send-medicine-sms', $medicine->id) }}" style="margin:2px;">
                                <i class="fas fa-sms text-primary"></i>
                            </a>
                        </td>
                    </tr>
                    @php $sl++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <button style="font-size: 17px;color: #ffff;float: right; background: #3bb3ff" class="btn btn-info btn-sm"
        onclick="generatePrescription()">Generate Prescription</button>
</div>
