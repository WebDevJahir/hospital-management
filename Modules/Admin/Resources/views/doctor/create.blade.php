@extends('master.master')
@section('title', 'Doctor - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $is_old = old('client_no') ? true : false;
        $form_heading = !empty($doctor->id) ? 'Update' : 'Add';
        $form_url = !empty($doctor->id) ? route('doctors.update', $doctor->id) : route('doctors.store');
        $form_method = !empty($doctor->id) ? 'PUT' : 'POST';
        $name = !empty($doctor->name) ? $doctor->name : '';
        $status = !empty($doctor->status) ? $doctor->status : '';
        $description = !empty($doctor->description) ? $doctor->description : '';
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
                            <div class="t-header">Doctor</div>
                            <hr />
                            <form action="{{ $form_url }}" method="{{ $form_method }}" class="doctorForm">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Name <span
                                                    class="text-danger">*</span></span>
                                            <input type="text" class="form-control" placeholder="Doctor Name"
                                                name="name" value="{{ $is_old ? old('name') : $name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Status <span
                                                    class="text-danger">*</span></span>
                                            <select class="form-control" name="status"
                                                value="{{ $is_old ? old('status') : $status }}" required>
                                                <option selected>Select Status</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Description <span
                                                    class="text-danger">*</span></span>
                                            <input type="text" class="form-control" placeholder="Description"
                                                name="description" value="{{ $is_old ? old('description') : $description }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <button type="submit" class="btn btn-outline-primary btn-lg">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr />

                            <div class="table-responsive">
                                <table id="Example" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>Doctor Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="incomeHeadTable">
                                        @foreach ($doctors as $doctor)
                                            <tr>
                                                <td>{{ $doctor->name }}</td>
                                                <td>{{ $doctor->status }}</td>

                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a data-toggle="tooltip" title="Edit"
                                                                onclick="edit({{ $doctor->id }})"
                                                                class="btn btn-outline-warning btn-sm"><i
                                                                    class="fas fa-pen"></i></a>
                                                            <form action="{{ route('doctors.destroy', $doctor->id) }}"
                                                                method="POST" data-toggle="tooltip" title="Delete"
                                                                class="d-inline deleteData">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-outline-danger btn-sm delete"><i
                                                                        class="fas fa-trash"></i></button>
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
@endsection


@section('script')
    <script type="text/javascript">
        function edit(doctor_id) {
            let doctors = @json($doctors);
            doctors.find(doctor => {
                if (doctor.id == doctor_id) {
                    $('input[name="name"]').val(doctor.name);
                    $('select[name="status"]').val(doctor.status);
                    $('input[name="description"]').val(doctor.description);
                    $('form').data('id', doctor.id);
                    let form_url = "{{ route('doctors.update', ':id') }}";
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
            let url = "{{ route('doctors.destroy', ':id') }}";
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
        })
        $(document).ready(function() {
            $('#Example').DataTable({
                "order": []
            });
        });

        $('.doctorForm').submit(function(e) {
            //check validation

            e.preventDefault();
            let name = $('input[name="name"]').val();
            let status = $('select[name="status"]').val();
            let description = $('input[name="description"]').val();
            if (name == '' || status == '' || description == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'All fields are required!',
                });
                return false;
            } else {
                this.submit();
            }
        });
    </script>
@endsection
