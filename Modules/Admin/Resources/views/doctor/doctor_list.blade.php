@extends('master.master')
@section('title', 'Doctor List - Hospice Bangladesh')
@section('main_content')
@parent
<!-- *************
	************ Main container start *************
************* -->
<div class="main-container">
	<!-- Start Add Modal -->
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="width:500px;">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="basicModalLabel">Add New Doctors</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="project_id">Project</label>
						<select name="project_id" id="project_id" class="form-control select2" required="" data-width="100%">
							<option value="">Select project Name</option>
							@foreach($projects as $project)
							<option value="{{$project->id}}">{{$project->name}}</option>
							@endforeach
						</select>
						<small id="emailHelp" class="form-text text-muted"></small>
					</div>
					<div class="form-group">
						<label for="income_head_id">Income Head</label>
						<select name="income_head_id" id="income_head_id" class="form-control select2" required="" data-width="100%">
							<option value="">Select Income Head</option>
						</select>
						<small id="emailHelp" class="form-text text-muted"></small>
					</div>
					<div class="form-group">
						<label for="speciality_id">Specialities</label>
						<select name="speciality_id" id="speciality_id" class="form-control select2" required="" data-width="100%">
							<option value="">Select speciality</option>
							@foreach($specialities as $speciality)
							<option value="{{$speciality->id}}">{{$speciality->speciality}}</option>
							@endforeach
						</select>
						<small id="emailHelp" class="form-text text-muted"></small>
					</div>
					<div class="form-group">
						<label for="sub_category_id">Income Sub Category</label>
						<select name="sub_category_id" id="sub_category_id" class="form-control select2" required="" data-width="100%">
							<option value="">Select Income Sub Category</option>
						</select>
						<small id="emailHelp" class="form-text text-muted"></small>
					</div>
					<div class="form-group">
					<label for="charge">Charge</label>
					<input type="text" name="charge" id="charge" class="form-control" required="" readonly="">
					<small id="emailHelp" class="form-text text-muted"></small>
				</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="addnewDoctor()">Save</button>
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
						<div class="t-header">Doctors @if(in_array(97, $permission))  <button type="button" class="btn-info btn-rounded" data-toggle="modal" data-target="#addModal">Add new doctor</button> @endif </div>
						
						<div class="table-responsive">
							<table id="Example" class="table custom-table">
								<thead>
									<tr>
										<th>Speciality</th>
										<th>Sub category Name</th>
										<th>Charge(Taka)</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="doctorTable">
									@foreach ($doctors as $doctor)
									<tr id="tr{{$doctor->id}}">
										
										<td id="speciality{{$doctor->id}}">{{$doctor->speciality->speciality ?? ''}}</td>
										<td id="name{{$doctor->id}}">{{$doctor->subCategory->name ?? ''}}</td>
										<td id="charge{{$doctor->id}}">{{$doctor->subCategory->price ?? ''}}</td>
										<td>
											@if(in_array(98, $permission))
											<button class="btn  btn-sm" style="background:inherit" title="Edit" onclick="editDoctorView({{$doctor->id}})" type="submit"><i class="fas fa-edit text-success"></i></button>|
											@endif
											@if(in_array(99, $permission))
											<button class="btn  btn-sm" style="background:inherit" title="Delete" onclick="deleteDoctorView({{$doctor->id}})" type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
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
	function addnewDoctor()
{
	var speciality_id = $( "#speciality_id" ).val();
	var project_id = $( "#project_id" ).val();
	var income_head_id = $( "#income_head_id" ).val();
	var sub_category_id = $( "#sub_category_id" ).val();
	var staff_id = $( "#staff_id" ).val();
	var charge = $( "#charge" ).val();
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
	}else if(sub_category_id == ''){
		Toast.fire({
				icon: 'error',
				title: 'Income head name required'
				})
	}else if(speciality_id == ''){
				Toast.fire({
				icon: 'error',
				title: 'Speciality field required'
				})
	}else if(staff_id == ''){
		Toast.fire({
				icon: 'error',
				title: 'Doctor name required'
				})
	}else if(charge == ''){
		Toast.fire({
				icon: 'error',
				title: 'Charge required'
				})
	}else{
		$.get('{{url('add-doctor')}}', {speciality_id : speciality_id, project_id : project_id, income_head_id: income_head_id, sub_category_id: sub_category_id, charge : charge}, function(data){
				location.reload(true)
			});
			}
}
function editDoctorView(doctor_id)
{
$('#modal-body').html(null);
$.post('{{url('edit-doctor')}}', {_token : '{{ @csrf_token() }}', doctor_id : doctor_id}, function(data){
$('#edit_modal_body').html(data);
$('#editModal').modal();
});
}
function updateDoctor(doctor_id)
{
	var speciality_id = $( "#edit_speciality_id" ).val();
	var project_id = $( "#edit_project_id" ).val();
	var income_head_id = $( "#edit_income_head_id" ).val();
	var sub_category_id = $( "#edit_sub_category_id" ).val();
	var charge = $( "#edit_charge" ).val();
	var staff_id = $( "#edit_staff_id" ).val();
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
	}else if(sub_category_id == ''){
		Toast.fire({
				icon: 'error',
				title: 'Income head name required'
				})
	}else if(speciality_id == ''){
				Toast.fire({
				icon: 'error',
				title: 'Speciality field required'
				})
	}else if(staff_id == ''){
		Toast.fire({
				icon: 'error',
				title: 'Doctor name required'
				})
	}else if(charge == ''){
		Toast.fire({
				icon: 'error',
				title: 'Charge required'
				})
	}else{
			$("#loadButton").removeClass("d-none");
					$.post('{{url('update-doctor')}}', {_token : '{{ @csrf_token() }}', speciality_id : speciality_id, project_id : project_id, income_head_id : income_head_id, sub_category_id : sub_category_id, charge : charge, staff_id : staff_id, doctor_id:doctor_id}, function(data){
					location.reload(true)
					});
	}
}
function deleteDoctorView(doctor_id)
{
$('#modal-body').html(null);
$.post('{{url('delete-doctor-view')}}', {_token : '{{ @csrf_token() }}', doctor_id : doctor_id}, function(data){
$('#edit_modal_body').html(data);
$('#deleteModal').modal();
});
}
function deleteDoctor(doctor_id)
{
	$("#loadButton").removeClass("d-none");
$.post('{{url('delete-doctor')}}', {_token : '{{ @csrf_token() }}', doctor_id : doctor_id}, function(data){
	$('#tr'.concat(doctor_id)).remove();
	$('#deleteModal').modal('hide');
});
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
$(document).on('change','#sub_category_id',function(){
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