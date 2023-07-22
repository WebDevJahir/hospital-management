@extends('master.master')
@section('title', 'Projects - Hospice Bangladesh')
@section('main_content')
    @parent


    <!-- *************
      ************ Main container start *************
     ************* -->
    <div class="main-container">
        <!-- Start Add Modal -->
        <div class="modal fade bd-example-modal-xl" id="addPackageModal" tabindex="-1" role="dialog"
            aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel">Add new Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row gutters">
                            <div class="col-3">
                                <div class="form-group">
                                    <div style="font-weight: bold;"> Project Name *</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><span
                                                    class="icon-folder-plus"></span></span>
                                        </div>
                                        <input type="text" class="form-control" id="addProjectsName"
                                            placeholder="Project Name" aria-label="Username"
                                            aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <div style="font-weight: bold;"> Phone *</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><span
                                                    class="icon-phone"></span></span>
                                        </div>
                                        <input type="number" class="form-control" id="addProjectsPhone"
                                            placeholder="Phone number" aria-label="Username"
                                            aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <div style="font-weight: bold;"> Email *</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                        </div>
                                        <input type="Email" class="form-control" id="addProjectsEmail" value=""
                                            placeholder="email" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <div style="font-weight: bold;"> Website Link</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="web_link" value=""
                                            placeholder="email" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-8">
                                <div class="form-group">
                                    <div style="font-weight: bold;"> Address *</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01"><span
                                                    class="icon-user-check"></span></label>
                                        </div>
                                        <textarea class="form-control" id="addProjectsAddress" rows="1"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div style="font-weight: bold;"> Logo *</div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">

                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="addProjectsLogo" class="form-control"
                                                id="addProjectsLogo">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span class="spinner-grow d-none text-danger spinner-grow-sm" id="addLoadButton"></span>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="addProject">Save</button>
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
                            <div class="t-header">Project List @if (in_array(20, $permission))
                                    <button type="button" class="btn-info btn-rounded" data-toggle="modal"
                                        data-target="#addPackageModal">Add new project</button>
                                @endif
                            </div>

                            @php
                                $project_info = Modules\Admin\Entities\ProjectInfo::where('dbc', 1)
                                    ->orderBy('id', 'desc')
                                    ->get();
                            @endphp
                            <div class="table-responsive">
                                <table id="Example" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Logo</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Website</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="projectTable">
                                        @foreach ($project_info as $project)
                                            <tr id="tr{{ $project->id }}">
                                                <td id="name{{ $project->id }}">{{ $project->name }}</td>
                                                <td>
                                                    @if ($project->logo)
                                                        <a href="{{ asset('public/storage' . $project->logo) }}"
                                                            target="blank">
                                                            <div class="avatar md"
                                                                style="height:15px;width:15px;margin:0px;">
                                                                <img id="logo{{ $project->id }}"
                                                                    src="{{ asset('public/storage' . $project->logo) }}"
                                                                    class="rounded" alt="{{ $project->name }} logo">
                                                            </div>
                                                        </a>
                                                    @else
                                                        No logo
                                                    @endif
                                                </td>
                                                <td id="address{{ $project->id }}">{{ $project->address }}</td>
                                                <td id="email{{ $project->id }}">{{ $project->email }}</td>
                                                <td id="phone{{ $project->id }}">{{ $project->phone }}</td>
                                                <td id="phone{{ $project->id }}">{{ $project->website }}</td>
                                                <td>
                                                    @if (in_array(21, $permission))
                                                        <button class="btn  btn-sm" style="background:inherit"
                                                            title="Edit" onclick="editprojectview({{ $project->id }})"
                                                            type="submit"><i
                                                                class="fas fa-edit text-success"></i></button>
                                                    @endif
                                                    @if (in_array(22, $permission))
                                                        <button class="btn btn-sm" style="background:inherit"
                                                            title="Delete"
                                                            onclick="deleteprojectview({{ $project->id }})"
                                                            type="submit"><i
                                                                class="fas fa-trash-alt text-danger"></i></button>
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


@endsection


