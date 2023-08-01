@extends('master.master')
@section('title', 'Promo-code - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $is_old = old('client_no') ? true : false;
        $form_heading = !empty($sale->id) ? 'Update' : 'Add';
        $form_url = !empty($sale->id) ? route('promo-codes.update', $sale->id) : route('promo-codes.store');
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
                            <div class="t-header">Promo Code</div>
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
                                    <div class="col-8">
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
                                            <span class="input-group-text custom-group-text">Promo Code</span>
                                            <input type="text" class="form-control" placeholder="Promo Code"
                                                name="promo_code">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">From Date</span>
                                            <input type="date" class="form-control" name="from_date" id="from_date"
                                                aria-describedby="emailHelp" required="required">
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">To Date</span>
                                            <input type="date" class="form-control" name="to_date" id="to_date"
                                                aria-describedby="emailHelp" required="required">
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Discount</span>
                                            <input type="number" class="form-control" placeholder="Discount amount"
                                                name="discount">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <button type="submit" class="btn btn-outline-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr />

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
                                    <tbody id="incomeHeadTable">
                                        @foreach ($promo_codes as $code)
                                            <tr>
                                                <td>{{ $code->promo_code }}</td>
                                                <td>{{ $code->from_date }}</td>
                                                <td>{{ $code->to_date }}</td>
                                                <td>{{ $code->discount }}</td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a data-toggle="tooltip" title="Edit"
                                                                onclick="edit({{ $code->id }})"
                                                                class="btn btn-outline-warning btn-sm"><i
                                                                    class="fas fa-pen"></i></a>
                                                            <form action="{{ route('promo-codes.destroy', $code->id) }}"
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
        $('#Example').DataTable({
            "order": []
        });

        $(document).on('change', '#project_id', function() {
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

        $(document).on('change select', '#income_subcategory_id', function() {
            var income_subcategory_id = $(this).val();
            $.ajax({
                url: "{{ url('/get-charge') }}",
                type: "GET",
                data: {
                    income_subcategory_id: income_subcategory_id
                },
                success: function(data) {
                    $('#charge').val(data);
                }
            });
        });

        function edit(id) {
            let promo_codes = @json($promo_codes);
            promo_codes.find(code => {
                if (code.id == id) {
                    let projects = @json($projects);
                    let html = '<option value="">Select Police Station</option>';
                    $.each(projects, function(index, value) {
                        if (value.id == code.project_id) {
                            html += '<option value="' + value.id + '">' + value.name + '</option>';
                        }
                    });
                    $('select[name="police_station_id"]').html(html);
                    $('input[name="name"]').val(code.name);
                    $('select[name="city_id"]').val(code.city_id);
                    $('select[name="project_id"]').val(code.project_id);
                    $('input[name="code"]').val(code.code);
                    $('form').data('id', code.id);
                    let form_url = "{{ route('service-charge.update', ':id') }}";
                    form_url = form_url.replace(':id', $('form').data('id'));
                    $('form').attr('action', form_url);
                    $('form').attr('method', 'POST');
                    $('form').append('<input type="hidden" name="_method" value="PUT">');
                }
            });
        }
    </script>
@endsection
