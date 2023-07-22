<!-- Start Edit Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="width:500px;">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h5 class="modal-title" id="editModalLabel">Delete Doctor "{{$doctor->name}}"??</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<footer class="blockquote-footer"><b>Speciality:</b> {{$doctor->speciality->speciality}}</footer>
				<footer class="blockquote-footer"><b>Charge:</b> {{$doctor->charge}}</footer>
				<footer class="blockquote-footer"><b>Created At:</b> {{$doctor->created_at}}</footer>
				<footer class="blockquote-footer"><b>Updated At:</b> {{$doctor->updated_at}}</footer>
			</div>
			<div class="modal-footer">
				<span class="spinner-grow d-none text-danger spinner-grow-sm" id="loadButton"></span>
				<button type="button" onclick="deleteDoctor({{$doctor->id}})" class="btn btn-danger" >Delete</button>
			</div>
		</div>
	</div>
</div>
<!-- End Edit Modal -->