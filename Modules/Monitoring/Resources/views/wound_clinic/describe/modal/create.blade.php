@php
    $url = !empty($wound_describe) ? route('wound-describe.update', $wound_describe->id) : route('wound-describe.store');
    $method = !empty($wound_describe) ? 'PUT' : 'POST';
    $patient_id = !empty($wound_describe) ? $wound_describe->patient_id : $patient_id;
    $date = !empty($wound_describe) ? $wound_describe->date : date('d-m-Y');
    $location = !empty($wound_describe) ? $wound_describe->location : '';
    $site = !empty($wound_describe) ? $wound_describe->site : '';
    $first_occured = !empty($wound_describe) ? $wound_describe->first_occured : '';
    $wound_type = !empty($wound_describe) ? $wound_describe->wound_type : '';

@endphp

<div class="modal fade" id="woundDescribeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Wound Describe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ $url }}" method="POST">
                @csrf
                @method($method)
                <div class="modal-body">
                    <div class="form-group">
                        <label for="total_price">Date</label>
                        <input type="date" name="date" id="date" class="form-control"
                            value="{{ date('Y-m-d', strtotime($date)) }}" required="">
                    </div>
                    <div class="form-group">
                        <label for="product_name">Location</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Location"
                            value="{{ $location }}" required="">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Site</label>
                        <input type="text" name="site" id="site" class="form-control" placeholder="Site"
                            value="{{ $site }}" required="">
                    </div>
                    <div class="form-group">
                        <label for="price">1st Occured</label>
                        <input type="time" name="first_occured" id="first_occured" placeholder="First Occured"
                            class="form-control" required="" value="{{ $first_occured }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Type/Pattern of wound</label>
                        <select class="form-control" id="wound_type" name="wound_type" required="">
                            <option value="Bed Sore" {{ $wound_type == 'Bed Sore' ? 'selected' : '' }}>Bed Sore</option>
                            <option value="Burn" {{ $wound_type == 'Burn' ? 'selected' : '' }}>Burn</option>
                            <option value="Diabetic Foot" {{ $wound_type == 'Diabetic Foot' ? 'selected' : '' }}>
                                Diabetic Foot</option>
                        </select>
                    </div>
                    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
