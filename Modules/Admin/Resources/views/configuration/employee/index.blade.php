@extends('master.master')
@section('title', 'Expense Head - Hospice Bangladesh')
@section('main_content')
    @parent
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
                                            <span style="margin-top: 5px;">Employee List</span>
                                            <span class="th-count">
                                                <a href="{{ route('employee.create') }}"
                                                    class="btn btn-sm btn-outline-primary" style="background:inherit;"
                                                    title="Add Employee"><i class="fas fa-plus"
                                                        style="margin-right: 5px;"></i>Add New</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">

                                <table id="Example"
                                    class="table custom-table dataTable no-footer table-striped table-bordered">
                                    <thead>
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
                                    </thead>
                                    <tbody id="incomeHeadTable">
                                        @foreach ($employees as $employee)
                                            <tr id="tr{{ $employee->id }}">

                                                <td>{{ $employee->first_name }}</td>
                                                <td>{{ $employee->email }}</td>
                                                @if (Auth::id() == 40)
                                                    <td>{{ $employee->text_password }}</td>
                                                @endif
                                                <td>{{ $employee->contact_number }}</td>
                                                <td>
                                                    @if ($employee->image)
                                                        <a target="blank"
                                                            href="{{ asset('public/storage/' . $employee->image) }}"><i
                                                                class="far fa-eye text-success"></i></a>
                                                    @else
                                                        No image
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $employee->role->name ?? '' }}
                                                </td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a href="{{ route('employee.edit', $employee->id) }}"
                                                                class="btn btn-sm btn-outline-info"
                                                                style="background:inherit;" title="Schedule"><i
                                                                    class="fas fa-edit text-info"></i></a>
                                                            <form action="{{ route('employee.destroy', $employee->id) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                                    style="background:inherit;" title="Delete"
                                                                    onclick="deleteEmployee(event)">
                                                                    <i class="fas fa-trash text-danger"></i>
                                                                </button>
                                                            </form>
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


    <div class="staffModal"></div>
@endsection


@section('script')
    <script type="text/javascript">
        function deleteEmployee(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this employee!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',

                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.target.closest('form').submit();
                }
            })
        }

        $(document).ready(function() {
            $('#Example').DataTable({
                "order": []
            });
        });
    </script>
@endsection