@section('script')
    <script type="text/javascript">
        $('#Example').DataTable({
            "order": []
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#addProject').click(function() {
                var logo = $('#addProjectsLogo').prop('files')[0]
                var name = $("#addProjectsName").val();
                var logo = $("#addProjectsLogo").val();
                var phone = $("#addProjectsPhone").val();
                var email = $("#addProjectsEmail").val();
                var address = $("#addProjectsAddress").val();
                var weblink = $("#web_link").val();
                if (name == '') {
                    Toast.fire({
                        icon: 'error',
                        title: 'Project name required'
                    })
                } else if (phone == '') {
                    Toast.fire({
                        icon: 'error',
                        title: 'Phone number required'
                    })
                } else if (email == '') {
                    Toast.fire({
                        icon: 'error',
                        title: 'Email required'
                    })
                } else if (address == '') {
                    Toast.fire({
                        icon: 'error',
                        title: 'Address required'
                    })
                } else if (weblink == '') {
                    Toast.fire({
                        icon: 'error',
                        title: 'Website link required'
                    })
                } else if (logo == '') {
                    Toast.fire({
                        icon: 'error',
                        title: 'Website logo required'
                    })
                } else {
                    $("#addLoadButton").removeClass("d-none");
                    var formData = new FormData();
                    formData.append('logo', $('#addProjectsLogo').prop('files')[0]);
                    formData.append('name', $('#addProjectsName').val());
                    formData.append('phone', $('#addProjectsPhone').val());
                    formData.append('email', $('#addProjectsEmail').val());
                    formData.append('address', $('#addProjectsAddress').val());
                    formData.append('web_link', $('#web_link').val());
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('add-project') }}",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            $("#addLoadButton").addClass("d-none");
                            $('#addPackageModal').modal('hide');
                            var newrow = '<tr id="tr' + data + '"> <td id="name' + data + '">' +
                                $('#addProjectsName').val() + '</td> <td id="logo' +
                                '<img width="40px" height="40px" src="' + window.URL
                                .createObjectURL($('#addProjectsLogo').prop('files')[0]) +
                                '"alt"' + $('#addProjectsLogo').prop('files')[0].name +
                                '</td>  <td id="address' + data + '">' + $(
                                    '#addProjectsAddress').val() + '</td>  <td id="email' +
                                data + '">' + $('#addProjectsEmail').val() +
                                '</td>  <td id="phone' + data + '">' + $('#addProjectsPhone')
                                .val() +
                                '</td> <td> <button class="btn btn-primary btn-sm" onclick="editprojectview(' +
                                data +
                                ')" type="submit">edit</button> <button class="btn btn-danger btn-sm" onclick="deleteprojectview(' +
                                data + ')" type="submit">delete</button> </td> </tr>';
                            location.reload(true);
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                }
            });
        })
    </script>


    <script type="text/javascript">
        $(document).ready(function() {});

        function deleteprojectview(project_id) {
            $('#edit_modal_body').html(null);
            $.post('{{ url('delete-project-view') }}', {
                _token: '{{ @csrf_token() }}',
                project_id: project_id
            }, function(data) {
                $('#edit_modal_body').html(data);
                $('#editModal').modal();
            });
        }

        function deleteProject(project_id) {
            $("#loadButton").removeClass("d-none");
            $.post('{{ url('delete-project') }}', {
                _token: '{{ @csrf_token() }}',
                project_id: project_id
            }, function(data) {
                $('#tr'.concat(project_id)).remove();
                $('#editModal').modal('hide');
            });
        }

        function editprojectview(project_id) {
            $('#edit_modal_body').html(null);
            $.post('{{ url('edit-project-view') }}', {
                _token: '{{ @csrf_token() }}',
                project_id: project_id
            }, function(data) {
                $('#edit_modal_body').html(data);
                $('#editModal').modal();
            });
        }

        function updateProject(project_id) {
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#addLoadButton").removeClass("d-none");
                var logo = $('#editProjectsLogo').prop('files')[0]
                var name = $("#editProjectsName").val();
                var phone = $("#editProjectsPhone").val();
                var email = $("#editProjectsEmail").val();
                var address = $("#editProjectsAddress").val();
                var weblink = $("#edit_web_link").val();
                if (name == '') {
                    Toast.fire({
                        icon: 'error',
                        title: 'Project name required'
                    })
                } else if (phone == '') {
                    Toast.fire({
                        icon: 'error',
                        title: 'Phone number required'
                    })
                } else if (email == '') {
                    Toast.fire({
                        icon: 'error',
                        title: 'Email required'
                    })
                } else if (address == '') {
                    Toast.fire({
                        icon: 'error',
                        title: 'Address required'
                    })
                } else if (weblink == '') {
                    Toast.fire({
                        icon: 'error',
                        title: 'Website link required'
                    })
                } else {
                    var formData = new FormData();
                    formData.append('logo', $('#editProjectsLogo').prop('files')[0]);
                    formData.append('name', $('#editProjectsName').val());
                    formData.append('phone', $('#editProjectsPhone').val());
                    formData.append('email', $('#editProjectsEmail').val());
                    formData.append('address', $('#editProjectsAddress').val());
                    formData.append('web_link', $('#edit_web_link').val());
                    formData.append('project_id', project_id);
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('update-project') }}",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            $('#name'.concat(data)).text($('#editProjectsName').val());
                            $('#phone'.concat(data)).text($('#editProjectsPhone').val());
                            $('#email'.concat(data)).text($('#editProjectsEmail').val());
                            $('#address'.concat(data)).text($('#editProjectsAddress').val());

                            location.reload(true);
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                }
            })
        }
    </script>

@endsection
