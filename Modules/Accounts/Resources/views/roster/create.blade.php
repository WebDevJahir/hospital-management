@extends('master.master')
@section('title', 'Investigation Category - Hospice Bangladesh')
@section('main_content')
    <link rel="stylesheet" href="/assets/calendar/fullcalendar.min.css" />
    <style>
        .fc-title {
            color: white !important;
        }
    </style>
    @parent
    <div class="main-container">
        <div class="content-wrapper">
            <div class="fixedBodyScroll">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <div class="form-group">
                            <label for="patient_id">Patient</label>
                            <select name="patient_id" id="patient_id" class="form-control">
                                <option value="">Select Patient</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">
                                        {{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Patient Information</h4>
                                <hr />
                                {{-- name, contact address --}}
                                <table>
                                    <tr>
                                        <td style="font-weight: bold;">Name</td>
                                        <td>:</td>
                                        <td id="patient_name"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Registration No</td>
                                        <td>:</td>
                                        <td id="reg_no"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Address</td>
                                        <td>:</td>
                                        <td id="patient_address"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Contact</td>
                                        <td>:</td>
                                        <td id="contact_no"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <hr />
                        <p>Same month patient list</p>
                        <div class="card">
                            <div class="card-body">
                                <ol id="patientListTable">

                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                        <div class="container">
                            <div class=""></div>
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="edit_modal_body"></div>
    </div>
@endsection
@section('script')
    <script src="/assets/calendar/fullcalendar.min.js"></script>
    <script src="/assets/calendar/moment.min.js"></script>
    <script>
        $(document).ready(function() {
            var SITEURL = "{{ url('/') }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = "{{ route('roster.create') }}";

            window.localStorage.setItem("month", 0);
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: SITEURL + '/accounts/get-roster/' + '{{ $patient_id }}',
                displayEventTime: true,
                editable: true,
                eventOrderStrict: false,
                eventOrder: 'id',
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                eventAfterAllRender: function(view) {
                    var day = moment(view.start).format('DD');
                    var month = moment(view.start).format('MM');
                    var year = moment(view.start).format('YYYY');
                    $('#patientListTable').html(null);
                    switch (month) {
                        case '01':
                            b = "January";
                            break;
                        case '02':
                            b = "February";
                            break;
                        case '03':
                            b = "March";
                            break;
                        case '04':
                            b = "April";
                            break;
                        case '05':
                            b = "May";
                            break;
                        case '06':
                            b = "June";
                            break;
                        case '07':
                            b = "July";
                            break;
                        case '08':
                            b = "August";
                            break;
                        case '09':
                            b = "September";
                            break;
                        case '10':
                            b = "October";
                            break;
                        case '11':
                            b = "November";
                            break;
                        case '12':
                            b = "December";
                            break;
                    }
                    $htmlmonth = b + ', ' + year;
                    $('#patient_month').html($htmlmonth);
                    $.get('{{ route('get-same-month-roster-patient') }}', {
                        month: month,
                        year: year
                    }, function(data) {
                        $('#patientListTable').html(null);
                        $htmldata = '';
                        for (const [key, value] of Object.entries(data)) {
                            $htmldata = $htmldata +
                                '<li><a class="text-success patient-link" style="text-decoration:none; cursor:pointer" onclick="editView(' +
                                value.patient.id + ')">' + value.patient.name +
                                '</a></li>';
                            console.log(`${key}: ${value}`);
                        }
                        if (data.length == 0) {
                            $htmldata =
                                '<li class="text-danger patient-link">No Data Found</li>'
                        }
                        $('#patientListTable').html($htmldata);
                    });
                },
                selectable: true,
                selectHelper: true,
                showNonCurrentDates: false,
                select: function(start, end, allDay) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                    $('#edit_modal_body').html("");
                    $.get('{{ route('roster-add-modal-view') }}', {
                        date: start,
                        patient_id: '{{ $patient_id }}'
                    }, function(data) {
                        $('#edit_modal_body').html(data);

                        $('#addModal').modal('show');
                    });
                    calendar.fullCalendar('unselect');
                },
                eventClick: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    $('#edit_modal_body').html("");
                    $.get('{{ route('roster-add-modal-view') }}', {
                        date: start,
                        patient_id: '{{ $patient_id }}'
                    }, function(data) {
                        $('#edit_modal_body').html(data);
                        $('#addModal').modal('show');
                    });
                    calendar.fullCalendar('unselect');
                }
            });

        });

        function displayMessage(message) {
            $(".response").html("<div class='success'>" + message + "</div>");
            setInterval(function() {
                $(".success").fadeOut();
            }, 1000);
        };
    </script>
    <script type="text/javascript">
        $(function() {
            $('#patient_id').change(function() {
                window.location.href = "{{ route('roster.create') }}" + "?patient_id=" + $(
                    '#patient_id').val();
            });
        });

        function editView(patient) {
            window.location.href = "https://app.hospicebangladesh.com/roster-entry" + "/" + patient;
        }
    </script>
@endsection
