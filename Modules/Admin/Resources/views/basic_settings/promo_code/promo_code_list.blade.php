@extends('master.master')
@section('title', 'Promo Code - Hospice Bangladesh')
@section('main_content')
@parent
	<!-- *************
		************ Main container start *************
	************* -->
	<div class="main-container">
		<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document" style="width:500px;">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="basicModalLabel">Add new Promo Code</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
							<div class="form-group">
							<label for="project_id">Project</label>
							<select name="project_id" id="project_id" class="form-control select2" data-width="100%">
								<option value="">Select project Name</option>
								@foreach($projects as $project)
									<option value="{{$project->id}}">{{$project->name}}</option>
								@endforeach
							</select>
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group">
								<label for="income_head_id">Income Head</label>
								<select name="income_head_id" id="income_head_id" class="form-control select2" data-width="100%">
									<option value="">Select Income Head</option>
								</select>
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>
							<div class="form-group">
								<label for="sub_category_id">Income Sub Category</label>
								<select name="sub_category_id" id="sub_category_id" class="form-control select2" data-width="100%">
									<option value="">Select Income Sub Category</option>
								</select>
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>
							<div class="form-group">
								<label for="serviceName">Promo Code</label>
								<input type="text" class="form-control" name="promo_code" id="promo_code" aria-describedby="emailHelp" placeholder="Enter promo code" required="required" value="{{Illuminate\Support\Str::random(4)}}">
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>
							<div class="form-group">
								<label for="serviceName">From Date</label>
								<input type="date" class="form-control" name="from_date" id="from_date" aria-describedby="emailHelp" placeholder="Enter service name" required="required">
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>
							<div class="form-group">
								<label for="serviceName">To Date</label>
								<input type="date" class="form-control" name="to_date" id="to_date" aria-describedby="emailHelp" placeholder="Enter service name" required="required">
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>
							<div class="form-group">
								<label for="serviceName">Discount</label>
								<input type="number" class="form-control" name="discount" id="discount" aria-describedby="emailHelp" placeholder="Discount" required="required">
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" onclick="addnewpromo()">Save</button>
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
							<div class="t-header">Promo codes @if(in_array(57, $permission)) <button type="button" class="btn-info btn-rounded" data-toggle="modal" data-target="#addModal">Add new </button>
							@endif
							</div>
							<div class="table-responsive">
								<table id="Example" class="table custom-table">
									<thead>
										<tr>
											<th>Promo Code</th>
											<th>From Date</th>
											<th>To Date</th>
											<th>Discount</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="roleTable">
										@foreach ($promo_codes as $code)
											<tr id="tr{{$code->id}}">
											
											    <td id="sub_category{{$code->id}}">{{$code->promo_code}}</td>
											    <td id="from{{$code->id}}">{{$code->from_date}}</td>
											    <td id="to{{$code->id}}">{{$code->to_date}}</td>
											    <td id="price{{$code->id}}">{{$code->discount}}</td>
												<td>
													@if(in_array(58, $permission))
													<button class="btn btn-sm" style="background:inherit" title="Edit" onclick="editPromoCodeView({{$code->id}})" type="submit"><i class="fas fa-edit text-success"></i></button>|
													@endif
													@if(in_array(59, $permission))
													<button class="btn btn-sm" style="background:inherit" title="Delete" onclick="deletePromoCodeView({{$code->id}})" type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
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
	  $('#Example').DataTable( {
        "order": []
    } );
