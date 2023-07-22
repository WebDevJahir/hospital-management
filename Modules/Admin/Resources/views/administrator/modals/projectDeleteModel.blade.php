@php
	$project_info = \App\ProjectInfo::where('id', $project_id)->get();
@endphp
<!-- Start Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h5 class="modal-title" id="editModalLabel">Delete Project "{{$project_info[0]->name}}"??</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="avatar md" style="float: right;">
					<img id="logo{{$project_info[0]->id}}" src="{{asset('storage/'.$project_info[0]->logo)}}" class="rounded" alt="{{$project_info[0]->name}} logo">
				</div>
				<footer class="blockquote-footer"><b>Address:</b> {{$project_info[0]->address}}</footer>
				<footer class="blockquote-footer"><b>E-mail:</b> {{$project_info[0]->email}}</footer>
				<footer class="blockquote-footer"><b>Mobile:</b> {{$project_info[0]->phone}}</footer>
				<footer class="blockquote-footer"><b>Mobile:</b> {{$project_info[0]->created_at}}</footer>
				<footer class="blockquote-footer"><b>Mobile:</b> {{$project_info[0]->updated_at}}</footer>
			</div>
			<div class="modal-footer">
				<span class="spinner-grow d-none text-danger spinner-grow-sm" id="loadButton"></span>
				<button type="button" onclick="deleteProject({{$project_info[0]->id}})" class="btn btn-danger" >Delete</button>
			</div>
		</div>  
	</div>
</div>
<!-- End Edit Modal -->