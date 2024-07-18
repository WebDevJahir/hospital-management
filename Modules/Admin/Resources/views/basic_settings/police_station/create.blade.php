@extends('master.master')
@section('title', 'Thana - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_heading = 'Add';
        $form_url = route('police-station.store');
        $form_method = 'POST';
        $name = old('name') ? old('name') : '';
        $district_id = old('city_id') ? old('city_id') : '';
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
                            <div class="t-header">Thana</div>
                            <hr />
                            <form action="{{ $form_url }}" method="{{ $form_method }}" class="policeStationForm">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">Name <span
                                                    class="text-danger">*</span></span>
                                            <input type="text" class="form-control" placeholder="Police Station Name"
                                                name="name" value="{{ $name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text custom-group-text">City <span
                                                    class="text-danger">*</span></span>
                                            <select class="form-control" name="district_id" required>
                                                <option value="">Select City</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        @if ($district->id == $district_id) selected @endif>
                                                        {{ $district->name }}</option>
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
                                            <th>Name</th>
                                            <th>District</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="incomeHeadTable">
                                        @foreach ($police_stations as $station)
                                            <tr>
                                                <td>{{ $station->name }}</td>
                                                <td>{{ $station->district->name }}</td>
                                                <td>
                                                    <div class="icon-btn">
                                                        <nobr>
                                                            <a data-toggle="tooltip" title="Edit"
                                                                onclick="edit({{ $station->id }})"
                                                                class="btn btn-outline-warning btn-sm"><i
                                                                    class="fas fa-pen"></i></a>

                                                            <form
                                                                action="{{ route('police-station.destroy', $station->id) }}"
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
            let police_stations = @json($police_stations);
            police_stations.find(station => {
                if (station.id == id) {
                    $('input[name="name"]').val(station.name);
                    $('select[name="city_id"]').val(station.district_id);
                    $('form').data('id', station.id);
                    let form_url = "{{ route('police-station.update', ':id') }}";
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

        $('.policeStationForm').submit(function(e) {
            e.preventDefault();
            let name = $('input[name="name"]').val();
            let city_id = $('select[name="city_id"]').val();
            if (name == '' || city_id == '') {
                Swal.fire({
                    title: 'Please fill all the required fields!',
                    icon: 'error',
                    confirmButtonColor: '#0d6efd',
                });
            } else {
                this.submit();
            }
        });
    </script>
@endsection
