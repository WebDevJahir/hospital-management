@extends('master.master')
@section('title', 'Banner - Hospice Bangladesh')
@section('main_content')
@parent
<style type="text/css">
    .jssorl-009-spin img {
        animation-name: jssorl-009-spin;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    @keyframes jssorl-009-spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .jssorb031 {
        position: absolute;
    }

    .jssorb031 .i {
        position: absolute;
        cursor: pointer;
    }

    .jssorb031 .i .b {
        fill: #000;
        fill-opacity: 0.5;
        stroke: #fff;
        stroke-width: 1200;
        stroke-miterlimit: 10;
        stroke-opacity: 0.3;
    }

    .jssorb031 .i:hover .b {
        fill: #fff;
        fill-opacity: .7;
        stroke: #000;
        stroke-opacity: .5;
    }

    .jssorb031 .iav .b {
        fill: #fff;
        stroke: #000;
        fill-opacity: 1;
    }

    .jssorb031 .i.idn {
        opacity: .3;
    }

    .jssora051 {
        display: block;
        position: absolute;
        cursor: pointer;
    }

    .jssora051 .a {
        fill: none;
        stroke: #fff;
        stroke-width: 360;
        stroke-miterlimit: 10;
    }

    .jssora051:hover {
        opacity: .8;
    }

    .jssora051.jssora051dn {
        opacity: .5;
    }

    .jssora051.jssora051ds {
        opacity: .3;
        pointer-events: none;
    }

    @keyframes slidy {
        0% {
            left: 0%;
        }

        20% {
            left: 0%;
        }

        25% {
            left: -100%;
        }

        45% {
            left: -100%;
        }

        50% {
            left: -200%;
        }

        70% {
            left: -200%;
        }

        75% {
            left: -300%;
        }

        95% {
            left: -300%;
        }

        100% {
            left: -400%;
        }
    }

    body {
        margin: 0;
    }

    div#slider {
        overflow: hidden;
    }

    div#slider figure img {
        width: 20%;
        float: left;
    }

    div#slider figure {
        position: relative;
        width: 500%;
        margin: 0;
        left: 0;
        text-align: left;
        font-size: 0;
        animation: 10s slidy infinite;
    }
</style>
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
					<div class="table-container">
					<div class="t-header">Banner Settings</div>
					<br>
					<br>
					<br>
					<form action="{{url('add-banner')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row justify-content-center">
							<div class="form-group col-sm-3 col-3">
								<label for="sub_category_id">Banner (1200*200)</label>
								<input type="file" name="banner[]" id="banner" class="form-control" multiple="">
								<small id="emailHelp" class="form-text text-muted"></small>
								<button class="btn btn-success" type="submit">Save</button>
							</div>
						</div>
					</form>
					<br>
				</div>
			</div>
		</div>
			<section id="addArea" class="pb-4 mt-3" style="overflow:scroll;">
				<div class="container">
                    @php $banners = App\Banner::get(); @endphp
                        @foreach($banners as $banner)
                    <div class="col-12 text-center" style="margin: 10px;">
                        <img src="{{asset('public/storage/'.$banner->banner ?? '')}}" alt="Inventory" class="img-thumbnail" data-width="100%" style="height: 100px;">
                        <span class="btn btn-sm " style="background:inherit" title="Delete" style=" margin-left: 10px;" onclick="deleteBanner({{$banner->id}})"><i class="fas fa-trash-alt text-danger"></i></span>
                    </div>	
                    @endforeach
				</div>
			</section>
		</div>
		<!-- Table container end -->
	</div>
</div>
@if(Session::has('success'))
<script type="text/javascript">
    Toast.fire({
                icon: 'success',
                title: '{!! Session::get('success') !!}',
                })
</script>
@php
    Session::forget('success');
@endphp
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
@section('script')
<script  type="text/javascript">
    function deleteBanner(id){
        if(confirm('Are you sure to delete?')){
            location.replace('{{url('delete-banner')}}/'+id);
        }
    }
</script>
@endsection
