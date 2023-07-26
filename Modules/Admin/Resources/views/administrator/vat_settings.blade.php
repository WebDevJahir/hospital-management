@extends('master.master')
@section('title', 'Vat Settings - Hospice Bangladesh')
@section('main_content')
@parent
<div class="main-container">
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
						<div class="t-header">VAT Settings
						</div>
						<br>
						<br>
						<br>
						<form action="{{url('add-vat')}}" method="post" id="vatForm">
							@csrf
							<div class="row justify-content-center">
								<div class="form-group col-sm-3 col-3">
								<label for="sub_category_id">VAT(%)</label>
								<input type="text" name="perchent" id="perchent" class="form-control" value="{{$vat->perchent}}" required="">
								<small id="emailHelp" class="form-text text-muted"></small>
								<button class="btn btn-success" type="submit">Save</button>
							</div>
							</div>
						</form>
					</div>
				</div>
				
			</div>
			<!-- Table container end -->
		</div>
	</div>
	<!-- Row end -->
	<!-- *************
		************ Main container end *************
	************* -->
	<!-- edit modals -->
	<div id="edit_modal_body">
		
	</div>
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