@extends('master.master')
@section('title', 'Service Charge - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_heading = 'Add';
        $form_url = route('service-charge.store');
        $form_method = 'POST';
        $is_old = old('district_id') ? true : false;
        $district_id = $is_old ? old('district_id') : '';
        $police_station_id = $is_old ? old('police_station_id') : '';
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
                            <div class="t-header">Service Charge</div>
                            <hr />
                            <form action="{{ $form_url }}" method="{{ $form_method }}">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">District <span
                                                    class="text-danger">*</span></span>
                                            <select class="form-control select2" name="district_id" id="district_id"
                                                required>
                                                <option value="">Select District</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Police Station <span
                                                    class="text-danger">*</span></span>
                                            <select class="form-control" name="police_station_id" required>
                                                <option value="">Select Police Station</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Charge <span
                                                    class="text-danger">*</span></span>
                                            <input type="text" class="form-control" placeholder="charge" name="charge"
                                                value="{{ $charge }}" required>
                                        </div>
                                    </div>
                                    <div class="col-1">
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
                                            <th>City</th>
                                            <th>Police Station</th>
                                            <th>Charge</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="incomeHeadTable">
                                        @foreach ($service_charges as $charge)
                                            <tr>
                                                <td>{{ $charge?->city?->name }}</td>
                                                <td>{{ $charge?->policeStation?->name }}</td>
                                                <td>{{ $charge->charge }}</td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a data-toggle="tooltip" title="Edit"
                                                                onclick="edit({{ $charge->id }})"
                                                                class="btn btn-outline-warning btn-sm"><i
                                                                    class="fas fa-pen"></i></a>

                                                            <form
                                                                action="{{ route('service-charge.destroy', $charge->id) }}"
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
            let service_charges = @json($service_charges);
            service_charges.find(charge => {
                if (charge.id == id) {
                    let police_stations = @json($police_stations);
                    let html = '<option value="">Select Police Station</option>';
                    $.each(police_stations, function(index, value) {
                        if (value.city_id == charge.city_id) {
                            html += '<option value="' + value.id + '">' + value.name + '</option>';
                        }
                    });
                    $('select[name="police_station_id"]').html(html);
                    $('input[name="name"]').val(charge.name);
                    $('select[name="city_id"]').val(charge.city_id);
                    $('select[name="police_station_id"]').val(charge.police_station_id);
                    $('input[name="charge"]').val(charge.charge);
                    $('form').data('id', charge.id);
                    let form_url = "{{ route('service-charge.update', ':id') }}";
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

        $('#city_id').change(function() {
            let city_id = $(this).val();
            $.ajax({
                url: "{{ route('get-police-station') }}",
                type: 'GET',
                data: {
                    city_id: city_id
                },
                success: function(response) {
                    let police_stations = response;
                    let html = '<option value="">Select Police Station</option>';
                    $.each(police_stations, function(index, value) {
                        console.log(value);
                        html += '<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    $('select[name="police_station_id"]').html(html);
                }
            });
        });

        $(document).ready(function() {
            $('#Example').DataTable({
                "order": []
            });
        });

        $('.districtForm').submit(function(e) {
            e.preventDefault();
            let name = $('input[name="name"]').val();
            if (name == '') {
                Swal.fire({
                    title: 'Please fill all the required fields!',
                    icon: 'error',
                    confirmButtonColor: '#0d6efd',
                });
                return false;
            } else {
                this.submit();
            }
        });
    </script>
@endsection
