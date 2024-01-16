@extends('master.master')
@section('title', 'Approve Leave - Hospice Bangladesh')
@section('main_content')
@parent
<!-- *************
	************ Main container start *************
************* -->
<div class="main-container">
	<div class="content-wrapper">
		<!-- Fixed body scroll start -->
		<div class="fixedBodyScroll">
		@php $permission = Session::get('permission'); @endphp
			<!-- Row start -->
			<div class="row gutters">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					
					<!-- Table container start -->
					<div class="table-container">
						<div class="table-responsive">
							<table id="Example" class="table custom-table">
								<thead>
									<tr>
										<th>Application Date</th>
										<th>Employee Name</th>
										<th>Leave Type</th>
										<th>Leave From Date</th>
										<th>Joining Date</th>
										<th>Total Days</th>
										<th style="width:153px;">Action</th>
									</tr>
								</thead>
								<tbody id="MedicalProcedureTable">
									@foreach ($leaves as $leave)
									<tr id="tr{{$leave->id}}">
										<td id="application_date{{$leave->id}}">{{Carbon\Carbon::parse($leave->application_date)->format('m/d/Y')}}</td>
										<td id="staff{{$leave->id}}">{{$leave->employee->last_name ?? ''}} {{$leave->employee->first_name ?? ''}}</td>
										<td id="from_date{{$leave->id}}">{{$leave->leave_type}}</td>
										<td id="from_date{{$leave->id}}">{{$leave->from_date}}</td>
										<td id="to_date{{$leave->id}}">{{$leave->to_date}}</td>
										<td id="to_date{{$leave->id}}">{{$leave->total_days}}</td>
										<td>
											@if(in_array(277, $permission))
											<button   onclick="LeaveView({{$leave->id}})" class="btn btn-sm" type="submit" style="background:inherit" title="View" style="margin-top: -5px;"><i class="fas fa-eye text-primary"></i></button>|
											@endif
											@if(in_array(279, $permission))
											<button onclick="editLeaveView({{$leave->id}})" class="btn btn-inline btn-sm" style="background:inherit" title="Edit" type="submit" style="margin:2px;"><i class="fas fa-edit text-success"></i></button>|
											@endif
											@if(in_array(278, $permission))
											<a href="{{url('unapprove-leave',$leave->id)}}" class="btn  btn-sm" style="background:inherit" title="Pending" style="cursor: pointer; padding-right: 5px;"><i class="fas fa-undo text-warning"></i></a>|
											@endif
											@if(in_array(280, $permission))
											<button onclick="deleteLeaveview({{$leave->id}})" class="btn  btn-sm" style="background:inherit" title="Delete" style="cursor: pointer; padding-right: 5px;"><i class="fas fa-trash-alt text-danger"></i></button>|
											@endif
											<a href="{{url('pdf-leave',$leave->id)}}" class="btn btn-sm" style="background:inherit" title="Pdf" id="pdf" type="submit" target="_blank" ><i class="fas fa-download text-primary"></i></a>					
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
function editLeaveView(id)
{
$('#edit_modal_body').html(null);
$.post('{{url('edit-leave')}}', {_token : '{{ @csrf_token() }}', id : id}, function(data){
$('#edit_modal_body').html(data);
$('#editModel').modal();
});
}

function LeaveView(id)
        {
            $('#modal-body').html(null);
            $.post('{{url('patient-leave-view')}}', {_token : '{{ @csrf_token() }}', id : id}, function(data){
                $('#edit_modal_body').html(data);
                $('#leaveView').modal();
            });
        }
function deleteLeaveview(id){
		Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		if (result.isConfirmed) {
			$.post('{{url('delete-leave')}}', {_token : '{{ @csrf_token() }}', id : id}, function(data){
				$('#tr'.concat(id)).remove();
			Swal.fire(
						'Deleted!',
						'Leave has been deleted.',
						'success'
						)
			});
		
		}
		})
	}


$(document).on('change','#leave_type', function(){
	var leave_type = $('#leave_type').val();
	var staff_id = $('#staff_id').val();
	$.get('{{url('get-leave')}}', {leave_type : leave_type, staff_id : staff_id}, function(data) {
		$('#total_leave').val(data);
	})

	$.get('{{url('get-used-leave')}}', {leave_type : leave_type, staff_id : staff_id}, function(data) {
		$('#used_leave').val(data);
	})
})

$('#addLeave').on('click',function(e){
	e.preventDefault();
	var total_leave = $('#total_leave').val();
	var used_leave = $('#used_leave').val();
	if(total_leave < used_leave){
		Swal.fire({
		title: 'Leave type already taken',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, ok it!'
		}).then(function (result){
                    if(result.value === true){
                    $('#leaveForm').submit();
                  }
                });
}
})

</script>
@endsection