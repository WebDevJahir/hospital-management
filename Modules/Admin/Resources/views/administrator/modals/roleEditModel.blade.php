@php
	$role_info = \App\UserRole::where('id', $role_id)->get();
@endphp
<!-- Start Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Edit role "{{$role_info[0]->rolename}}"</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
					<div class="form-group">
						<label for="roleName">Edit role name</label>
						<input type="text" class="form-control" id="editRoleName" value="{{$role_info[0]->rolename}}" aria-describedby="emailHelp" placeholder="Enter role name">
						<small id="emailHelp" class="form-text text-muted"></small>
					</div>
					<footer class="blockquote-footer">Created at: {{$role_info[0]->created_at}}</footer>
					<footer class="blockquote-footer">Edited at: {{$role_info[0]->updated_at}}</footer>
				
				
			</div>
			<div class="modal-footer">
				<span class="spinner-grow d-none text-danger spinner-grow-sm" id="loadButton"></span>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" onclick="editrole({{$role_info[0]->id}})" class="btn btn-primary">Save</button>
			</div>
		</div>
	</div>
</div>
<!-- End Edit Modal -->