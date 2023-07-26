@extends('master.master')
@section('main_content')
<!-- *************
	************ Main container start *************
************* -->
<div class="main-container">
</div>
<!-- Start Add Modal -->
<div class="modal fade bd-example-modal-xl" id="reportModel" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myExtraLargeModalLabel">Get Attendance Reports</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{url('attendance-report',Auth::id())}}" method="post" id="form">
					@csrf
					<div class="modal-body">
						<div class="row gutters">
							<div class="col-4">
								<div class="form-group">
									<div style="font-weight: bold;">Month</div>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><span class="icon-calendar"></span></span>
										</div>
										<select class="form-control" name="month" id="month">
											<option value="">Select Month</option>
											<option value="01">January</option>
											<option value="02">February</option>
											<option value="03">March</option>
											<option value="04">April</option>
											<option value="05">May</option>
											<option value="06">June</option>
											<option value="07">July</option>
											<option value="08">Aguest</option>
											<option value="09">September</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">December</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<div style="font-weight: bold;">Year</div>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><span class="icon-calendar"></span></span>
										</div>
										<select class="form-control" name="year" id="years">
											<option value="">Select Year</option>
											<option value="2021">2021</option>
											<option value="2022">2022</option>
											<option value="2023">2023</option>
											<option value="2024">2024</option>
											<option value="2025">2025</option>
											<option value="2026">2026</option>
											<option value="2027">2027</option>
											<option value="2028">2028</option>
											<option value="2029">2029</option>
											<option value="2030">2030</option>
											<option value="2031">2031</option>
											<option value="3032">2032</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<div style="font-weight: bold;">Employee</div>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><span class="icon-calendar"></span></span>
										</div>
										<select class="form-control" @if(Auth::user()->type =='staff') readonly @endif name="staff_id" id="staff_id">
											<option value="all">All</option>
											@foreach($staffs as $staff)
											<option @if(Auth::id() == $staff->user_id) selected @endif value="{{$staff->user_id}}">{{$staff->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Get Reports</button>
					</div>
				</div>
			</form>
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
				
				<!-- Table container start -->
				<div class="table-container">
					<div class="t-header">Attendance Report <button type="button" class="btn-info btn-rounded" data-toggle="modal" data-target="#reportModel">Get Report</button><span style="float: right; color: #180854; font-size: 16px;"> All STAFF</span></div>
					<div class="table-responsive">
						<table id="basicExample" class="table custom-table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Total Present</th>
								</tr>
							</thead>
							<tbody id="MedicalProcedureTable">
								@foreach ($staffs as $staff)
								<tr id="tr{{$staff->id}}">
									<td id="invoiceno{{$staff->id}}">{{$staff->name}}</td>
									@php $total_present = App\Attendance::whereMonth('created_at',$month)->whereYear('created_at',$year)->where('staff_id',$staff->user_id)->count(); @endphp
									<td>{{$total_present}}</td>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@if(Session::has('success'))
<script type="text/javascript">
Toast.fire({
icon: 'success',
title: '{!! Session::get('success') !!}',
})
</script>
@php Session::forget('success') @endphp
@endif
@if(Session::has('error'))
<script type="text/javascript">
Toast.fire({
icon: 'success',
title: '{!! Session::get('error') !!}',
})
</script>
@endif
@php Session::forget('error') @endphp
@endsection