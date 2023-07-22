@extends('master.master')
@section('title', 'Attendance - Hospice Bangladesh')
@section('main_content')
    @parent
    <style type="text/css">
        @import 'https://fonts.googleapis.com/css?family=Open+Sans';

        #date {
            background: rgba(0, 0, 0, 0.1);
            color: #fff;
            font-family: "Open Sans", sas-serif;
            font-size: 2em;
            padding: 0.5em;
            text-align: center;
        }

        #clock {
            align-items: center;
            -webkit-align-items: center;
            display: flex;
            display: -webkit-flex;
            height: 130px;
            justify-content: space-around;
            -webkit-justify-content: space-around;
            left: calc(50% - 300px);
            position: relative;
            width: 600px;
        }

        .unit {
            background: linear-gradient(#aaa, #777);
            border-radius: 15px;
            box-shadow: 0 2px 2px #444;
            color: #fff;
            font-family: "Open Sans", sans-serif;
            font-size: 5em;
            height: 100%;
            line-height: 130px;
            margin: 0 10px;
            text-align: center;
            text-shadow: 0 2px 2px #666;
            width: 23%;
        }
    </style>
    <!-- *************
         ************ Main container start *************
        ************* -->
    <div class="main-container">
        <!-- Start Add Modal -->
        <div class="modal fade bd-example-modal-xl" id="reportModel" tabindex="-1" role="dialog"
            aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel">Get Attendance Reports</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('admin/attendance-report', Auth::id()) }}" method="post" id="form">
                        @csrf
                        <div class="modal-body">
                            <div class="row gutters">
                                <div class="col-4">
                                    <div class="form-group">
                                        <div style="font-weight: bold;">Month</div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><span
                                                        class="icon-calendar"></span></span>
                                            </div>
                                            <select class="form-control" name="month" id="month">
                                                <option value="">Select Month</option>
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">Aguest</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <div style="font-weight: bold;">Year</div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><span
                                                        class="icon-calendar"></span></span>
                                            </div>
                                            <select class="form-control" name="year" id="years">
                                                <option value="">Select Year</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                                <option value="2031">2031</option>
                                                <option value="3032">2032</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <div style="font-weight: bold;">Employee</div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><span
                                                        class="icon-calendar"></span></span>
                                            </div>
                                            <select class="form-control" @if (Auth::user()->type == 'staff') readonly @endif
                                                name="staff_id" id="staff_id">
                                                <option value="all">All</option>
                                                @foreach ($staffs as $staff)
                                                    <option @if (Auth::id() == $staff->user_id) selected @endif
                                                        value="{{ $staff->user_id }}">{{ $staff->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Get Reports</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <!-- End Add Modal -->

        <!-- Page header end -->
        <!-- Content wrapper start -->
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">

                <!-- Row start -->
                <div class="row gutters">
                    <div class="table-container  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="t-header">Get Attendance Report <button type="button" class="btn btn-sm m-0 p-0"
                                style="background:inherit" title="Get Report" data-toggle="modal"
                                data-target="#reportModel"><i class="fas m-0 p-0 fa-eye text-info"></i></button></div>
                        <form action="{{ url('admin/add-attendance') }}" method="post">
                            @csrf
                            <h1 class="text-center">Attendance</h1>
                            <p id="date"></p>
                            <div id="clock">
                                <p class="unit" id="hours"></p>
                                <p class="unit" id="minutes"></p>
                                <p class="unit" id="seconds"></p>
                                <p class="unit" id="ampm"></p>
                            </div>
                            <div class="row" style="margin-top: 80px;"></div>
                            <div class="col-6 text-center" style="margin: auto;">
                                <div class="row gutters">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><span
                                                            class="icon-account_box"></span></span>
                                                </div>
                                                <input type="text" class="form-control" readonly="true"
                                                    placeholder="name" id="name" name="name"
                                                    aria-label="Username" aria-describedby="basic-addon1"
                                                    value="{{ Auth::user()->name }}">
                                                <input type="hidden" class="form-control" placeholder="name"
                                                    id="staff_id" name="staff_id" aria-label="Username"
                                                    aria-describedby="basic-addon1" value="{{ Auth::id() }}">
                                                @php
                                                    $time = Carbon\Carbon::now()->format('g:ia');
                                                    $day = Carbon\Carbon::now()->format('d-m-Y');
                                                @endphp
                                                <input type="hidden" name="entry_time" value="{{ $time }}">
                                                <input type="hidden" name="exit_time" value="{{ $time }}">
                                                <input type="hidden" name="date" value="{{ $day }}">
                                            </div>
                                        </div>

                                        <button class="btn mr-3 btn-success" name="submit" type="submit"
                                            value="entry">Entry</button>
                                        <button class="btn ml-4 btn-danger" name="submit" type="submit"
                                            value="exit">Leave</button>

                                    </div>

                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- Row end -->
        </div>
        <!-- Fixed body scroll end -->
    </div>
    <!-- Content wrapper end -->
    </div>
    <!-- *************
         ************ Main container end *************
        ************* -->
    <!-- edit modals -->
    <div id="edit_modal_body">

    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (Session::has('success'))
        <script type="text/javascript">
            Toast.fire({
                icon: 'success',
                title: '{!! Session::get('success') !!}',
            })
        </script>
        @php Session::forget('success') @endphp
    @endif
    @if (Session::has('error'))
        <script type="text/javascript">
            Toast.fire({
                icon: 'success',
                title: '{!! Session::get('error') !!}',
            })
        </script>
    @endif
    @php Session::forget('error') @endphp
    <script type="text/javascript">
        var $dOut = $('#date'),
            $hOut = $('#hours'),
            $mOut = $('#minutes'),
            $sOut = $('#seconds'),
            $ampmOut = $('#ampm');
        var months = [
            'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
            'November', 'December'
        ];

        function update() {
            var days = [
                'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
            ];
            var date = new Date();
            var ampm = date.getHours() < 12 ?
                'AM' :
                'PM';
            var hours = date.getHours() == 0 ?
                12 :
                date.getHours() > 12 ?
                date.getHours() - 12 :
                date.getHours();
            var minutes = date.getMinutes() < 10 ?
                '0' + date.getMinutes() :
                date.getMinutes();
            var seconds = date.getSeconds() < 10 ?
                '0' + date.getSeconds() :
                date.getSeconds();
            var dayOfWeek = days[date.getDay()];
            var month = months[date.getMonth()];
            var day = date.getDate();
            var year = date.getFullYear();
            var dateString = dayOfWeek + ', ' + month + ' ' + day + ', ' + year;
            $dOut.text(dateString);
            $hOut.text(hours);
            $mOut.text(minutes);
            $sOut.text(seconds);
            $ampmOut.text(ampm);
        }
        update();
        window.setInterval(update, 1000)
    </script>
@endsection
