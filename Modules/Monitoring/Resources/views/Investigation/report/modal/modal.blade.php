<div class="modal fade" id="investigationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Investigation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('add-investigation-report') }}" method="post" id="form">
                    @csrf
                    <div class="row gutters">
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text custom-group-text">
                                    Patient Name:
                                </span>
                                <input type="text" disabled class="form-control" value="{{ $patient->user->name }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text custom-group-text">
                                    Phone:
                                </span>
                                <input type="text" disabled class="form-control" value="{{ $patient->contact_no }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text custom-group-text">
                                    Email:
                                </span>
                                <input type="text" disabled class="form-control" value="{{ $patient->user->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text custom-group-text">
                                    Date:
                                </span>
                                <input type="date" class="form-control" name="date" id="date">
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <tr>
                            <th>Investigation List</th>
                            <th>Result</th>
                            <th>Unit</th>
                            <th>Normal Value</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control select2" data-width="100%" name="sub_category"
                                    id="inv_sub_category">
                                    <option selected value="">List of investigation</option>
                                    @foreach ($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}">
                                            {{ $sub_category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Result" name="result"
                                    id="result" aria-label="Username" aria-describedby="basic-addon1">
                            </td>
                            <td>
                                <div>
                                    <input type="text" class="form-control" placeholder="Unit" id="unit"
                                        readonly="" name="unit" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" class="form-control" value="" readonly=""
                                        placeholder="Normal Value" name="normal_value" id="normal_value"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" id="add_list_btn" onclick="addRow()"><i
                                        class="fa fa-plus-square" aria-hidden="true"></i>
                                    Add</button>
                            </td>
                        </tr>
                    </table>
                    <table class="table">
                        <tbody id="investigation_list">
                        </tbody>
                    </table>

                    <input type="hidden" name="maximum_value" id="maximum_value">
                    <input type="hidden" name="minimum_value" id="minimum_value">
                    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updatePrescriptionMedicine">Add</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.select2').select2({
        dropdownParent: $("#investigationModal")
    });

    $(document).on('change', '#inv_sub_category', function() {
        var sub_category_id = $(this).val();
        if (sub_category_id != '') {
            $('#add_list_btn').html('<i class="fa fa-spinner fa-spin"></i> Loading');
            $.ajax({
                url: "{{ route('get-normal-value') }}",
                type: "GET",
                data: {
                    id: sub_category_id
                },
                success: function(data) {
                    $('#normal_value').val(data.minimum_value + '-' + data.maximum_value);
                    $('#maximum_value').val(data.maximum_value);
                    $('#minimum_value').val(data.minimum_value);
                    $('#unit').val(data.unit);
                    $('#add_list_btn').html(
                        '<i class="fa fa-plus-square" aria-hidden="true"></i> Add');
                }
            });
        }
    });

    $(document).on('input', '#result', function() {
        var maximum_value = Number($('#maximum_value').val());
        var minimum_value = Number($('#minimum_value').val());
        var result = Number($('#result').val());
        if (result >= minimum_value && result <= maximum_value) {
            $('#result').css("color", "")
            $('#result').css("color", "green")
        } else {
            $('#result').css("color", "")
            $('#result').css("color", "red")
        }
    })

    function addRow() {
        var current_sub_category = $('#inv_sub_category').val();
        var entered_sub_category_name = $('#inv_sub_category option:selected').text().trim();
        var entered_result = $('#result').val();
        var entered_unit = $('#unit').val();
        var entered_normal_value = $('#normal_value').val();
        console.log('entered_sub_category_name', entered_sub_category_name)
        if (current_sub_category === '' || entered_result === '' || entered_unit === '') {
            alert('Please Enter ' +
                (current_sub_category === '' ? 'Investigation Name, ' : '') +
                (entered_result === '' ? 'Result, ' : '') +
                (entered_unit === '' ? 'Unit, ' : '').slice(0, -2));
        } else {
            var row = `
            <tr>
            <td><input type="hidden" class="form-control" placeholder="" name="sub_category[]" value="${current_sub_category}"><input type="text" class="form-control" placeholder="" value="${entered_sub_category_name}" readonly></td>
            <td><input type="text" class="form-control" placeholder="" name="result[]" value="${entered_result}" readonly></td>
            <td><input type="text" class="form-control" placeholder="" name="unit[]" value="${entered_unit}" readonly></td>
            <td><input type="text" class="form-control" placeholder="" name="normal_value[]" value="${entered_normal_value}" readonly></td>
            <td><button type="button" class="btn btn-danger remove_list_btn"><i class="fa fa-minus-square" aria-hidden="true"></i> Remove</button></td>
            </tr>
            `;
            $("#investigation_list").append(row);
            $("#result, #unit, #normal_value").val('');
            $('#inv_sub_category').val('').trigger('change');
            $("#unit").val('');
        }
    }
</script>
