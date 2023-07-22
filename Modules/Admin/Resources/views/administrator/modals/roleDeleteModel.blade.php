@php
	$role_info = \App\UserRole::where('id', $role_id)->get();
@endphp
<!-- Start Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h5 class="modal-title" id="editModalLabel">Delete role "{{$role_info[0]->rolename}}"??</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<span class="spinner-grow d-none text-danger spinner-grow-sm" id="loadButton"></span>
				<button type="button" onclick="deleterole({{$role_info[0]->id}})" class="btn btn-danger" >Delete</button>
			</div>
		</div>
	</div>
</div>
<!-- End Edit Modal -->