@extends('master.master')
@section('title', 'Expense Head - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_employeeing = 'Add';
        $form_url = route('employee.store');
        $form_method = 'POST';
    @endphp
    <style>
        section {
            border: 2px solid gray;
            padding: 10px;
            border-radius: 10px;
        }

        .legend {
            margin-top: -22px;
            margin-bottom: 10px;
        }

        .legend-title {
            background-color: white;
            padding: 0 10px;
            margin-left: 10px;
            font-size: 15px;
            font-weight: bold;
        }

        .input-group-text {
            width: 130px;
        }
    </style>

    <div class="main-container">
        <!-- Page employeeer start -->
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-container">
                            <div class="t-employeeer">Employee list
                                <button type="button" class="btn-info btn-rounded" data-bs-target="#exampleModalToggle"
                                    data-bs-toggle="modal">Add Employee</button>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="Example" class="table custom-table">
                                    <temployee>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            @if (Auth::id() == 40)
                                                <th>Password</th>
                                            @endif
                                            <th>Phone Number</th>
                                            <th>Image</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </temployee>
                                    <tbody id="incomeHeadTable">
                                        @foreach ($employees as $employee)
                                            <tr id="tr{{ $employee->id }}">

                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->email }}</td>
                                                @if (Auth::id() == 40)
                                                    <td>{{ $employee->text_password }}</td>
                                                @endif
                                                <td>{{ $employee->mobile }}</td>
                                                <td>
                                                    @if ($employee->image)
                                                        <a target="blank"
                                                            href="{{ asset('public/storage/' . $employee->image) }}"><i
                                                                class="far fa-eye text-success"></i></a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>
                                                <td></td>
                                                <td>
                                                    {{-- @if (in_array(13, $permission)) --}}
                                                    <button class="btn btn-sm" style="background:inherit" title="Edit"
                                                        onclick="editStaffView({{ $employee->id }})" type="submit"><i
                                                            class="fas fa-edit text-success"></i></button>|
                                                    {{-- @endif --}}
                                                    {{-- @if (in_array(14, $permission)) --}}
                                                    <button class="btn btn-sm" style="background:inherit" title="Delete"
                                                        onclick="deleteStaffView({{ $employee->id }})" type="submit"><i
                                                            class="fas fa-trash-alt text-danger"></i></button>
                                                    {{-- @endif --}}
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

    @include('admin::configuration.employee.modals.modal')
@endsection


@section('script')
    <script type="text/javascript">
        function edit(employee_id) {
            let employees = @json($employees);
            employees.find(employee => {
                if (employee.id == employee_id) {
                    $('input[name="name"]').val(employee.name);
                    $('select[name="project_id"]').val(employee.project_id);
                    $('form').data('id', employee.id);
                    let form_url = "{{ route('employee.update', ':id') }}";
                    form_url = form_url.replace(':id', $('form').data('id'));
                    $('form').attr('action', form_url);
                    $('form').attr('method', 'POST');
                    $('form').append('<input type="hidden" name="_method" value="PUT">');
                }
            });
        }
        $('.deleteData').submit(function(e) {
            e.preventDefault();
            let form = this;
            let id = $(this).data('id');
            let url = "{{ route('employee.destroy', ':id') }}";
            url = url.replace(':id', id);
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
                    form.submit();
                }
            });
        });
        $(document).ready(function() {
            $('#Example').DataTable({
                "order": []
            });
        });
    </script>
@endsection
