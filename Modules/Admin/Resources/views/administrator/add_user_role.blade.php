@extends('master.master')
@section('title', 'User Role - Hospice Bangladesh')
@section('main_content')
@parent


	<!-- *************
		************ Main container start *************
	************* -->
	<div class="main-container">
		<!-- Start Add Modal -->
		<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document" style="width: 500px;"> 
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="basicModalLabel">Add new role</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
							<div class="form-group">
								<label for="roleName">Enter role name</label>
								<input type="text" class="form-control" id="addiRoleName" aria-describedby="emailHelp" placeholder="Enter role name" required="required">
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" onclick="addnew()">Save</button>
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
				@php $permission = Session::get('permission'); @endphp
				<!-- Row start -->
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						
						<!-- Table container start -->
						<div class="table-container">
							<div class="t-header">User Roles @if(in_array(4, $permission)) <button type="button" class="btn-info btn-rounded" data-toggle="modal" data-target="#addModal">Add new </button>
							@endif

							</div>
							
							@php
								$role_info = \App\UserRole::where('dbc', 1)->get();
							@endphp
							<div class="table-responsive">
								<table id="basicExample" class="table custom-table">
									<thead>
										<tr>
											<th>Role Name</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="roleTable">
										@foreach ($role_info as $role)
											<tr id="tr{{$role->id}}">
											
											    <td id="{{$role->id}}">{{$role->rolename}}</td>
												<td>
													@if(in_array(5, $permission))
													<button class="btn btn-sm" style="background:inherit" onclick="editroleview({{$role->id}})" title="Edit" type="submit"><i class="fas fa-edit text-success"></i></button> |
													@endif
													@if(in_array(6, $permission))
													<button class="btn btn-white btn-sm" style="background:inherit" onclick="deleteroleview({{$role->id}})" title="Delete" type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
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
        function editroleview(role_id)
        {
            $('#modal-body').html(null);

        	if(role_id == ''){
				Toast.fire({
				  icon: 'error',
				  title: 'Role name required'
				})
        	}else{
        		$.post('{{url('edit-role-view')}}', {_token : '{{ @csrf_token() }}', role_id : role_id}, function(data){                
                $('#edit_modal_body').html(data);
                $('#editModal').modal();

            });
        	}
            
        }
        function editrole(role_id)
        {
        	var rolename = $( "#editRoleName" ).val();
        	$("#loadButton").removeClass("d-none");
            $.post('{{url('edit-role')}}', {_token : '{{ @csrf_token() }}', role_id : role_id, rolename : rolename}, function(data){ 
            	location.reload(true)
            });
            $('#'.concat(role_id)).text(rolename);
            $('#editModal').modal('hide');
        }
        function deleteroleview(role_id)
        {

            $('#modal-body').html(null);
            $.post('{{url('delete-role-view')}}', {_token : '{{ @csrf_token() }}', role_id : role_id}, function(data){                
                $('#edit_modal_body').html(data);
                $('#editModal').modal();
            });
        }

        function deleterole(role_id)
        {
        	$("#loadButton").removeClass("d-none");
            $.post('{{url('delete-role')}}', {_token : '{{ @csrf_token() }}', role_id : role_id}, function(data){ 
            	$('#tr'.concat(role_id)).remove();
            	$('#editModal').modal('hide');
            });
            }
        function addnew()
        {
        	 var rolename = $( "#addiRoleName" ).val();
        	if(rolename == ''){
				Toast.fire({
				  icon: 'error',
				  title: 'Role name required'
				})
        	}else{
        		$.post('{{url('add-role')}}', {_token : '{{ @csrf_token() }}', rolename : rolename}, function(data){
				$newrow = 	'<tr id="tr'+data +'"> <td id="'+data +'">'+ rolename +'</td> <td> <button class="btn btn-primary btn-sm" onclick="editroleview('+data +')" type="submit">edit</button> <button class="btn btn-danger btn-sm" onclick="deleteroleview('+data +')" type="submit">delete</button> </td> </tr>';
				$('#roleTable').append($newrow);
				$('#addModal').modal('hide');
				location.reload(true)
			});
        	}
        }
    </script>
@endsection