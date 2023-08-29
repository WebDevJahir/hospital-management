@extends('master.master')
@section('title', 'Investigation Category - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_heading = 'Add';
        $form_url = route('wound-describes.store');
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
                            <div class="t-header">Add Wound Describe</div>
                            <hr />
                            <form action="{{ $form_url }}" method="{{ $form_method }}">
                                @csrf

                                <div class="row gutters">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="price">Patient</label>
                                            <select class="form-control select2" id="patient_id" name="patient_id"
                                                required="">
                                                <option value="">Select Patient</option>
                                                @foreach ($patients as $patient)
                                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="total_price">Date</label>
                                            <input type="date" name="date" id="date" class="form-control"
                                                value="{{ Carbon\Carbon::now()->toDateString() }}" required="">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="product_name">Location</label>
                                            <input type="text" class="form-control" id="location" name="location"
                                                aria-describedby="emailHelp" placeholder="Location" required="required">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="quantity">Site</label>
                                            <input type="text" name="site" id="site" class="form-control"
                                                placeholder="Site" required="">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="price">1st Occured</label>
                                            <input type="time" name="first_occured" id="first_occured"
                                                placeholder="First Occured" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="price">Type/Pattern of wound</label>
                                            <select class="form-control" id="wound_type" name="wound_type" required="">
                                                <option value="Bed Sore">Bed Sore</option>
                                                <option value="Burn">Burn</option>
                                                <option value="Diabetic Foot">Diabetic Foot</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-outline-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                            <hr />

                            <div class="table-responsive">
                                <table id="Example" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>Reg No</th>
                                            <th>Full Name</th>
                                            <th>Phone</th>
                                            <th>Package</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="incomeHeadTable">
                                        @foreach ($wounds as $wound)
                                            <tr>
                                                <td>{{ $wound?->patient?->registration_no }}</td>
                                                <td>{{ $wound?->patient?->name }}</td>
                                                <td>{{ $wound?->patient?->contact_no }}</td>
                                                <td>{{ $wound?->patient?->package?->name }}</td>
                                                <td>{{ $wound?->patient?->user->email }}</td>
                                                <td>{{ $wound?->patient?->status }}</td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a data-toggle="tooltip" title="Edit"
                                                                onclick="edit({{ $wound->id }})"
                                                                class="btn btn-outline-warning btn-sm"><i
                                                                    class="fas fa-pen"></i></a>

                                                            <form
                                                                action="{{ route('wound-describes.destroy', $wound->id) }}"
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
            let wounds = @json($wounds);
            wounds.find(wound => {
                if (wound.id == id) {
                    $('#patient_id').val(wound.patient_id).trigger('change');
                    $('#date').val(wound.date);
                    $('#location').val(wound.location);
                    $('#site').val(wound.site);
                    $('#first_occured').val(wound.first_occured);
                    $('#wound_type').val(wound.wound_type).trigger('change');

                    $('form').data('id', wound.id);

                    let form_url = "{{ route('wound-describes.update', ':id') }}";
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

        $('.select2').select2({
            placeholder: 'Select an option'
        });

        $(document).ready(function() {
            $('#Example').DataTable({
                "order": []
            });
        });
    </script>
@endsection
