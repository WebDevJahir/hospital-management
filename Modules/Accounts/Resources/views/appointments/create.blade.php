@extends('master.master')
@section('title', 'Appointment - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $is_old = old('client_no') ? true : false;
        $form_heading = !empty($appointment->id) ? 'Update' : 'Add';
        $form_url = !empty($appointment->id)
            ? route('appointments.update', $appointment->id)
            : route('appointments.store');
        $form_method = !empty($appointment->id) ? 'PUT' : 'POST';
    @endphp

    <div class="main-container">
        <!-- Page header start -->
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-container">
                            <div class="t-header mb-3">
                                <div class="th-title">
                                    <div style="">
                                        <div class="d-flex justify-content-between">
                                            <span style="margin-top: 5px;">Appointment</span>
                                            <span class="th-count">
                                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" class="btn btn-sm btn-info"
                                                    style="border-radius: 5px; margin-left:5px;">
                                                    <i class="fas fa-plus"></i> Add New
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">

                                <table id="Example"
                                    class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                    <thead>
                                        <tr>
                                            <th>Patient Name</th>
                                            <th>Doctor Name</th>
                                            <th>Date</th>
                                            <th>Serial No</th>
                                            <th>Status</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="serviceTable">
                                        @foreach ($appointments as $appointment)
                                            <tr id="tr{{ $appointment->id }}">
                                                <td id="bed{{ $appointment->id }}">
                                                    {{ $appointment->patient->name ?? '' }}
                                                </td>
                                                <td id="description{{ $appointment->id }}">
                                                    {{ $appointment->doctor->name ?? '' }}</td>
                                                <td id="zone{{ $appointment->id }}">
                                                    {{ Carbon\Carbon::parse($appointment->date)->format('m/d/Y') ?? '' }}
                                                </td>

                                                <td id="charge{{ $appointment->id }}">{{ $appointment->serial_no ?? '' }}
                                                </td>
                                                <td id="charge{{ $appointment->id }}">{{ $appointment->status ?? '' }}</td>
                                                <td id="charge{{ $appointment->id }}">{{ $appointment->type ?? '' }}</td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>

                                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                                onclick="approveAppointment({{ $appointment->id }})"><i
                                                                    class="far fa-check-square"></i></button>
                                                            <button type="button" class="btn btn-sm btn-outline-success"
                                                                onclick="editAppointment({{ $appointment->id }})"><i
                                                                    class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                                onclick="approveAppointment({{ $appointment->id }})"><i
                                                                    class="far fa-check-square"></i></button>
                                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                                onclick="deleteAppointment({{ $appointment->id }})"><i
                                                                    class="fas fa-trash-alt"></i></button>
                                                        </nobr>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Table container end -->
                    </div>
                </div>
                <!-- Row end -->
            </div>
            <!-- Fixed body scroll end -->
        </div>
        <!-- Content wrapper end -->
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form action="{{ $form_url }}" method="{{ $form_method }}">
                @csrf
                @method($form_method)
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Appointment</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label>Patient</label>
                            <select name="patient_id" id="patient_id" class="form-control">
                                <option value="">Select patient</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Doctor</label>
                            <select name="prescription_doctor_id" id="prescription_doctor_id" class="form-control"
                                required="">
                                <option value="">Select doctor Name</option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Available</label>
                            <div id="available"></div>
                        </div>
                        <div class="form-group mt-3">
                            <label>Appointment Date</label>
                            <input type="date" name="date" id="date" class="form-control" required="">
                        </div>
                        <div class="form-group mt-3">
                            <label>Serial No</label>
                            <div id="serial_preview"></div>
                            <input type="hidden" name="serial_no" id="serial_no" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#Example').DataTable({
                "order": []
            });
        });




        function deleteAppointment(appointment_id) {
            let url = "{{ route('appointments.destroy', ':id') }}";
            url = url.replace(':id', appointment_id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            $('#tr' + appointment_id).remove();
                            Swal.fire(
                                'Deleted!',
                                'Schedule has been deleted.',
                                'success'
                            )
                            location.reload();
                        }
                    });
                }
            });
        }


        function editAppointment(appointment_id) {

            let appointments = @json($appointments);
            appointments.find(appointment => {
                console.log(appointment);
                if (appointment.id == appointment_id) {
                    console.log(appointment);
                    $('select[name="prescription_doctor_id"]').val(appointment.prescription_doctor_id);
                    $('select[name="patient_id"]').val(appointment.patient_id);
                    $('input[name="date"]').val(appointment.date);
                    //apointment available
                    $.get("{{ route('available-schedule-days') }}", {
                        prescription_doctor_id: appointment.prescription_doctor_id
                    }, function(data) {
                        if (data == 'false') {
                            $('#available').html('<p class="text-danger">No serial available</p>');
                        } else {
                            $('#available').html(data);
                        }
                    })
                    //check serial
                    $.get("{{ route('check-serial') }}", {
                        date: appointment.date,
                        prescription_doctor_id: appointment.prescription_doctor_id
                    }, function(data) {
                        if (data == 'false') {
                            $('#serial_preview').html('<p class="text-danger">No serial available</p>');
                        } else {
                            $('#serial_preview').html(data);
                        }
                    })
                    let form_url = "{{ route('appointments.update', ':id') }}";
                    form_url = form_url.replace(':id', appointment_id);
                    $('form').attr('action', form_url);
                    $('form').attr('method', 'POST');
                    $('form').append('<input type="hidden" name="_method" value="PUT">');
                }
                $('#exampleModal').modal('show');
            });
        }

        $('#prescription_doctor_id').on('change', function() {
            var doctor_id = $('#prescription_doctor_id').val();
            $.get("{{ route('available-schedule-days') }}", {
                prescription_doctor_id: doctor_id
            }, function(data) {
                if (data == 'false') {
                    $('#available').html('<p class="text-danger">No serial available</p>');
                } else {
                    $('#available').html(data);
                }
            })
        })
        $('#date').on('input', function() {
            var date = $('#date').val();
            var prescription_doctor_id = $('#prescription_doctor_id').val();
            $.get("{{ route('check-serial') }}", {
                date: date,
                prescription_doctor_id: prescription_doctor_id
            }, function(data) {
                if (data == 'false') {
                    $('#serial_preview').html('<p class="text-danger">No serial available</p>');
                } else {
                    $('#serial_preview').html(data);
                }
            })
        })

        function approveAppointment(appointment_id) {
            let url = "{{ route('appointments.approve') }}";
            //alert
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to approve this appointment!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, Approve it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            appointment_id: appointment_id
                        },
                        success: function(response) {
                            Swal.fire(
                                'Approved!',
                                'Appointment has been approved.',
                                'success'
                            )
                            location.reload();
                        }
                    });
                }
            });
        }
        $("body").on('click', '.serial_id', function() {
            var serial_no = $(this).attr('data-item');
            $("#serial_no").val(serial_no);
            $('.serial_id').removeClass('btn-danger').addClass('btn-success').not(".disabled");
            $(this).removeClass('btn-success').addClass('btn-danger').not(".disabled");
        });
    </script>
@endsection