</script>
    <script type="text/javascript">
        function editPromoCodeView(promo_id)
        {
            $('#modal-body').html(null);
            $.post('{{url('edit-promo-code')}}', {_token : '{{ @csrf_token() }}', promo_id : promo_id}, function(data){
                $('#edit_modal_body').html(data);
                $('#editModal').modal();
            });
        }
        function updatePromoCode(promo_id)
        {
        	var project_id = $( "#edit_project_id" ).val();
        	var income_head_id = $( "#edit_income_head_id" ).val();
        	var income_subcategory_id = $( "#edit_sub_category_id" ).val();
        	var from_date = $( "#edit_from_date" ).val();
        	var to_date = $( "#edit_to_date" ).val();
        	var discount = $( "#edit_discount" ).val();
        	var promo_code = $( "#edit_promo_code" ).val();
        	 if(project_id == ''){
	        		Toast.fire({
					  icon: 'error',
					  title: 'Project name required'
					})
	        	}else if(income_head_id == ''){
	        		Toast.fire({
					  icon: 'error',
					  title: 'Income head name required'
					})
	        	}else if(income_subcategory_id == ''){
	        		Toast.fire({
					  icon: 'error',
					  title: 'Sub category name required'
					})
	        	}else if(discount == ''){
					Toast.fire({
					  icon: 'error',
					  title: 'Discount amount required'
					})
	        	}else if(from_date == ''){
					Toast.fire({
					  icon: 'error',
					  title: 'From date required'
					})
	        	}else if(to_date == ''){
					Toast.fire({
					  icon: 'error',
					  title: 'To date required'
					})
	        	}else if(promo_code == ''){
					Toast.fire({
					  icon: 'error',
					  title: 'Logo required'
					})
	        	}else{
	        		$("#loadButton").removeClass("d-none");
		            $.post('{{url('update-promo-code')}}', {_token : '{{ @csrf_token() }}', project_id : project_id, income_head_id : income_head_id, income_subcategory_id : income_subcategory_id, discount:discount, promo_id : promo_id, from_date:from_date, to_date:to_date, promo_code:promo_code}, function(data){
		            $('#sub_category'.concat(promo_id)).text(promo_code);
		            $('#from'.concat(promo_id)).text(from_date);
		            $('#to'.concat(promo_id)).text(to_date);
		            $('#price'.concat(promo_id)).text(discount);
		            location.reload(true)
		            });
	        	}
        }
        function deletePromoCodeView(promo_id)
        {

            $('#modal-body').html(null);
            $.post('{{url('delete-promo-code-view')}}', {_token : '{{ @csrf_token() }}', promo_id : promo_id}, function(data){              
                $('#edit_modal_body').html(data);
                $('#editModal').modal();
            });
        }

        function deletePromoCode(promo_id)
        {
        	$("#loadButton").removeClass("d-none");
            $.post('{{url('delete-promo-code')}}', {_token : '{{ @csrf_token() }}', promo_id : promo_id}, function(data){ 
            	$('#tr'.concat(promo_id)).remove();
            	$('#editModal').modal('hide');
            });
            }
        function addnewpromo()
        {
        	var project_id = $( "#project_id" ).val();
        	var income_head_id = $( "#income_head_id" ).val();
        	var income_subcategory_id = $( "#sub_category_id" ).val();
        	var discount = $( "#discount" ).val();
        	var from_date = $( "#from_date" ).val();
        	var to_date = $( "#to_date" ).val();
        	var promo_code = $( "#promo_code" ).val();
        	 if(project_id == ''){
	        		Toast.fire({
					  icon: 'error',
					  title: 'Project name required'
					})
	        	}else if(income_head_id == ''){
	        		Toast.fire({
					  icon: 'error',
					  title: 'Income head name required'
					})
	        	}else if(income_subcategory_id == ''){
	        		Toast.fire({
					  icon: 'error',
					  title: 'Sub category name required'
					})
	        	}else if(discount == ''){
					Toast.fire({
					  icon: 'error',
					  title: 'Discount amount required'
					})
	        	}else if(from_date == ''){
					Toast.fire({
					  icon: 'error',
					  title: 'From date required'
					})
	        	}else if(to_date == ''){
					Toast.fire({
					  icon: 'error',
					  title: 'To date required'
					})
	        	}else if(promo_code == ''){
					Toast.fire({
					  icon: 'error',
					  title: 'Logo required'
					})
	        	}else{
	        		$.post('{{url('add-promo-code')}}', {_token : '{{ @csrf_token() }}', project_id : project_id, income_head_id : income_head_id, income_subcategory_id : income_subcategory_id, discount: discount, from_date:from_date, to_date:to_date,promo_code:promo_code}, function(data){
        		if(data == 'exit'){
        			Swal.fire(
				      'Sorry!',
				      'Promo code already exits.',
				      'error'
			    )
        		}else{
        			var newrow = '<tr id="tr'+data +'"> <td id="sub_category'+data+'">'+ promo_code +'</td> <td id=from"'+data +'">'+ from_date +'</td> <td id=to"'+data +'">'+ to_date +'</td> <td id=price"'+data +'">'+ discount +'</td> <td> <button class="btn btn-primary btn-sm" onclick="editPromoCodeView('+data +')" type="submit">edit</button> <button class="btn btn-danger btn-sm" onclick="deletePromoCodeView('+data +')" type="submit">delete</button> </td> </tr>';
						location.reload(true) 
        		}
			});
	        	}
        }

         $(document).on('change','#project_id',function(){
            var project_id = $(this).val();
            $.ajax({
                url:"{{url('/get-account-head')}}",
                type:"GET",
                data: {project_id:project_id},
                success:function(data){
                    var html = '<option value="">Select Income Head</option>';
                    $.each(data,function(key,v){
                        html +='<option value="'+v.id+'">'+v.name+'</option>';
                    });
                    $('#income_head_id').html(html);
                }
            });
        });

        $(document).on('change','#income_head_id',function(){
            var income_head_id = $(this).val();
            $.ajax({
                url:"{{url('/get-sub-category')}}",
                type:"GET",
                data: {income_head_id:income_head_id},
                success:function(data){
                    var html = '<option value="">Select Income Sub Category</option>';
                    $.each(data,function(key,v){
                        html +='<option value="'+v.id+'">'+v.name+'</option>';
                    });
                    $('#sub_category_id').html(html);
                }
            });
        });

        $(document).on('change select','#sub_category_id',function(){
            var sub_category_id = $(this).val();
            $.ajax({
                url:"{{url('/get-charge')}}",
                type:"GET",
                data: {sub_category_id:sub_category_id},
                success:function(data){
                    $('#charge').val(data);
                }
            });
        });
    </script>
@endsection