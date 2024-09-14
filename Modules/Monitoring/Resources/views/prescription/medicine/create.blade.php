@extends('master.master')
@section('title', 'Medice - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $is_old = old('client_no') ? true : false;
        $form_heading = !empty($sale->id) ? 'Update' : 'Add';
        $form_url = !empty($medicine->id) ? route('medicines.update', $sale->id) : route('medicines.store');
        $form_method = !empty($medicine->id) ? 'PUT' : 'POST';
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

                            <div class="t-header">Medicine</div>
                            <hr />
                            <form action="{{ $form_url }}" method="{{ $form_method }}" class="medicineForm">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Name <span
                                                    class="text-danger">*</span></span>
                                            <input type="text" class="form-control" placeholder="Medicine Name"
                                                name="name" value="{{ $is_old ? old('name') : '' }}" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Note</span>
                                            <input type="text" class="form-control" placeholder="Note" name="note"
                                                value="{{ $is_old ? old('note') : '' }}">
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
                                            <th>Name</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="medicineTable">
                                        @foreach ($medicines as $medicine)
                                            <tr>
                                                <td>{{ $medicine->name }}</td>
                                                <td>
                                                    {{ $medicine?->note }}
                                                </td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a data-toggle="tooltip" title="Edit"
                                                                onclick="edit({{ $medicine->id }})"
                                                                class="btn btn-outline-warning btn-sm"><i
                                                                    class="fas fa-pen"></i></a>

                                                            <form action="{{ route('medicines.destroy', $medicine->id) }}"
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
        function edit(medicine_id) {
            let medicines = @json($medicines);
            medicines.find(medicine => {
                if (medicine.id == medicine_id) {
                    $('input[name="name"]').val(medicine.name);
                    $('input[name="note"]').val(medicine.note);
                    $('form').data('id', medicine.id);
                    let form_url = "{{ route('medicines.update', ':id') }}";
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
            let url = "{{ route('medicines.destroy', ':id') }}";
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

        $('.medicineForm').submit(function(e) {
            e.preventDefault();
            let name = $('input[name="name"]').val();
            let note = $('input[name="note"]').val();
            if (name == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Name is required!',
                });
                return false;
            } else {
                this.submit();
            }
        });
    </script>
@endsection
