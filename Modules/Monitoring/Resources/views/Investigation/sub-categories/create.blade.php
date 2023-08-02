@extends('master.master')
@section('title', 'Investigation Category - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_heading = 'Add';
        $form_url = route('investigation-categories.store');
        $form_method = 'POST';
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
                            <div class="t-header">Investigation Category</div>
                            <hr />
                            <form action="{{ $form_url }}" method="{{ $form_method }}">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Category</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for=""><span
                                                            class="icon-folder-plus"></span></label>
                                                </div>
                                                <select class="form-control select2" data-width=90% id="category">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Test Name</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><span
                                                            class="icon-add-to-list"></span></span>
                                                </div>
                                                <input type="text" id="subCategoryName" class="form-control"
                                                    placeholder="Sub Category Name" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Normal Value</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><span
                                                            class="icon-price-tag"></span></span>
                                                </div>
                                                <input type="number" class="form-control" id="minimum_value"
                                                    placeholder="Minimum" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                                <input type="number" class="form-control" id="maximum_value"
                                                    placeholder="Maximum" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <div style="font-weight: bold;">Unit</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><span
                                                            class="icon-add-to-list"></span></span>
                                                </div>
                                                <input type="text" id="unit" class="form-control"
                                                    placeholder="Unit Name" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <button type="submit" class="btn btn-outline-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                            <hr />

                            <div class="table-responsive">
                                <table id="Example" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="incomeHeadTable">
                                        @foreach ($sub_categories as $categorie)
                                            <tr>
                                                <td>{{ $categorie->sub_category_name }}</td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a data-toggle="tooltip" title="Edit"
                                                                onclick="edit({{ $categorie->id }})"
                                                                class="btn btn-outline-warning btn-sm"><i
                                                                    class="fas fa-pen"></i></a>

                                                            <form
                                                                action="{{ route('investigation-categories.destroy', $categorie->id) }}"
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
            let sub_categories = @json($sub_categories);
            sub_categories.find(categorie => {
                if (categorie.id == id) {
                    $('input[name="category_name"]').val(categorie.category_name);
                    $('form').data('id', categorie.id);
                    let form_url = "{{ route('investigation-categories.update', ':id') }}";
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
    </script>
@endsection
