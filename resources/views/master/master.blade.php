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
                                <a class="nav-link active-page" href="{{ url('dashboard') }}" id="dashboardsDropdown"
                                    role="button">
                                    <i class="icon-home2 nav-icon" style="float:left;padding-right: 5px;"></i>
                                    Dashboards
                                </a>
                            </li>

                            @include('admin::layouts.sidebar')

                            @include('patient::layouts.sidebar')

                            @include('monitoring::layouts.sidebar')
                            @include('accounts::layouts.sidebar')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="tablesDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <div id="loader-container" class="loader-container" style="display: none;">
            <div class="loader"></div>
        </div>
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

        function showConfirmationDialog(message, confirmMessage, callback) {
            Swal.fire({
                title: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: confirmMessage
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


    <!-- Data Tables -->
    <script src="{{ asset('assets/vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>

    <!-- Custom Data tables -->
    <script src="{{ asset('assets/vendor/datatables/custom/custom-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/custom/fixedHeader.js') }}"></script>

    <!-- Steps wizard JS -->
    <script src="{{ asset('assets/vendor/wizard/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/wizard/jquery.steps.custom.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                width: 'resolve' // or a specific width value
            });
        });

        function loaderShow() {
            $("#loader-container").show();
            $("#content").css("pointer-events", "none");
        }

        function loaderHide() {
            $("#loader-container").hide();
            $("#content").css("pointer-events", "auto");
        }
    </script>
    <script src="{{ asset('js/lightbox.js') }}"></script>

    @if (Session::has('success'))
        <script>
            Toast.fire({
                icon: "success",
                title: "{{ Session::get('success') }}",
            });
        </script>
    @endif

    @yield('script')



</body>

</html>
