@php
    $url = !empty($wound_management) ? route('wound-management.update', $wound_management->id) : route('wound-management.store');
    $method = !empty($wound_management) ? 'PUT' : 'POST';
    $patient_id = !empty($wound_management) ? $wound_management->patient_id : $patient->id;
    $date = !empty($wound_management) ? $wound_management->date : date('d-m-Y');
    $debridement = !empty($wound_management) ? $wound_management->debridement : '';
    $solution = !empty($wound_management) ? $wound_management->solution : '';
    $product_used = !empty($wound_management) ? $wound_management->product_used : '';
    $frequency = !empty($wound_management) ? $wound_management->frequency : '';
    $next_date = !empty($wound_management) ? $wound_management->next_date : '';
@endphp

<div class="modal fade" id="woundManagementModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Morphin Docs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ $url }}" method="POST">
                @csrf
                @method($method)
                <div class="modal-body">
                    <div class="form-group">
                        <label for="total_price">Date</label>
                        <input type="date" name="date" id="date" class="form-control"
                            value="{{ date('Y-m-d', strtotime($date)) }}">
                    </div>
                    <div class="form-group">
                        <label for="product_name">Debridement</label>
                        <input type="text" class="form-control" id="debridement" name="debridement"
                            placeholder="Debridement" value="{{ $debridement }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Cleaning solution used</label>
                        <select class="form-control" id="solution" name="solution" required="">
                            <option value="normal saline" {{ $solution == 'normal saline' ? 'selected' : '' }}>Normal
                                Saline</option>
                            <option value="USOL" {{ $solution == 'USOL' ? 'selected' : '' }}>USOL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Product Used</label>
                        <input type="text" name="product_used" id="product_used" class="form-control"
                            placeholder="Product Used" value="{{ $product_used }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Dressing Frequency</label>
                        <input type="text" name="frequency" id="frequency" placeholder="Dressing Frequency"
                            class="form-control" value="{{ $frequency }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Next Review Date</label>
                        <input type="date" name="next_date" id="next_date" class="form-control"
                            value="{{ $next_date }}">
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
