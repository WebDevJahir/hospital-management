<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document" style="width:500px;">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="basicModalLabel">Edit Doctor</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="edit_project_id">Project</label>
							<select name="edit_project_id" id="edit_project_id" class="form-control select2" required="" data-width="100%">
								<option value="">Select project Name</option>
								@foreach($projects as $project)
									<option @if($doctor->project_id == $project->id) selected @endif value="{{$project->id}}">{{$project->name}}</option>
								@endforeach
							</select>
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<label for="edit_income_head_id">Income Head</label>
							<select name="edit_income_head_id" id="edit_income_head_id" class="form-control select2" required="" data-width="100%">
								<option value="">Select Income Head</option>
								@foreach($incomeHeads as $incomeHead)
									<option @if($doctor->income_head_id == $incomeHead->id) selected @endif value="{{$incomeHead->id}}">{{$incomeHead->name}}</option>
								@endforeach
							</select>
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group">
						<label for="speciality_id">Specialities</label>
						<select name="speciality_id" id="edit_speciality_id" class="form-control select2" required="" data-width="100%">
							<option value="">Select speciality</option>
							@foreach($specialities as $speciality)
							<option @if($doctor->speciality_id == $speciality->id) selected @endif value="{{$speciality->id}}">{{$speciality->speciality}}</option>
							@endforeach
						</select>
						<small id="emailHelp" class="form-text text-muted"></small>
					</div>
						<div class="form-group">
							<label for="edit_sub_category_id">Income Sub Category</label>
							<select name="edit_sub_category_id" id="edit_sub_category_id" class="form-control select2" required="" data-width="100%">
								<option value="">Select Income Sub Category</option>
								@foreach($incomeSubCategories as $subCategory)
									<option @if($doctor->income_subcategory_id == $subCategory->id) selected @endif value="{{$subCategory->id}}">{{$subCategory->name}}</option>
								@endforeach
							</select>
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group">
						    <label for="edit_sub_category_id">Charge</label>
							<input type="text" name="edit_charge" id="edit_charge" class="form-control" disabled value="{{$doctor->charge}}" required="" readonly="">
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" onclick="updateDoctor({{$doctor->id}})">Save</button>
					</div>
				</div>
			</div>
		</div>
<!-- End Edit Modal -->
<script type="text/javascript">
	    $('.select2').select2({
        dropdownParent: $("#editModal")
});
	$(document).on('change','#edit_project_id',function(){
            var project_id = $(this).val();
            $.ajax({
                url:"{{url('/get-account-head')}}",
                type:"GET",
                data: {project_id:project_id},
                success:function(data){
                	if(data[0]){
                		var html = ' ';
                    $.each(data,function(key,v){
                        html +='<option value="'+v.id+'">'+v.name+'</option>';
                    });
                }else{
                	var html = '<option value="">Select Income Head</option>';
                	$('#edit_sub_category_id').html('<option value="">Select Income Sub Category</option>');
                }
                    
                    $('#edit_income_head_id').html(html);
                }
            });
        });

        $(document).on('change','#edit_income_head_id',function(){
            var income_head_id = $(this).val();
            $.ajax({
                url:"{{url('/get-sub-category')}}",
                type:"GET",
                data: {income_head_id:income_head_id},
                success:function(data){
                	if(data[0]){
                	var html = ' ';
                    $.each(data,function(key,v){
                        html +='<option value="'+v.id+'">'+v.name+'</option>';
                    });	
                }else{
                	var html = '<option value="">Select Income Sub Category</option>';
                }
                    
                    $('#edit_sub_category_id').html(html);
                }
            });
        });

        $(document).on('select change','#edit_sub_category_id',function(){
            var sub_category_id = $(this).val();
            $.ajax({
                url:"{{url('/get-charge')}}",
                type:"GET",
                data: {sub_category_id:sub_category_id},
                success:function(data){
                    $('#edit_charge').val(data);
                }
            });
        });


</script>