<style>
    .dot-wave {
        display: flex;
        gap: 10px;
        animation: wave 1s infinite;
        justify-content: center;
    }

    .dot {
        width: 20px;
        height: 20px;
        background-color: #0074D9;
        /* Change this color to your desired dot color */
        border-radius: 50%;
        animation: pulse 0.5s alternate infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        100% {
            transform: scale(1.2);
        }
    }

    @keyframes wave {

        0%,
        100% {
            transform: translateX(0);
        }

        50% {
            transform: translateX(30px);
            /* Adjust the distance between dots */
        }
    }
</style>
<div class="modal fade" id="editInvestigation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Investigation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gutters">
                    <div class="col-6 col-md-6 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text custom-group-text">
                                <span class="icon-calendar"></span>
                            </span>
                            <select class="form-control select2" data-width="100%" name="sub_category_id"
                                id="edit_sub_category">
                                <option selected value="">List of investigation</option>
                                @foreach ($sub_categories as $sub_category)
                                    <option value="{{ $sub_category->id }}"
                                        @if ($sub_category->id == $investigation->sub_category_id) selected @endif">
                                        {{ $sub_category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text custom-group-text">
                                <span class="icon-calendar"></span>
                            </span>
                            <input type="number" class="form-control" placeholder="Result" id="edit_result"
                                name="result" value="{{ $investigation->result }}">
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text custom-group-text">
                                <span class="icon-calendar"></span>
                            </span>
                            <input type="text" class="form-control" placeholder="Unit" id="edit_unit" name="unit"
                                value="{{ $investigation->sub_category->unit }}">
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text custom-group-text">
                                <span class="icon-calendar"></span>
                            </span>
                            <input type="text" class="form-control" placeholder="Minimum Value"
                                id="edit_minimum_maximum_value"
                                value="{{ $investigation->sub_category->minimum_value . '-' . $investigation->sub_category->maximum_value }}">
                            <input type="hidden" id="edit_minimum_value"
                                value="{{ $investigation->sub_category->minimum_value }}">
                            <input type="hidden" id="edit_maximum_value"
                                value="{{ $investigation->sub_category->maximum_value }}">
                        </div>
                    </div>
                    <input type="hidden" id="update_medicine_id" value="{{ $investigation->id }}">

                    <div class="dot-wave" id="loader" style="display: none;">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateInvestigation"
                    onclick="updateInvestigation({{ $investigation->id }})">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('change', '#edit_sub_category', function() {
        $('#loader').fadeIn();
        var sub_category_id = $(this).val();
        if (sub_category_id != '') {
            // $('#updateInvestigation').html('Updating...');
            $.ajax({
                url: "{{ route('get-normal-value') }}",
                type: "GET",
                data: {
                    id: sub_category_id
                },
                success: function(data) {
                    $('#edit_minimum_maximum_value').val(data.minimum_value + '-' + data
                        .maximum_value);
                    $('#edit_maximum_value').val(data.maximum_value);
                    $('#edit_minimum_value').val(data.minimum_value);
                    $('#edit_unit').val(data.unit);
                    $('#edit_result').val('');
                    $('#loader').fadeOut();
                    // $('#updateInvestigation').html(
                    // '<i class="fa fa-plus-square" aria-hidden="true"></i> Add');
                }
            });
        }
    });

    $(document).on('input', '#edit_result', function() {
        var maximum_value = Number($('#edit_maximum_value').val());
        var minimum_value = Number($('#edit_minimum_value').val());
        var result = Number($('#edit_result').val());
        if (result >= minimum_value && result <= maximum_value) {
            $('#edit_result').css("color", "")
            $('#edit_result').css("color", "green")
        } else {
            $('#edit_result').css("color", "")
            $('#edit_result').css("color", "red")
        }
    })
</script>
