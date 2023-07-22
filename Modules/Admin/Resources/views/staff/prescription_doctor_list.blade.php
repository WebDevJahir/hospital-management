@extends('master.master')
@section('title', 'Doctor - Hospice Bangladesh')
@section('main_content')
    @parent

    <link rel="stylesheet" type="text/css" href="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/css/prettify.css">
    </link>
    <link rel="stylesheet" type="text/css"
        href="https://jhollingworth.github.io/bootstrap-wysihtml5//src/bootstrap-wysihtml5.css">
    </link>

    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/wysihtml5-0.3.0.js"></script>
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/prettify.js"></script>
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//src/bootstrap-wysihtml5.js"></script>
    <!-- *************
        ************ Main container start *************
    ************* -->
    <div class="main-container">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="width:700px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel">Add new doctor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="PrescriptionDoctor" method="post" action="{{ url('add-prescription-doctor') }}">
                            @csrf
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Doctor Name:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Enter Doctor Name"
                                                id="doc_name" name="doc_name" minlength="2" required>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <div class="input-group">
                                            <select class="form-control" id="status" name="status" required>
                                                <option>Select Status</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description:</label>
                                        <div class="form-group">
                                            <textarea class="wysihtml5 form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    @php $permission = Session::get('permission'); @endphp
                    <!-- Table container start -->
                    <div class="table-container">
                        <div class="t-header">Doctor List @if (in_array(245, $permission))
                                <button type="button" class="btn-info btn-rounded" data-toggle="modal"
                                    data-target="#addModal">Add new Doctor</button>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table id="Example" class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>Doctor Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="MedicalProcedureTable">
                                    @foreach ($doctors as $doctor)
                                        <tr id="tr{{ $doctor->id }}">
                                            <td id="product_name{{ $doctor->id }}">{{ $doctor->doctor_name }}</td>
                                            <td id="quantity{{ $doctor->id }}">{{ $doctor->status }}</td>
                                            <td>
                                                @if (in_array(246, $permission))
                                                    <button class="btn btn-sm" style="background:inherit"
                                                        onclick="editDoctorView({{ $doctor->id }})" title="Edit"
                                                        type="submit"><i class="fas fa-edit text-success"></i></button>|
                                                @endif
                                                @if (in_array(247, $permission))
                                                    <button class="btn btn-sm" style="background:inherit"
                                                        onclick="deleteDoctorview({{ $doctor->id }})" title="Delete"
                                                        type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
                                                @endif
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

    @if (Session::has('failed'))
        <script type="text/javascript">
            Toast.fire({
                icon: 'success',
                title: '{!! Session::get('failed') !!}',
            })
        </script>
    @endif
    @php Session::forget('error') @endphp
@endsection
@section('script')
    <script type="text/javascript">
        $('#Example').DataTable({
            "order": []
        });
    </script>
    <script src="{{ asset('assets/js/wysihtml.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('assets/js/wysihtml.all-commands.js') }}"></script>
    <script src="{{ asset('assets/js/wysihtml.table_editing.js') }}"></script>
    <script src="{{ asset('assets/js/wysihtml.toolbar.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.wysihtml5').wysihtml5();
        });
    </script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#description_id'
        });

        function editDoctorView(id) {
            $('#edit_modal_body').html(null);
            $.post('{{ url('edit-prescription-doctor') }}', {
                _token: '{{ @csrf_token() }}',
                id: id
            }, function(data) {
                $('#edit_modal_body').html(data);
                $('#editModal').modal();
            });
        }

        function deleteDoctorview(id) {
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
                    $.post('{{ url('delete-prescription-doctor') }}', {
                        _token: '{{ @csrf_token() }}',
                        id: id
                    }, function(data) {
                        $('#tr'.concat(id)).remove();
                        Swal.fire(
                            'Deleted!',
                            'Doctor has been deleted.',
                            'success'
                        )
                    });

                }
            })
        }
    </script>
@endsection
