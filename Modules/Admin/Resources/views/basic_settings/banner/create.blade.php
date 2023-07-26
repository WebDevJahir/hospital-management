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

    @php
        $is_old = old('client_no') ? true : false;
        $form_heading = !empty($banner->id) ? 'Update' : 'Add';
        $form_url = !empty($banner->id) ? route('banners.update', $banner->id) : route('banners.store');
        $form_method = !empty($banner->id) ? 'PUT' : 'POST';
    @endphp
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
                            <form action="{{ $form_url }}" method="{{ $form_method }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="form-group col-sm-3 col-3">
                                        <label for="sub_category_id">Banner (1200*200)</label>
                                        <input type="file" name="image" id="image" class="form-control"
                                            multiple="">
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                        <button class="btn btn-success" type="submit">Save</button>
                                    </div>
                                    <div class="form-group col-sm-3 col-3">
                                        <label for="link">Link</label>
                                        <input type="text" name="link" id="link" class="form-control"
                                            value="{{ $banner->link ?? '' }}">
                                    </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
                <section id="addArea" class="pb-4 mt-3" style="overflow:scroll;">
                    <div class="container">
                        @foreach ($banners as $banner)
                            <div class="col-12 text-center" style="margin: 10px;">
                                <img src="{{ asset($banner->image ?? '') }}" alt="Inventory"
                                    class="img-thumbnail" data-width="100%" style="height: 100px;">
                                <form action="{{ route('banners.destroy', $banner->id) }}" method="POST"
                                    data-toggle="tooltip" title="Delete" class="d-inline deleteData">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm delete"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
            <!-- Table container end -->
        </div>
    </div>
    @if (Session::has('success'))
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

    @if (Session::has('error'))
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
    <script type="text/javascript">
        $('.deleteData').submit(function(e) {
            e.preventDefault();
            let form = this;
            let id = $(this).data('id');
            let url = "{{ route('banners.destroy', ':id') }}";
            url = url.replace(':id', id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        })
    </script>
@endsection
