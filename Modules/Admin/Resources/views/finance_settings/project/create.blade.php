@extends('master.master')
@section('title', 'Project - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $is_old = old('client_no') ? true : false;
        $form_heading = !empty($sale->id) ? 'Update' : 'Add';
        $form_url = !empty($sale->id) ? route('project.update', $sale->id) : route('project.store');
        $form_method = !empty($sale->id) ? 'PUT' : 'POST';
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
                            <div class="t-header">Project</div>
                            <hr />
                            <form action="{{ $form_url }}" method="{{ $form_method }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Name</span>
                                            <input type="text" class="form-control" placeholder="Income Head Name"
                                                name="name">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Address</span>
                                            <input type="text" class="form-control" placeholder="Address" name="address">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Email</span>
                                            <input type="text" class="form-control" placeholder="Email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Phone</span>
                                            <input type="text" class="form-control" placeholder="Phone" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Website</span>
                                            <input type="text" class="form-control" placeholder="Website" name="website">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Logo</span>
                                            <input type="file" class="form-control" placeholder="Logo" name="logo">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <button type="submit" class="btn btn-outline-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr />

                            <div class="table-responsive">
                                <table id="Example" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Website</th>
                                            <th>Logo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="incomeHeadTable">
                                        @foreach ($projects as $project)
                                            <tr>
                                                <td>{{ $project->name }}</td>
                                                <td>{{ $project->address }}</td>
                                                <td>{{ $project->email }}</td>
                                                <td>{{ $project->phone }}</td>
                                                <td>{{ $project->website }}</td>
                                                <td><img src="{{ asset('storage/' . $project->logo) }}" alt=""
                                                        width="50px"></td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a data-toggle="tooltip" title="Edit"
                                                                onclick="edit({{ $project->id }})"
                                                                class="btn btn-outline-warning btn-sm"><i
                                                                    class="fas fa-pen"></i></a>
                                                            <form action="{{ route('project.destroy', $project->id) }}"
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
    function edit(project_id) {
                let projects = @json($projects);
                projects.find(project => {
                    if (project.id == project_id) {
                        $('input[name="name"]').val(project.name);
                        $('input[name="address"]').val(project.address);
                        $('input[name="email"]').val(project.email);
                        $('input[name="phone"]').val(project.phone);
                        $('input[name="website"]').val(project.website);
                        $('form').data('id', project.id);
                        let form_url = "{{ route('project.update', ':id') }}";
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
                let url = "{{ route('project.destroy', ':id') }}";
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
    </script>
@endsection
