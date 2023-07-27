<!-- Start Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="width:500px;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Edit promo code "{{$promo_code->promo_code}}"</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				  <div class="form-group">
                            <label for="edit_project_id">Project</label>
                            <select name="edit_project_id" id="edit_project_id" class="form-control select2" data-width="100%">
                                <option value="">Select project Name</option>
                                @foreach($projects as $project)
                                    <option @if($promo_code->project_id == $project->id) selected @endif  value="{{$project->id}}">{{$project->name}}</option>
                                @endforeach
                            </select>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                       <div class="form-group">
                            <label for="edit_income_head_id">Income Head</label>
                            <select name="edit_income_head_id" id="edit_income_head_id" class="form-control select2" data-width="100%">
                                <option value="">Select Income Head</option>
                                @foreach($incomeHeads as $incomeHead)
                                    <option @if($promo_code->income_head_id == $incomeHead->id) selected @endif  value="{{$incomeHead->id}}">{{$incomeHead->name}}</option>
                                @endforeach
                            </select>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="edit_sub_category_id">Income Sub Category</label>
                            <select name="edit_sub_category_id" id="edit_sub_category_id" class="form-control select2" data-width="100%">
                                <option value="">Select Income Sub Category</option>
                                @foreach($incomeSubCategories as $subCategory)
                                    <option @if($promo_code->income_subcategory_id == $subCategory->id) selected @endif value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                @endforeach
                            </select>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                                <label for="serviceName">Promo Code</label>
                                <input type="text" class="form-control" name="promo_code" id="edit_promo_code" aria-describedby="emailHelp" placeholder="Enter promo code" required="required" value="{{$promo_code->promo_code}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        <div class="form-group">
                                <label for="serviceName">From Date</label>
                                <input type="text" class="form-control" name="from_date" id="edit_from_date" aria-describedby="emailHelp" placeholder="Enter service name" required="required" value="{{$promo_code->from_date}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="serviceName">To Date</label>
                                <input type="date" class="form-control" name="to_date" id="edit_to_date" aria-describedby="emailHelp" placeholder="To Date" required="required" value="{{$promo_code->to_date}}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        <div class="form-group">
                            <label >Price</label>
                            <input type="text" name="discount" id="edit_discount" class="form-control" value="{{$promo_code->discount}}">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
			</div>
			<div class="modal-footer">
				<span class="spinner-grow d-none text-danger spinner-grow-sm" id="loadButton"></span>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" onclick="updatePromoCode({{$promo_code->id}})" class="btn btn-primary">Save</button>
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

        $(document).on('change select','#edit_sub_category_id',function(){
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

        $(document).on('select','#edit_sub_category_id',function(){
            var price = $( "#edit_sub_category_id option:selected" ).text() 
            $('#edit_charge').val(data);
        });
</script>