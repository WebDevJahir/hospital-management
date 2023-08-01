<!-- Start Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="width:500px">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h5 class="modal-title" id="editModalLabel">Delete role "{{$delete_promo->promo_code}}"??</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<footer class="blockquote-footer"><b>Promo Code:</b> {{$delete_promo->promo_code}}</footer>
				<footer class="blockquote-footer"><b>Service Name:</b> {{$delete_promo->service}}</footer>
				<footer class="blockquote-footer"><b>Created at:</b> {{$delete_promo->created_at}}</footer>
				<footer class="blockquote-footer"><b>Updated at:</b> {{$delete_promo->updated_at}}</footer>
			</div>
			<div class="modal-footer">
				<span class="spinner-grow d-none text-danger spinner-grow-sm" id="loadButton"></span>
				<button type="button" onclick="deletePromoCode({{$delete_promo->id}})" class="btn btn-danger" >Delete</button>
			</div>
		</div>
	</div>
</div>
<!-- End Edit Modal -->