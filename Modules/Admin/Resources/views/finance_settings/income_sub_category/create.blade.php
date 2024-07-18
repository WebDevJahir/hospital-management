@extends('master.master')
@section('title', 'Income Head - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $is_old = old('client_no') ? true : false;
        $form_heading = !empty($income_subcategory->id) ? 'Update' : 'Add';
        $form_url = !empty($income_subcategory->id)
            ? route('income-sub-category.update', $income_subcategory->id)
            : route('income-sub-category.store');
        $form_method = !empty($income_subcategory->id) ? 'PUT' : 'POST';
        $form_id = !empty($income_subcategory->id) ? 'updateForm' : 'saveForm';
        $form_name = !empty($income_subcategory->id) ? 'update' : 'save';
        $name = $is_old ? old('name') : $income_subcategory->name ?? '';
        $income_head_id = $is_old ? old('income_head_id') : $income_subcategory->income_head_id ?? '';
        $project_id = $is_old ? old('project_id') : $income_subcategory->project_id ?? '';
        $price = $is_old ? old('price') : $income_subcategory->price ?? 0;
        $vat_type = $is_old ? old('vat_type') : $income_subcategory->vat_type ?? '';
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
                            <div class="t-header">Income Sub Category</div>
                            <hr />
                            <form action="{{ $form_url }}" method="{{ $form_method }}" class="incomeSubHeadForm">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Name <span
                                                    class="text-danger">*</span></span>
                                            <input type="text" class="form-control"
                                                placeholder="Income Sub Category Name" name="name"
                                                value="{{ $is_old ? old('name') : '' }}" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Project
                                                Name <span class="text-danger">*</span></span>
                                            <select class="form-control" name="project_id" id="project_id" required>
                                                <option selected>Select Project</option>
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}"
                                                        @if ($project->id == $project_id) selected @endif>
                                                        {{ $project->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Income Head <span
                                                    class="text-danger">*</span></span>
                                            <select class="form-control" name="income_head_id" id="income_head_id" required>
                                                <option selected>Select Income Head</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Price</span>
                                            <input type="text" class="form-control" placeholder="Price" name="price">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Vat Type</span>
                                            <select class="form-control" name="vat_type">
                                                <option selected>Select Vat Type</option>
                                                <option value="1" @if ($vat_type == 1) selected @endif>Yes
                                                </option>
                                                <option value="0" @if ($vat_type == 0) selected @endif>No
                                                </option>
                                            </select>
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
                                <div>
                                    <table id="Example"
                                        class="table custom-table dataTable no-footer table-striped table-bordered">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Income Sub Category</th>
                                                <th>Income Head</th>
                                                <th>Project Name</th>
                                                <th>Price</th>
                                                <th>Vat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="incomeHeadTable">
                                            @if ($income_subcategories->isNotEmpty())
                                                @foreach ($income_subcategories as $sub_category)
                                                    <tr>
                                                        <td>{{ $sub_category->name }}</td>
                                                        <td>{{ $sub_category?->incomeHead?->name }}</td>
                                                        <td>{{ $sub_category?->project?->name }}</td>
                                                        <td>{{ $sub_category->price }}</td>
                                                        <td>{{ $sub_category->vat_type }}</td>
                                                        <td>
                                                            <div class="icon-btn">
                                                                <nobr>
                                                                    <a data-toggle="tooltip" title="Edit"
                                                                        onclick="edit({{ $sub_category->id }})"
                                                                        class="btn btn-outline-warning btn-sm"><i
                                                                            class="fas fa-pen"></i></a>
                                                                    <form
                                                                        action="{{ route('income-sub-category.destroy', $sub_category->id) }}"
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
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
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
        function edit(sub_cat_id) {
            let income_subcategories = @json($income_subcategories);
            income_subcategories.find(sub_cat => {
                if (sub_cat.id == sub_cat_id) {
                    $('input[name="name"]').val(sub_cat.name);
                    $('select[name="income_head_id"]').val(sub_cat.income_head_id);
                    $('select[name="project_id"]').val(sub_cat.project_id);
                    $('input[name="price"]').val(sub_cat.price);
                    $('input[name="vat"]').val(sub_cat.vat);
                    $('form').data('id', sub_cat.id);
                    let form_url = "{{ route('income-sub-category.update', ':id') }}";
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
            let url = "{{ route('income-sub-category.destroy', ':id') }}";
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
        }); //end of submit

        $(document).ready(function() {
            $('#Example').DataTable({
                "order": []
            });
        });

        $('#project_id').on('change', function() {
            let project_id = $(this).val();
            $.ajax({
                url: "{{ route('get-income-heads') }}",
                type: 'GET',
                data: {
                    project_id: project_id
                },
                success: function(response) {
                    let income_heads = response;
                    let html = '<option selected>Select Income Head</option>';
                    income_heads.forEach(income_head => {
                        html +=
                            `<option value="${income_head.id}">${income_head.name}</option>`;
                    });
                    $('#income_head_id').html(html);
                }
            });
        });

        $('.incomeSubHeadForm').submit(function(e) {
            e.preventDefault();
            let name = $('input[name="name"]').val();
            let project_id = $('select[name="project_id"]').val();
            let income_head_id = $('select[name="income_head_id"]').val();
            if (name == '' || project_id == 'Select Project' || income_head_id == 'Select Income Head') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please fill all the fields!',
                });
                return false;
            } else {
                this.submit();
            }
        });
    </script>
@endsection
