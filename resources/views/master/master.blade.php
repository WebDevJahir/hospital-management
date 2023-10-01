<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta -->
    <meta name="description" content="Hospice Bangladesh Ltd">
    <meta name="author" content="E-Light Software ltd">
    <link rel="shortcut icon" href="{{ asset('/assets/img/logo.png') }}" />
    <!-- Title -->
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script>
    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/daterange/daterange.css') }}" />
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTable.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/wizard/jquery.steps.css') }}" />
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/wizard/jquery.steps.custom.js') }}"></script>

    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>
    <style type="text/css">
        .select2-container--default .select2-selection--single {
            padding: 6px;
            height: 35px;
            z-index: 5000;
        }

        .help-inline {
            color: red;
        }

        .swal-wide {
            width: 850px !important;
        }

        .select2-container--default .select2-selection--single {
            border-radius: 0px !important;
        }

        .rotate {
            animation: spinner-animation 1s linear infinite reverse;
        }

        @keyframes spinner-animation {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    @php
        $role = \Modules\Admin\Entities\Role::whereId(auth()->user()->role_id)->first();
        $userPermission = \App\UserPermission::where('role', $role->id)->first();
        if ($userPermission) {
            $permission = json_decode($userPermission->permission);
            Illuminate\Support\Facades\Session::put('permission', $permission);
        } else {
            return redirect('login');
        }
        // $unseen = Auth::user()->chat->where('seen','0')->unique('from_id')->count('from_id');
    @endphp

    <!-- *************s
   ************ Header section start *************
  ************* -->
    <!-- Header start -->
    <header class="header" style="height: 45px;">
        <div class="logo-wrapper text-center">
            <span class="dropdown">
                <a href="#" id="userSettings" class="logo" data-toggle="dropdown" aria-haspopup="true">
                    <img style="margin: auto;" src="{{ asset('assets/img/logo.png') }}"
                        alt="E-Light Admin Dashboard" />
                </a>
                <div class="dropdown-menu" style="top:20px!important" aria-labelledby="userSettings">
                    <div class="header-profile-actions">
                        <div class="header-user-profile">
                            <div class="header-user">
                                <img src="assets/img/logo.png" alt="Admin Template" />
                            </div>
                            <h5>Hospice Bangladesh</h5>
                            <p>{{ auth()->user()->name }}</p>
                            <a class="bg-primary text-white" href="{{ url('logout') }}"><i class="icon-log-out1"></i>
                                Sign Out</a>
                        </div>
                    </div>
                </div>
            </span>
        </div>
        <div class="header-items">
            <!-- Header actions start -->
            <ul class="header-actions">
                <!-- Navigation start -->
                <nav class="navbar navbar-expand-lg custom-navbar">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bluemoonNavbar"
                        aria-controls="bluemoonNavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i></i>
                            <i></i>
                            <i></i>
                        </span>
                    </button>
                    @php
                        // $user = App\Models\User::where('id', 40)->first();
                        // dd($user);
                        // $total_notification = auth()->user()->notifications->where('read_at', '')->count();
                    @endphp
                    <div class="collapse navbar-collapse" id="bluemoonNavbar">
                        <li class="dropdown">
                            <a href="{{ url('/attendance') }}">
                                <i class="fas fa-user-check" style="color: #ff7600;font-size: 18px;"></i>
                                <span class="count-label"
                                    style="color: #ff7600;font-size: 14px;margin-right: 10px;"></span>
                            </a>
                        </li>
                        {{-- @if (in_array(400, $permission))
                            <li class="dropdown">
                                <a href="" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                                    <i class="icon-bell" style="color: #ff7600;font-size: 18px;"></i>
                                    <span class="count-label"
                                        style="color: #ff7600;font-size: 14px;margin-right: 10px;">{{ $total_notification }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications"
                                    style="padding: 0 !important;">
                                    <ul class="header-notifications">
                                        @php   $count = 1; @endphp

                                        @foreach (auth()->user()->unreadNotifications as $notification)
                                            @php $data = $notification->data; @endphp
                                            @if ($count < 15)
                                                <li><span onclick="markAsRead({{ $notification }})">
                                                        <div class="details">
                                                            <div style="padding: 9px;border-bottom: 1px solid gray; color: black; cursor: pointer;"
                                                                class="noti-details">
                                                                {{ $count++ }}. {{ $data['message'] }}
                                                            </div>
                                                        </div>
                                                    </span>
                                                </li>
                                            @endif
                                        @endforeach
                                        @foreach (auth()->user()->readNotifications as $notification)
                                            @php $data = $notification->data; @endphp
                                            @if ($count < 15)
                                                <li><span>
                                                        <div class="details">
                                                            <div style="padding: 9px;border-bottom: 1px solid gray; color: gray; cursor: pointer;"
                                                                class="noti-details">
                                                                {{ $count++ }}. {{ $data['message'] }}
                                                            </div>
                                                        </div>
                                                    </span>
                                                </li>
                                            @endif
                                        @endforeach
                                        <li>
                                            <span>
                                                <div class="details">
                                                    <div style="padding: 9px;border-bottom: 1px solid gray; color: gray; cursor: pointer;"
                                                        class="noti-details">
                                                        <a href="{{ url('view-all-notification') }}">View all
                                                            notification</a>
                                                    </div>
                                                </div>
                                            </span>
                                        </li>
                                        <!-- <li>
                                            <a href="#">
                                                <div class="user-img online">
                                                <img src="img/user6.png" alt="User" />
                                                </div>
                                                <div class="details">
                                                <div class="user-title">Larkyn</div>
                                                <div class="noti-details">Check out every table in detail.</div>
                                                <div class="noti-date">Oct 15, 04:00 pm</div>
                                                </div>
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                            </li>
                        @endif --}}
                        @if (in_array(235, $permission))
                            {{-- <li>
        						    <a href="{{url('chat')}}">
        						        <i class="fab fa-facebook-messenger" style="color: #ff7600;font-size: 18px;"></i>
        							    <span class="count-label" style="color: #ff7600;font-size: 14px;margin-right: 10px;">{{$unseen}}</span> 
        							</a>
        						</li> --}}
                        @endif
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link active-page" href="{{ url('dashboard') }}"
                                    id="dashboardsDropdown" role="button">
                                    <i class="icon-home2 nav-icon" style="float:left;padding-right: 5px;"></i>
                                    Dashboards
                                </a>
                            </li>

                            @include('admin::layouts.sidebar')

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-users nav-icon" style="float:left;padding-right: 5px;"></i>
                                    Patient
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                                    @if (in_array(110, $permission))
                                        <li>
                                            <a class="dropdown-item" href="{{ url('patient-list') }}"><span
                                                    class="icon-person_add"></span> New Registration</a>
                                        </li>
                                    @endif
                                    @if (in_array(114, $permission))
                                        <li>
                                            <a class="dropdown-item" href="{{ url('plan-and-status') }}"><span
                                                    class="icon-help_outline"></span> Plan & status</a>
                                        </li>
                                    @endif
                                    @if (in_array(118, $permission))
                                        <li>
                                            <a class="dropdown-item" href="{{ url('reports') }}"><span
                                                    class="icon-record_voice_over"></span> Registration Report</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>

                            @include('monitoring::layouts.sidebar')

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="uiElementsDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="icon-edit1 nav-icon" style="float:left;padding-right: 5px;"></i>
                                    Diagnostic Lab
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="uiElementsDropdown">
                                    @if (in_array(183, $permission))
                                        <li>
                                            <a class="sub-nav-link"
                                                href="{{ url('hospice-investigation-category-list') }}">
                                                <span class="icon-trending_up"></span> Category
                                            </a>
                                        </li>
                                    @endif
                                    @if (in_array(195, $permission))
                                        <li>
                                            <a class="sub-nav-link"
                                                href="{{ url('hospice-investigation-sub-category-list') }}">
                                                <span class="icon-trending-down"></span> Sub Category
                                            </a>
                                        </li>
                                    @endif
                                    @if (in_array(199, $permission))
                                        <li>
                                            <a class="sub-nav-link"
                                                href="{{ url('hospice-investigation-reports-list') }}">
                                                <span class="icon-server"></span>Lab Report
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="uiElementsDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="icon-edit1 nav-icon" style="float:left;padding-right: 5px;"></i>
                                    ERP Entry
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="uiElementsDropdown">
                                    @if (in_array(183, $permission))
                                        <li>
                                            <a class="dropdown-toggle sub-nav-link" href=""
                                                id="buttonsDropdown" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="icon-trending_up"></span> Invoice
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="buttonsDropdown">
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('invoice-list') }}"><span
                                                            class="icon-twitter1"></span>Invoice</a>
                                                </li>
                                                @if (in_array(193, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('due-invoice-list') }}"><span
                                                                class="icon-insert_invitation"></span> Due Invoice</a>
                                                    </li>
                                                @endif
                                                @if (in_array(194, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('paid-invoice-list') }}"><span
                                                                class="icon-event_available"></span> Paid Invoice</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                    @if (in_array(195, $permission))
                                        <li>
                                            <a class="dropdown-toggle sub-nav-link" href="#"
                                                id="buttonsDropdown" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="icon-trending-down"></span> Expense
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="buttonsDropdown">
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('voucher-list') }}"><span
                                                            class="icon-send1"></span> Debit Voucher</a>
                                                </li>
                                                @if (in_array(197, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('due-expence-list') }}"><span
                                                                class="icon-restore"></span> Due Expense</a>
                                                    </li>
                                                @endif
                                                @if (in_array(198, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('paid-expence-list') }}"><span
                                                                class="icon-highlight_off"></span> Paid Expense</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                    @if (in_array(199, $permission))
                                        <li>
                                            <a class="dropdown-toggle sub-nav-link" href="#"
                                                id="buttonsDropdown" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="icon-server"></span> Inventory
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="buttonsDropdown">
                                                @if (in_array(200, $permission))
                                                    <li>
                                                        <a class="dropdown-item" href="{{ url('buy-list') }}"><span
                                                                class="icon-plus-circle"></span> Buy</a>
                                                    </li>
                                                @endif
                                                @if (in_array(204, $permission))
                                                    <li>
                                                        <a class="dropdown-item" href="{{ url('sell-list') }}"><span
                                                                class="icon-minus-circle"></span> Sell</a>
                                                    </li>
                                                @endif
                                                @if (in_array(208, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('buy-and-sell-reports') }}"><span
                                                                class="icon-target"></span> Total</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                    @if (in_array(209, $permission))
                                        <li>
                                            <a class="dropdown-toggle sub-nav-link" href="#"
                                                id="buttonsDropdown" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="icon-layers2"></span> Roster
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="buttonsDropdown">
                                                @if (in_array(210, $permission))
                                                    <li>
                                                        <a class="dropdown-item" href="{{ url('roster-entry') }}"><i
                                                                class="icon-edit1 "></i> Entry</a>
                                                    </li>
                                                @endif
                                                @if (in_array(211, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('roster-duty-report') }}"><i
                                                                class="icon-printer nav-icon"></i> Report</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                    @if (in_array(212, $permission))
                                        <li>
                                            <a class="dropdown-toggle sub-nav-link" href="#"
                                                id="buttonsDropdown" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="icon-layers2"></span> Salary
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="buttonsDropdown">
                                                @if (in_array(213, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('salary-list') }}"><span
                                                                class="icon-dollar-sign"></span>Add Salary</a>
                                                    </li>
                                                @endif
                                                @if (in_array(214, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('salary-report-list') }}"><span
                                                                class="icon-dollar-sign"></span>Salary Report</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                    @if (in_array(215, $permission))
                                        <li>
                                            <a class="dropdown-toggle sub-nav-link" href="#"
                                                id="buttonsDropdown" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="icon-layers2"></span> Leave
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="buttonsDropdown">
                                                @if (in_array(216, $permission))
                                                    <li>
                                                        <a class="dropdown-item" href="{{ url('leave-list') }}"><span
                                                                class="icon-clock1"></span> Leave Application</a>
                                                    </li>
                                                @endif
                                                @if (in_array(218, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('unapprove-leave-list') }}"><span
                                                                class="icon-log-in"></span> Pending List</a>
                                                    </li>
                                                @endif
                                                @if (in_array(217, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('approve-leave-list') }}"><i
                                                                class="icon-printer nav-icon"></i> Approve List</a>
                                                    </li>
                                                @endif
                                                @if (in_array(219, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('leave-report-list') }}"><span
                                                                class="icon-clock1"></span> Leave Report</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                    @if (in_array(220, $permission))
                                        <li>
                                            <a class="dropdown-toggle sub-nav-link" href="#"
                                                id="calendarsDropdown" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="icon-file-plus"></span>Bed
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="calendarsDropdown">
                                                @if (in_array(221, $permission))
                                                    <li>
                                                        <a class="dropdown-item" href="{{ url('bed-list') }}"><span
                                                                class="icon-file-plus"></span> Add Bed </a>
                                                    </li>
                                                @endif
                                                @if (in_array(222, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('bed-assign-list') }}"><span
                                                                class="icon-archive"></span>Assign Bed</a>
                                                    </li>
                                                @endif
                                                @if (in_array(223, $permission))
                                                    <li>
                                                        <a class="dropdown-item" href="{{ url('bed-report') }}"><span
                                                                class="icon-clock1"></span> Bed Report</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                    @if (in_array(224, $permission))
                                        <li>
                                            <a class="dropdown-toggle sub-nav-link" href="#"
                                                id="calendarsDropdown" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span style="margin-right: 3px;"><i
                                                        class="fas fa-bed"></i></span>Instrument
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="calendarsDropdown">
                                                @if (in_array(225, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('instrument-rent-list') }}"><span
                                                                class="icon-file-plus"></span> Add Instrument </a>
                                                    </li>
                                                @endif
                                                @if (in_array(226, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('instrument-assign-list') }}"><span
                                                                class="icon-archive"></span>Assign Instrument</a>
                                                    </li>
                                                @endif
                                                @if (in_array(227, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('instrument-report') }}"><span
                                                                class="icon-clock1"></span> Instrument</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                    @if (in_array(241, $permission))
                                        <li>
                                            <a class="dropdown-toggle sub-nav-link" href="#"
                                                id="calendarsDropdown" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span style="margin-right: 3px;"><i
                                                        class="fas fa-bed"></i></span>Schedule & Booking
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="calendarsDropdown">
                                                @if (in_array(242, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('schedule-list') }}"><span
                                                                class="icon-file-plus"></span> Add Schedule </a>
                                                    </li>
                                                @endif
                                                @if (in_array(243, $permission))
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url('appointment-list') }}"><span
                                                                class="icon-archive"></span>Add Appointment</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="tablesDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="icon-printer nav-icon" style="float:left;padding-right: 5px;"></i>
                                    ERP Report
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="tablesDropdown">
                                    @if (in_array(229, $permission))
                                        <li>
                                            <a class="dropdown-item" href="{{ url('payment-list') }}"><span
                                                    class="icon-file-text"></span> Payments</a>
                                        </li>
                                    @endif
                                    @if (in_array(230, $permission))
                                        <li>
                                            <a class="dropdown-item" href="{{ url('cash-book') }}"><i
                                                    class="icon-book-open"></i> Cash Book</a>
                                        </li>
                                    @endif
                                    @if (in_array(231, $permission))
                                        <li>
                                            <a class="dropdown-item" href="{{ url('cash-book-subcat') }}"><i
                                                    class="icon-book-open"></i> Cash Book by Sub-Cat</a>
                                        </li>
                                    @endif
                                    @if (in_array(232, $permission))
                                        <li>
                                            <a class="dropdown-item" href="{{ url('cash-book-head') }}"><i
                                                    class="icon-book-open"></i> Cash Book by In-Head</a>
                                        </li>
                                    @endif
                                    @if (in_array(233, $permission))
                                        <li>
                                            <a class="dropdown-item" href="{{ url('provident-fund-report') }}"><span
                                                    class="icon-loader"></span> Provident Fund</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="layoutsDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="icon-radio nav-icon" style="float:left;padding-right: 5px;"></i>
                                    Communication
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="layoutsDropdown">
                                    @if (in_array(235, $permission))
                                        {{-- <li>
										<a class="dropdown-item" href="{{url('/chat')}}"><span class="icon-chat"></span> Chat<span style="color:red;font-weight:bold;">({{$unseen}})</span></a>
									</li> --}}
                                    @endif
                                    @if (in_array(236, $permission))
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url('https://webmail-box2496.bluehost.com/') }}"
                                                target="_blank"><span class="icon-mail"></span> Mail Portal</a>
                                        </li>
                                    @endif
                                    @if (in_array(238, $permission))
                                        <li>
                                            <a class="dropdown-item" href="{{ url('sms-portal') }}"><span
                                                    class="icon-message"></span> SMS Portal</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- Navigation end -->
            </ul>
            <!-- Header actions end -->
        </div>
    </header>
    <!-- Header end -->
    <!-- Screen overlay start -->
    <div class="screen-overlay"></div>
    <!-- Screen overlay end -->

    <!-- *************
  ************ Header section end *************
 ************* -->
    <!-- Container fluid start -->
    <div class="container-fluid p-0 m-0">
        <!--//oldnav-->
        <!-- *************
   ************ Main container start *************
  ************* -->
        @yield('main_content')
        <!-- *************
   ************ Main container end *************
  ************* -->
        <!-- Footer start -->
        <footer class="main-footer">
            <div class="logo-wrapper" style="float: left;">Logged in ip: 192.168.0.1</div>
            <div class="header-items" style="float: right;">Developed By: E-Light Software Ltd</div>
            <div class="clearfix"></div>
        </footer>
        <!-- Footer end -->
    </div>
    <!-- Container fluid end -->
    <!-- *************
  ************ Required JavaScript Files *************
 ************* -->
    <script type="text/javascript">
        function markAsRead(notification) {
            $.get('{{ url('mark-as-read') }}', {
                data: notification
            }, function(data) {
                window.location.href = '/' + notification.data.url;
            });
        }
    </script>
    <script>
        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36)
                    .substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
                loader);
        })(window, document);

        function showConfirmationDialog(message, callback) {
            Swal.fire({
                title: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Active it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    callback();
                }
            });
        }
    </script>

    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>

    <!-- Data Tables -->
    <script src="{{ asset('assets/vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>

    <!-- Custom Data tables -->
    <script src="{{ asset('assets/vendor/datatables/custom/custom-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/custom/fixedHeader.js') }}"></script>

    <!-- Steps wizard JS -->
    <script src="{{ asset('assets/vendor/wizard/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/wizard/jquery.steps.custom.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                width: 'resolve' // or a specific width value
            });
        });
    </script>
    <script src="{{ asset('js/lightbox.js') }}"></script>
    @yield('script')
    @if (Session::has('success'))
        <script>
            Toast.fire({
                icon: "success",
                title: "{{ Session::get('success') }}",
            });
        </script>
    @endif

</body>

</html>
