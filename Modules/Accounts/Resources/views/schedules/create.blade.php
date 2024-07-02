@extends('master.master')
@section('title', 'Schedule - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $is_old = old('client_no') ? true : false;
        $form_heading = !empty($schedule->id) ? 'Update' : 'Add';
        $form_url = !empty($schedule->id) ? route('schedule.update', $schedule->id) : route('schedule.store');
        $form_method = !empty($schedule->id) ? 'PUT' : 'POST';
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
                                            <span style="margin-top: 5px;">Schedules</span>
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
                                    class="table custom-table dataTable no-footer table-striped table-bordered">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Doctor Name</th>
                                            <th>Day</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Per Patient Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="serviceTable">
                                        @foreach ($schedules as $schedule)
                                            <tr id="tr{{ $schedule->id }}">
                                                <td>{{ $schedule->doctor->name }}</td>
                                                <td>{{ $schedule->day }}</td>
                                                <td>{{ Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}</td>
                                                <td>{{ Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}</td>
                                                <td>{{ $schedule->per_patient_time }}</td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <button onclick="editSchedule({{ $schedule->id }})"
                                                                class="btn btn-sm btn-outline-success"
                                                                style="background:inherit;" title="Edit" type="submit"><i
                                                                    class="fas fa-edit text-success"></i></button>
                                                            <button onclick="deleteSchedule({{ $schedule->id }})"
                                                                class="btn btn-sm btn-outline-danger"
                                                                style="background:inherit;" title="Delete" type="submit"><i
                                                                    class="fas fa-trash-alt text-danger"></i></button>
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
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Schedule</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class=" mb-3">
                                    <label>Doctor</label>
                                    <select class="form-control" name="prescription_doctor_id">
                                        <option selected>Select Doctor</option>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="AdviceRow">
                                    <label>Availability</label>
                                    <div class="day_row">
                                        <div class="input-group mb-3">
                                            <select name="day[]" class="form-control" required="">
                                                <option value="Saturday">Saturday</option>
                                                <option value="Sunday">Sunday</option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                            </select>
                                            <input type="time" name="start_time[]" class="form-control" required=" ">
                                            <input type="time" name="end_time[]" class="form-control" required="">
                                            <div class="input-group-addon" id="addRow">
                                                <div class="input-group-text" id="basic-addon1"><i
                                                        style="color: green;cursor: pointer;" class="fas fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Per Patient Time in minute(Ex: 15)</label>
                                    <input type="text" name="per_patient_time" id="per_patient_time" class="form-control"
                                        required="">
                                </div>
                            </div>
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




        function deleteSchedule(schedule_id) {
            console.log(schedule_id);
            let url = "{{ route('schedule.destroy', ':id') }}";
            url = url.replace(':id', schedule_id);
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
                            $('#tr' + schedule_id).remove();
                            Swal.fire(
                                'Deleted!',
                                'Schedule has been deleted.',
                                'success'
                            )
                        }
                    });
                }
            });
        }


        function editSchedule(schedule_id) {

            let schedules = @json($schedules);
            schedules.find(schedule => {
                console.log(schedule);
                if (schedule.id == schedule_id) {
                    $('select[name="prescription_doctor_id"]').val(schedule.prescription_doctor_id);
                    $('input[name="day[]"]').val(schedule.day);
                    $('input[name="start_time[]"]').val(schedule.start_time);
                    $('input[name="end_time[]"]').val(schedule.end_time);
                    $('#addRow').closest('.input-group-addon').remove();
                    $('form').data('id', schedule.id);
                    $('input[name="per_patient_time"]').val(schedule.per_patient_time);
                    let form_url = "{{ route('schedule.update', ':id') }}";
                    form_url = form_url.replace(':id', $('form').data('id'));
                    $('form').attr('action', form_url);
                    $('form').attr('method', 'POST');
                    $('form').append('<input type="hidden" name="_method" value="PUT">');
                }
                $('#exampleModal').modal('show');
            });
        }

        $('#addRow').on('click', function() {
            let clone_row = $('#AdviceRow').find('.day_row').first().clone();
            clone_row.find('input').val('');
            clone_row.find('select').val('');
            clone_row.find('.input-group-addon').html(
                '<div class="input-group-text" id="basic-addon1"><i style="color: red;cursor: pointer;" class="fas fa-minus removeRow"></i></div>'
            );
            $('#AdviceRow').append(clone_row);

        })

        $(document).on('click', '.removeRow', function() {
            $(this).closest('.day_row').remove();
        });
    </script>
@endsection
