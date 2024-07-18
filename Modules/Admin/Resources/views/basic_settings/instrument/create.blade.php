@extends('master.master')
@section('title', 'Instruments - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_heading = 'Add';
        $form_url = route('instrument.store');
        $form_method = 'POST';
        $is_old = old('name') ? true : false;
        $project_id = $is_old ? old('project_id') : '';
        $income_head_id = $is_old ? old('income_head_id') : '';
        $income_sub_category_id = $is_old ? old('income_sub_category_id') : '';
        $charge = $is_old ? old('charge') : '';
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
                            <div class="t-header">Instruments</div>
                            <hr />
                            <form action="{{ $form_url }}" method="{{ $form_method }}" class="instrumentForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Project <span
                                                    class="text-danger">*</span></span>
                                            <select class="form-control" name="project_id" id="project_id">
                                                <option value="">Select Project</option>
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Income Head <span
                                                    class="text-danger">*</span></span>
                                            <select class="form-control" name="income_head_id" id="income_head_id">
                                                <option value="">Select Income Head</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Sub Category <span
                                                    class="text-danger">*</span></span>
                                            <select class="form-control" name="income_sub_category_id"
                                                id="income_sub_category_id">
                                                <option value="">Select Income Sub Head</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Charge <span
                                                    class="text-danger">*</span></span>
                                            <input type="text" class="form-control" placeholder="charge" name="charge">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Image</span>
                                            <input type="file" class="form-control" name="image">
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
                                            <th>Project</th>
                                            <th>Income Head</th>
                                            <th>Income Sub Category</th>
                                            <th>Charge</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="incomeHeadTable">
                                        @foreach ($instruments as $instrument)
                                            <tr>
                                                <td>{{ $instrument?->project?->name }}</td>
                                                <td>{{ $instrument?->incomeHead?->name }}</td>
                                                <td>{{ $instrument?->incomeSubCategory?->name }}</td>
                                                <td>{{ $instrument->charge }}</td>
                                                <td>
                                                    {{-- <img src="{{ asset('uploads/instrument/' . $instrument->image) }}"
                                                        alt="image" width="50px"> --}}
                                                </td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a data-toggle="tooltip" title="Edit"
                                                                onclick="edit({{ $instrument->id }})"
                                                                class="btn btn-outline-warning btn-sm"><i
                                                                    class="fas fa-pen"></i></a>

                                                            <form
                                                                action="{{ route('instrument.destroy', $instrument->id) }}"
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
        function edit(id) {
            let instruments = @json($instruments);
            instruments.find(instrument => {
                if (instrument.id == id) {
                    $.ajax({
                        url: "{{ route('get-income-heads-sub-category-edit') }}",
                        type: "GET",
                        data: {
                            project_id: instrument.project_id,
                            income_head_id: instrument.income_head_id
                        },
                        success: function(response) {
                            // Assuming the response is in the expected format with properties income_heads and income_sub_categories
                            let html = '<option value="">Select Income Head</option>';
                            $.each(response.incomeHeads, function(index, value) {
                                console.log('head', value)
                                html += '<option value="' + value.id + '">' + value.name +
                                    '</option>';
                            });
                            $('select[name="income_head_id"]').html(html);

                            let html2 = '<option value="">Select Income Sub Head</option>';
                            $.each(response.incomeSubCategories, function(index, value) {
                                console.log('sub category', value)
                                html2 += '<option value="' + value.id + '">' + value.name +
                                    '</option>';
                            });
                            $('select[name="income_sub_category_id"]').html(html2);

                            // Set the values of other elements
                            $('select[name="city_id"]').val(instrument.city_id);
                            $('select[name="project_id"]').val(instrument.project_id);
                            $('select[name="income_head_id"]').val(instrument.income_head_id);
                            $('select[name="income_sub_category_id"]').val(instrument
                                .income_sub_category_id);
                            $('input[name="charge"]').val(instrument.charge);
                            $('input[name="_method"]').val('PUT');
                            $('form').data('id', instrument.id);
                            let form_url = "{{ route('instrument.update', ':id') }}";
                            form_url = form_url.replace(':id', $('form').data('id'));
                            $('form').attr('action', form_url);
                            $('form').attr('method', 'POST');
                            $('form').append('<input type="hidden" name="_method" value="PUT">');

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            // Handle the error here, such as displaying an error message or taking appropriate action.
                            console.error("AJAX Error:", textStatus, errorThrown);
                        }
                    });

                }
            });
        }
        let income_sub_categories;



        $('.deleteData').submit(function(e) {
            e.preventDefault();
            let form = this;
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
        }); //end of submit

        $('#project_id').change(function() {
            let project_id = $(this).val();
            let html = '<option value="">Select Income Head</option>';
            $.ajax({
                url: "{{ route('get-income-heads') }}",
                type: "GET",
                data: {
                    project_id: project_id
                },
                success: function(response) {
                    $.each(response, function(index, value) {
                        console.log(value)
                        html += '<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    $('select[name="income_head_id"]').html(html);
                }
            });
        });

        $('#income_head_id').change(function() {
            let income_head_id = $(this).val();
            let html = '<option value="">Select Income Sub Head</option>';
            $.ajax({
                url: "{{ route('get-income-sub-categories') }}",
                type: "GET",
                data: {
                    income_head_id: income_head_id
                },
                success: function(response) {
                    income_sub_categories = response;
                    $.each(response, function(index, value) {
                        html += '<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    $('select[name="income_sub_category_id"]').html(html);
                }
            });
        });

        $('#income_sub_category_id').change(function() {
            let income_sub_category_id = $(this).val();
            income_sub_categories.find(category => {
                if (category.id == income_sub_category_id) {

                    $('input[name="charge"]').val(category.price);
                }
            });
        });

        $(document).ready(function() {
            $('#Example').DataTable({
                "order": []
            });
        });

        $('.instrumentForm').submit(function(e) {
            e.preventDefault();
            let project_id = $('select[name="project_id"]').val();
            let income_head_id = $('select[name="income_head_id"]').val();
            let income_sub_category_id = $('select[name="income_sub_category_id"]').val();
            let charge = $('input[name="charge"]').val();
            if (project_id == '' || income_head_id == '' || income_sub_category_id == '' || charge == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'All fields are required!',
                });
                return false;
            } else {
                this.submit();
            }
        });
    </script>
@endsection
