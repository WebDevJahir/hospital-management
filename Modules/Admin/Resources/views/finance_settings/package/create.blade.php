@extends('master.master')
@section('title', 'Project - Hospice Bangladesh')
@section('main_content')
    @parent
    <style type="text/css">

    </style>
    @php
        $is_old = old('client_no') ? true : false;
        $form_heading = !empty($sale->id) ? 'Update' : 'Add';
        $form_url = !empty($sale->id) ? route('packages.update', $sale->id) : route('packages.store');
        $form_method = !empty($sale->id) ? 'PUT' : 'POST';
    @endphp

    <div class="main-container">
        <!-- Page header start -->
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-container">
                            <div class="t-header">Project</div>
                            <hr />
                            <form action="{{ $form_url }}" method="{{ $form_method }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text" for="project_id">Project</span>
                                            <select name="project_id" id="project_id" class="form-control select2"
                                                data-width="100%" required="">
                                                <option value="">Select project Name</option>
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                                @endforeach
                                            </select>
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Income Head</span>
                                            <select name="income_head_id" id="income_head_id" name="income_head_id"
                                                class="form-control select2" data-width="100%" required="">
                                                <option value="">Select Income Head</option>
                                            </select>
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Income Sub Category</span>
                                            <select name="income_subcategory_id" id="income_subcategory_id"
                                                class="form-control select2" data-width="100%" required="">
                                                <option value="">Select Income Sub Category</option>
                                            </select>
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Time</span>
                                            <select name="time" id="time" class="form-control" required="">
                                                <option value="">Select Time</option>
                                                <option value="free">free</option>
                                                <option value="9am-5pm">9am-5pm</option>
                                                <option value="8am-8pm">8am-8pm</option>
                                                <option value="24 hours">24 hours</option>
                                            </select>
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Duration</span>
                                            <select name="duration" id="duration" class="form-control" required="">
                                                <option value="">Select Duration</option>
                                                <option value="free">free</option>
                                                <option value="7 days">7 days</option>
                                                <option value="30 days">30 days</option>
                                                <option value="continue">continue</option>
                                            </select>
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Price</span>
                                            <input type="number" name="price" id="price" class="form-control"
                                                placeholder="Price" required="" readonly="">
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <div style="font-weight: bold;"><span> Frontend Visible </span></div><input
                                            type="checkbox" name="status" id="status" class="switch" value="1">
                                    </div> --}}
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <button type="submit" class="btn btn-outline-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr />

                            <div class="table-responsive">
                                <table id="Example"
                                    class="table custom-table dataTable no-footer table-striped table-bordered">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Package Name</th>
                                            <th>Project</th>
                                            <th>Time</th>
                                            <th>Duration</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="MedicalProcedureTable">
                                        @foreach ($packages as $package)
                                            <tr id="tr{{ $package->id }}">
                                                <td id="product_name{{ $package->id }}">
                                                    {{ $package?->incomeSubCategory?->name }}
                                                </td>
                                                <td id="quantity{{ $package->id }}">{{ $package?->project?->name }}</td>
                                                <td id="price{{ $package->id }}">{{ $package->time }}</td>
                                                <td id="total_price{{ $package->id }}">{{ $package->duration }}</td>
                                                <td id="total_price{{ $package->id }}">{{ $package->price }}</td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a data-toggle="tooltip" title="Edit"
                                                                onclick="edit({{ $package->id }})"
                                                                class="btn btn-outline-warning btn-sm"><i
                                                                    class="fas fa-pen"></i></a>
                                                            <form action="{{ route('packages.destroy', $package->id) }}"
                                                                method="POST" data-toggle="tooltip" title="Delete"
                                                                class="d-inline deleteData">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-outline-danger btn-sm delete"><i
                                                                        class="fas fa-trash"></i></button>
                                                            </form>
                                                        </nobr>
                                                    </div>
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
@endsection


@section('script')
    <script type="text/javascript">
        $('#total_price').click(function() {
            var qty = $('#quantity').val();

            var price = $('#price').val();
            $('#total_price').val(qty * price)
        })
        $(document).on('change DOMNodeInserted', '#project_id', function() {
            var project_id = $(this).val();
            $.ajax({
                url: "{{ url('/get-account-head') }}",
                type: "GET",
                data: {
                    project_id: project_id
                },
                success: function(data) {
                    var html = '<option value="">Select Income Head</option>';
                    $.each(data, function(key, v) {
                        html += '<option value="' + v.id + '">' + v.name + '</option>';
                    });
                    $('#income_head_id').html(html);
                }
            });
        });

        $(document).on('change', '#income_head_id', function() {
            var income_head_id = $(this).val();
            $.ajax({
                url: "{{ url('/get-sub-category') }}",
                type: "GET",
                data: {
                    income_head_id: income_head_id
                },
                success: function(data) {
                    var html = '<option value="">Select Income Sub Category</option>';
                    $.each(data, function(key, v) {
                        html += '<option value="' + v.id + '">' + v.name + '</option>';
                    });
                    $('#income_subcategory_id').html(html);
                }
            });
        });

        $(document).on('change', '#income_subcategory_id', function() {
            var income_subcategory_id = $(this).val();
            $.ajax({
                url: "{{ url('/get-charge') }}",
                type: "GET",
                data: {
                    income_subcategory_id: income_subcategory_id
                },
                success: function(data) {
                    $('#price').val(data);
                }
            });
        });

        function edit(package_id) {
            let packages = @json($packages);
            packages.find(package => {
                if (package.id == package_id) {
                    $('select[name="project_id"]').val(package.project_id);
                    $('select[name="status"]').val(package.status);
                    $('form').data('id', project.id);
                    let form_url = "{{ route('packages.update', ':id') }}";
                    form_url = form_url.replace(':id', $('form').data('id'));
                    $('form').attr('action', form_url);
                    $('form').attr('method', 'POST');
                    $('form').append('<input type="hidden" name="_method" value="PUT">');
                }
            });
        }


        $('.deleteData').submit(function(e) {
            e.preventDefault();
            let form = this;
            let id = $(this).data('id');
            let url = "{{ route('packages.destroy', ':id') }}";
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
        $(document).ready(function() {
            $('#Example').DataTable({
                "order": []
            });
        });
    </script>
@endsection
