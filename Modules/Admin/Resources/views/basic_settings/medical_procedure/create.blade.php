@extends('master.master')
@section('title', 'Medical Procedure - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_heading = 'Add';
        $form_url = route('medical-procedure.store');
        $form_method = 'POST';
        $is_old = old('name') ? true : false;
        $city_id = $is_old ? old('city_id') : '';
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
                            <div class="t-header">Medical Procedure</div>
                            <hr />
                            <form action="{{ $form_url }}" method="{{ $form_method }}" class="medicalProcedureForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">City <span
                                                    class="text-danger">*</span></span>
                                            <select class="form-control" name="city_id" id="city_id" required>
                                                <option value="">Select City</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Project <span
                                                    class="text-danger">*</span></span>
                                            <select class="form-control" name="project_id" id="project_id" required>
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
                                            <select class="form-control" name="income_head_id" id="income_head_id" required>
                                                <option value="">Select Income Head</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Sub Category <span
                                                    class="text-danger">*</span></span>
                                            <select class="form-control" name="income_sub_category_id"
                                                id="income_sub_category_id" required>
                                                <option value="">Select Income Sub Head</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Charge <span
                                                    class="text-danger">*</span></span>
                                            <input type="text" class="form-control" placeholder="charge" name="charge"
                                                required>
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
                                            <th>City</th>
                                            <th>Project</th>
                                            <th>Income Head</th>
                                            <th>Income Sub Category</th>
                                            <th>Charge</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="incomeHeadTable">
                                        @foreach ($medical_procedures as $medical_procedure)
                                            <tr>
                                                <td>{{ $medical_procedure?->city?->name }}</td>
                                                <td>{{ $medical_procedure?->project?->name }}</td>
                                                <td>{{ $medical_procedure?->incomeHead?->name }}</td>
                                                <td>{{ $medical_procedure?->incomeSubCategory?->name }}</td>
                                                <td>{{ $medical_procedure->charge }}</td>
                                                <td>
                                                    {{-- <img src="{{ asset('uploads/medical-support/' . $medical_procedure->image) }}"
                                                        alt="image" width="50px"> --}}
                                                </td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a data-toggle="tooltip" title="Edit"
                                                                onclick="edit({{ $medical_procedure->id }})"
                                                                class="btn btn-outline-warning btn-sm"><i
                                                                    class="fas fa-pen"></i></a>

                                                            <form
                                                                action="{{ route('medical-procedure.destroy', $medical_procedure->id) }}"
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
            let medical_procedures = @json($medical_procedures);
            medical_procedures.find(medical_procedure => {
                if (medical_procedure.id == id) {
                    $.ajax({
                        url: "{{ route('get-income-heads-sub-category-edit') }}",
                        type: "GET",
                        data: {
                            project_id: medical_procedure.project_id,
                            income_head_id: medical_procedure.income_head_id
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
                            $('select[name="city_id"]').val(medical_procedure.city_id);
                            $('select[name="project_id"]').val(medical_procedure.project_id);
                            $('select[name="income_head_id"]').val(medical_procedure.income_head_id);
                            $('select[name="income_sub_category_id"]').val(medical_procedure
                                .income_sub_category_id);
                            $('input[name="charge"]').val(medical_procedure.charge);
                            $('input[name="_method"]').val('PUT');
                            $('form').data('id', medical_procedure.id);
                            let form_url = "{{ route('medical-procedure.update', ':id') }}";
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

        $('.medicalProcedureForm').submit(function(e) {
            e.preventDefault();
            let city_id = $('select[name="city_id"]').val();
            let project_id = $('select[name="project_id"]').val();
            let income_head_id = $('select[name="income_head_id"]').val();
            let income_sub_category_id = $('select[name="income_sub_category_id"]').val();
            let charge = $('input[name="charge"]').val();
            if (city_id == '' || project_id == '' || income_head_id == '' || income_sub_category_id == '' ||
                charge == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please fill all the required fields!',
                });
                return false;
            } else {
                this.submit();
            }
        });
    </script>
@endsection
