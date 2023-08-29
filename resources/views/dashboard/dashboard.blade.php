@extends('master.master')
@section('title', 'Dashboard - Hospice Bangladesh')
@section('main_content')
    @parent
    <style>
        label {
            margin: 0px;
        }

        div.dataTables_wrapper div.dataTables_filter {
            padding: 8px 0 5px 0;
        }

        th {
            background: #e3e9ff;
        }

        .fixed-n {
            height: calc(103vh - 370px);
        }

        .fixed-c {
            height: calc(103vh - 372px);
        }
    </style>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- Loading starts -->
    <div id="loading-wrapper">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Loading ends -->
    <!-- *************
         ************ Main container start *************
     ************* -->
    <div class="main-container">
        <!-- Page header start -->
        <!-- Page header end -->
        <!-- Content wrapper start -->
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                        @php $patients = Modules\Patient\Entities\Patient::get(); @endphp
                        <!-- Widget start -->
                        <div class="mini-widget red">
                            <div class="mini-widget-header">
                                <div>Registered Patient</div>
                                <div></div>
                            </div>
                            <div class="mini-widget-body">
                                <i class="icon-twitter1"></i>
                                <a href="{{ 'patient-list' }}" style="color:white">
                                    <div class="number">{{ $patients->count() }}</div>
                                </a>
                            </div>
                        </div>
                        <!-- Widget end -->
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">

                        <!-- Widget start -->
                        <div class="mini-widget">
                            <div class="mini-widget-header">
                                <div>Subscribed Patient</div>
                                <div></div>
                            </div>
                            <div class="mini-widget-body">
                                <i class="icon-shopping-bag1"></i>
                                <a href="{{ 'subscribed-patient-prescription' }}" style="color:white">
                                    <div class="number">
                                        {{ $patients->where('package_id', '!=', 13)->where('status', 'Active')->count() }}
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- Widget end -->
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">

                        <!-- Widget start -->
                        <div class="mini-widget grey">
                            <div class="mini-widget-header">
                                <div>New Subscribed Patents</div>
                                <div></div>
                            </div>
                            <div class="mini-widget-body">
                                <i class="icon-thumbs-up1"></i>
                                <div class="number">
                                    {{ Modules\Patient\Entities\Patient::where('package_id', '!=', 13)->whereMonth('created_at', Carbon\Carbon::now()->format('m'))->where('status', 'Active')->count() }}
                                </div>
                            </div>
                        </div>
                        <!-- Widget end -->
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">

                        <!-- Widget start -->
                        <div class="mini-widget red">
                            <div class="mini-widget-header">
                                <div>Ambulance Request</div>
                                <div></div>
                            </div>
                            <div class="mini-widget-body">
                                <i class="icon-box"></i>
                                <a href="{{ 'due-invoice-list' }}" style="color:white">
                                    <div class="number">
                                        {{-- {{ App\Invoice::where('invoice_type', 'ambulance_support')->where('payment_status', 'due')->whereDate('created_at', Carbon\Carbon::now()->toDateString())->count() }} --}}
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- Widget end -->
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">

                        <!-- Widget start -->
                        <div class="mini-widget">
                            <div class="mini-widget-header">
                                <div>Payment Pending</div>
                                <div></div>
                            </div>
                            <div class="mini-widget-body">
                                <i class="icon-shopping-bag1"></i>
                                <a href="{{ 'payment-pending-patient' }}" style="color:white">
                                    <div class="number">
                                        {{ $patients->where('status', 'Payment Pending')->count() }}</div>
                                </a>
                            </div>
                        </div>
                        <!-- Widget end -->
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">

                        <!-- Widget start -->
                        <div class="mini-widget grey">
                            <div class="mini-widget-header">
                                <div>Total Due Invoice</div>
                                <div></div>
                            </div>
                            <div class="mini-widget-body">
                                <i class="icon-thumbs-up1"></i>
                                <a href="{{ 'due-invoice-list' }}" style="color:white">
                                    {{-- <div class="number">{{ App\Invoice::where('payment_status', '=', 'due')->count() }}
                                    </div> --}}
                                </a>
                            </div>
                        </div>
                        <!-- Widget end -->
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="text-center"
                            style="border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;">
                            <a class="weatherwidget-io" href="https://forecast7.com/en/23d8190d41/dhaka/"
                                data-label_1="DHAKA" data-label_2="WEATHER" data-theme="original">DHAKA WEATHER</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="text-center"
                            style="border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;">
                            Todays Next Plan Patient
                        </div>
                        @php
                            // $next_plans = App\NextPlan::where('notification_date', Carbon\Carbon::now()->toDateString())->get();
                            // $data_count = $next_plans->count();
                            
                        @endphp
                        <div style="border:1px solid black;padding:0px 10px; width: 100%;" class="fixed-n">
                            <div class="table-responsive">
                                <table id="followUpList" class="table custom-table">
                                    <thead>
                                        <th>Patient Name</th>
                                        <th>Plan</th>
                                        <th>Notification Date</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody id="serviceTable">
                                        @foreach ($next_plans as $key => $plan)
                                            <tr id="tr{{ $plan->id }}">
                                                <td>{{ Modules\Patient\Entities\Patient::where('id', $plan->patient_id)->first()->patient_name }}
                                                </td>
                                                <td>{{ $plan->next_plan }}</td>
                                                <td>{{ $plan->notification_date }}</td>
                                                <td>
                                                    <a class="btn m-0 p-0 btn-sm" style="background:inherit"
                                                        title="Generate"
                                                        href="{{ url('/prescription', $plan->patient_id) }}"
                                                        type="submit"><i style="font-size:18px;"
                                                            class="p-0 m-0 fas fa-prescription text-success"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach

                                        @for ($i = 0; $i < 5 - $data_count; $i++)
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td></td>
                                                <td></td>
                                                <td>

                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody> --}}
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="text-center"
                            style="border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;">
                            Google Calender
                        </div>
                        <div style="border:1px solid black">
                            <iframe class="fixed-c"
                                src="https://calendar.google.com/calendar/embed?src=hospicebangladesh%40gmail.com&ctz=Asia%2FDhaka&title=Hospice%20Calendar"
                                style="border: 0" width="100%" frameborder="0" scrolling="no"></iframe>
                            <!-- Widget end -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Fixed body scroll end -->

        </div>
        <!-- Content wrapper end -->
    </div>

@endsection
@section('script')

    <script>
        ! function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://weatherwidget.io/js/widget.min.js';
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, 'script', 'weatherwidget-io-js');
    </script>
    <script type="text/javascript">
        $(function() {
            $('#followUpList').DataTable({
                'iDisplayLength': 4,
                "language": {
                    "lengthMenu": "Show _MENU_ plan per page",
                    "info": "Showing Page _PAGE_ of _PAGES_",
                },
                "order": [],
                "pageLength": 5,
            });
        });

        function deleteNextPlan(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('{{ url('delete-next-plan') }}', {
                        _token: '{{ @csrf_token() }}',
                        id: id
                    }, function(data) {
                        $('#tr'.concat(id)).remove();
                        Toast.fire({
                            icon: 'success',
                            title: 'Next Plan has been deleted.',
                        })
                    });
                }
            })
        }
    </script>
@endsection
