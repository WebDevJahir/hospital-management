@extends('master.master')
@section('title', 'Income Head - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $is_old = old('client_no') ? true : false;
        $form_heading = !empty($sale->id) ? 'Update' : 'Add';
        $form_url = !empty($sale->id) ? route('income-head.update', $sale->id) : route('income-head.store');
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

                            <div class="t-header">Income Head</div>
                            <hr />
                            <form action="{{ $form_url }}" method="{{ $form_method }}">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Name</span>
                                            <input type="text" class="form-control" placeholder="Income Head Name"
                                                name="name">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Project
                                                Name</span>
                                            <select class="form-control" name="project_id">
                                                <option selected>Select Project</option>
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                                @endforeach
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

                                <table id="Example"
                                    class="table custom-table dataTable no-footer table-striped table-bordered">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Income Head</th>
                                            <th>Project Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="incomeHeadTable">
                                        @foreach ($income_heads as $head)
                                            <tr>
                                                <td>{{ $head->name }}</td>
                                                <td>
                                                    {{ $head?->project?->name }}
                                                </td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a data-toggle="tooltip" title="Edit"
                                                                onclick="edit({{ $head->id }})"
                                                                class="btn btn-outline-warning btn-sm"><i
                                                                    class="fas fa-pen"></i></a>

                                                            <form action="{{ route('income-head.destroy', $head->id) }}"
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
        $(document).ready(function() {
            $('#Example').DataTable({
                "order": []
            });

            function edit(head_id) {
                let income_heads = @json($income_heads);
                income_heads.find(head => {
                    if (head.id == head_id) {
                        $('input[name="name"]').val(head.name);
                        $('select[name="project_id"]').val(head.project_id);
                        $('form').data('id', head.id);
                        let form_url = "{{ route('income-head.update', ':id') }}";
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
                let url = "{{ route('income-head.destroy', ':id') }}";
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
        });
    </script>
@endsection
