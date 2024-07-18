@extends('master.master')
@section('title', 'Expense Sub Category - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $is_old = old('name') ? true : false;
        $form_heading = 'Add';
        $form_url = route('expense-sub-category.store');
        $form_method = 'POST';
        $name = $is_old ? old('name') : '';
        $price = $is_old ? old('price') : '';
        $vat = $is_old ? old('vat') : '';
        $vat_type = $is_old ? old('vat_type') : '';
        $income_head_id = $is_old ? old('income_head_id') : '';
        $project_id = $is_old ? old('project_id') : '';
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
                            <div class="t-header">Expense Sub Category</div>
                            <hr />
                            <form action="{{ $form_url }}" method="{{ $form_method }}" class="expenseSubCatForm">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Name <span
                                                    class="text-danger">*</span></span>
                                            <input type="text" class="form-control"
                                                placeholder="Income Sub Category Name" name="name"
                                                value="{{ $name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Expense Head <span
                                                    class="text-danger">*</span></span>
                                            <select class="form-control" name="expense_head_id" id="expense_head_id">
                                                <option selected>Select Expense Head</option>
                                                @foreach ($expense_heads as $expense_head)
                                                    <option value="{{ $expense_head->id }}"
                                                        @if ($income_head_id == $expense_head->id) selected @endif>
                                                        {{ $expense_head->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Project
                                                Name <span class="text-danger">*</span></span>
                                            <select class="form-control" name="project_id" id="project_id">
                                                <option selected>Select Project</option>
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}"
                                                        @if ($project_id == $project->id) selected @endif>
                                                        {{ $project->name }}</option>
                                                @endforeach
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
                                                <option value="Flat">Flat</option>
                                                <option value="Percentage">Percentage</option>
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

                            <table id="Example"
                                class="table custom-table dataTable no-footer table-striped table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Expense Sub Category</th>
                                        <th>Expense Head</th>
                                        <th>Project Name</th>
                                        <th>Price</th>
                                        <th>Vat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="incomeHeadTable">
                                    @if ($expense_subcategories->isNotEmpty())
                                        @foreach ($expense_subcategories as $sub_category)
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
            let expense_subcategories = @json($expense_subcategories);
            expense_subcategories.find(sub_cat => {
                if (sub_cat.id == sub_cat_id) {
                    $('input[name="name"]').val(sub_cat.name);
                    $('select[name="income_head_id"]').val(sub_cat.income_head_id);
                    $('select[name="project_id"]').val(sub_cat.project_id);
                    $('input[name="price"]').val(sub_cat.price);
                    $('input[name="vat"]').val(sub_cat.vat);
                    $('form').data('id', sub_cat.id);
                    let form_url = "{{ route('expense-sub-category.update', ':id') }}";
                    form_url = form_url.replace(':id', $('form').data('id'));
                    $('form').attr('action', form_url);
                    $('form').attr('method', 'POST');
                    $('form').append('<input type="hidden" name="_method" value="PUT">');
                }
            });
        }

        $(document).ready(function() {
            $('#Example').DataTable({
                "order": []
            });



            $('.deleteData').submit(function(e) {
                e.preventDefault();
                let form = this;
                let id = $(this).data('id');
                let url = "{{ route('expense-sub-category.destroy', ':id') }}";
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

            $('.expenseSubCatForm').submit(function(e) {
                e.preventDefault();
                let name = $('input[name="name"]').val();
                let expense_head_id = $('select[name="expense_head_id"]').val();
                let project_id = $('select[name="project_id"]').val();
                if(name == '' || expense_head_id == 'Select Expense Head' || project_id == 'Select Project'){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill all the required fields!',
                    });
                    return false;
                }else{
                    this.submit();
                }
            });
        });
    </script>
@endsection
