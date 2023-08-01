@extends('master.master')
@section('title', 'Add Patient - Hospice Bangladesh')
@section('main_content')
    @parent
    <!-- *************
                 ************ Main container start *************
                ************* -->
    
    <!-- Container fluid end -->

    <!-- Page header end -->
    <!-- Content wrapper start -->
    <div class="content-wrapper">
        <!-- Fixed body scroll start -->
        <div class="fixedBodyScroll">
            <div class="main-container">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Add new Patient</h5>
                <form action="{{ url('add-patient') }}" method="post" id="form">
                    @csrf
                        <div class="row gutters">
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Registration No</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><span
                                                    class="icon-account_box"></span></span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Registration no" id="reg_no"
                                            name="reg_no" aria-label="Username" aria-describedby="basic-addon1"
                                            value="{{ $reg_no }}" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Patient Name *</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><span
                                                    class="icon-account_box"></span></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Patient name" id="patient_name"
                                            name="patient_name" aria-label="Username" aria-describedby="basic-addon1"
                                            required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;"> Password *</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><span
                                                    class="icon-vpn_key"></span></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Password" name="password"
                                            id="password" aria-label="Username" aria-describedby="basic-addon1" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Confirm Password *</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><span
                                                    class="icon-vpn_key"></span></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Confirm Password"
                                            name="confirm_password" id="confirm_password" aria-label="Username"
                                            aria-describedby="basic-addon1" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;"> Email</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                        </div>
                                        <input type="Email" class="form-control" value="" placeholder="Email" name="email"
                                            id="email" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;"> Mobile Number *</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><span class="icon-phone"></span></span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Phone number" aria-label="Username"
                                            aria-describedby="basic-addon1" name="phone" id="phone" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;"> Age</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><span
                                                    class="icon-user"></span></span>
                                        </div>
                                        <input type="number" class="form-control" name="age" id="age"
                                            placeholder="Age" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;"> Sex</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01"><span
                                                    class="icon-user-check"></span></label>
                                        </div>
                                        <select class="custom-select" id="gender" name="gender">
                                            <option selected value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;"> City*</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01"><span
                                                    class="icon-user-check"></span></label>
                                        </div>
                                        <select class="custom-select select2" id="city_id" name="city_id" data-width="90%"
                                            required="">
                                            <option selected value="">City</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;">Thana*</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01"><span
                                                    class="icon-user-check"></span></label>
                                        </div>
                                        {{-- @dd($thanas) --}}
                                        <select class="custom-select select2" id="thana_id" name="thana_id" data-width="90%"
                                            required="">
                                            <option selected value="">Thana</option>
                                            @foreach ($thanas as $thana)
                                                <option value="{{ $thana['id'] }}">{{ $thana['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;"> Address</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><span
                                                    class="icon-user"></span></span>
                                        </div>
                                        <input type="text" class="form-control" name="address" id="address"
                                            placeholder="Address" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <!-- Row start -->
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <!-- Table container start -->
                    <div class="table-container">
                        <div class="t-header">Patients <button type="button" class="btn-info btn-rounded"
                                data-toggle="modal" data-target="#addPatientModel">Add Patient </button>
                        </div>

                        <div class="table-responsive">
                            <table id="Example" class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>Reg No</th>
                                        <th>Full Name</th>
                                        <th>Package</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="patientTable">
                                    @foreach ($patients as $patient)
                                        <tr id="tr{{ $patient->id }}">
                                            <td id="name{{ $patient->id }}">{{ $patient->reg_no }}</td>
                                            <td id="name{{ $patient->id }}">{{ $patient->patient_name }}</td>
                                            <td id="name{{ $patient->id }}">{{ $patient->package->name }}</td>
                                            <td id="phone{{ $patient->id }}">{{ $patient->phone ?? '' }}</td>
                                            <td id="email{{ $patient->id }}">{{ $patient->user->email ?? '' }}</td>
                                            <td id="email{{ $patient->id }}">{{ $patient->password ?? '' }}</td>
                                            @if ($patient->status == 'Active')
                                                <td id="status{{ $patient->id }}">Active</td>
                                            @else
                                                <td id="status{{ $patient->id }}">Not Active</td>
                                            @endif
                                            <td class="m-0 p-0 text-center">
                                                <button class="btn btn-sm" style="background:inherit" title="Edit"
                                                    onclick="editPatientView({{ $patient->id }})" type="submit"><i
                                                        class="fas fa-edit text-success"></i></button>|

                                                <button class="btn btn-sm" style="background:inherit" title="Delete"
                                                    onclick="deletePatientView({{ $patient->id }})" type="submit"><i
                                                        class="fas fa-trash-alt text-danger"></i></button>
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
    <!-- *************
                 ************ Main container end *************
                ************* -->
    <!-- edit modals -->
    <div id="edit_modal_body">

    </div>

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
                icon: 'error',
                title: '{!! Session::get('error') !!}',
            })
        </script>
        @php Session::forget('error') @endphp
    @endif
@endsection
@section('script')

    <script type="text/javascript">
        $('.select2').select2({
            dropdownParent: $("#addPatientModel")
        });
        $('#Example').DataTable({
            "order": []
        });
    </script>
    <script type="text/javascript">
        function editPatientView(patient_id) {
            $('#modal-body').html(null);
            $.post('{{ url('edit-patient') }}', {
                _token: '{{ @csrf_token() }}',
                patient_id: patient_id
            }, function(data) {
                $('#edit_modal_body').html(data);
                $('#editPatientModel').modal();
            });
        }

        function deletePatientView(patient_id) {
            $('#modal-body').html(null);
            $.post('{{ url('delete-patient-view') }}', {
                _token: '{{ @csrf_token() }}',
                patient_id: patient_id
            }, function(data) {
                $('#edit_modal_body').html(data);
                $('#deletePatientModal').modal();
            });
        }

        function deleteDeliveryCharge(delivery_charge_id) {
            $("#loadButton").removeClass("d-none");
            $.post('{{ url('delete-delivery-charge') }}', {
                _token: '{{ @csrf_token() }}',
                delivery_charge_id: delivery_charge_id
            }, function(data) {
                $('#tr'.concat(delivery_charge_id)).remove();
                $('#deleteModal').modal('hide');
            });
        }

        function checkValidation() {
            var password = $('#password').val();
            var confirm_password = $('#confirm_password').val();
            if (password !== confirm_password) {
                alert('Confirm Password not matched');
                $("#form").submit(function() {
                    return false;
                });
            }
        }

        function checkConfirm() {
            if ($('#checkConfirm').val() !== 1) {
                alert('Check confirm box');
                $("#form").submit(function() {
                    return false;
                });
            }
        }

        $(document).on('change', '#project_id', function() {
            var project_id = $(this).val();
            $.ajax({
                url: "{{ url('/get-account-head') }}",
                type: "GET",
                data: {
                    project_id: project_id
                },
                success: function(data) {
                    var html = '<option value="">Select Income Head</option>';
                    $.each(data, function(key, v) {
                        html += '<option value="' + v.id + '">' + v.name + '</option>';
                    });
                    $('#income_head_id').html(html);
                }
            });
        });
        $(document).on('change', '#income_head_id', function() {
            var income_head_id = $(this).val();
            $.ajax({
                url: "{{ url('/get-sub-category') }}",
                type: "GET",
                data: {
                    income_head_id: income_head_id
                },
                success: function(data) {
                    var html = '<option value="">Select Income Sub Category</option>';
                    $.each(data, function(key, v) {
                        html += '<option value="' + v.id + '">' + v.name + '</option>';
                    });
                    $('#sub_category_id').html(html);
                }
            });
        });
        $(document).on('change', '#sub_category_id', function() {
            var sub_category_id = $(this).val();
            $.ajax({
                url: "{{ url('/get-charge') }}",
                type: "GET",
                data: {
                    sub_category_id: sub_category_id
                },
                success: function(data) {
                    $('#charge').val(data);
                }
            });
        });
        $(document).on('change', '#city_id', function() {
            var city_id = $(this).val();
            $.ajax({
                url: "{{ url('/get-upozila') }}",
                type: "GET",
                data: {
                    city_id: city_id
                },
                success: function(data) {
                    var html = '<option value="">Select Thana</option>'
                    $.each(data, function(key, v) {
                        html += '<option value="' + v.id + '">' + v.name + '</option>';
                    })
                    $('#thana_id').html(html);
                }
            });
        });
    </script>
@endsection
