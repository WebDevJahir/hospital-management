@php
    $form_url = !empty($roster) ? route('roster.update', $roster->id) : route('roster.store');
    $form_method = !empty($roster) ? 'PUT' : 'POST';
    $title = !empty($roster) ? 'Edit' : 'Add';
    $morning_statff = !empty($morning_staff) ? $morning_staff : [];
    $evening_statff = !empty($evening_staff) ? $evening_staff : [];
    $night_statff = !empty($night_staff) ? $night_staff : [];
    $visit_statff = !empty($visit_staff) ? $visit_staff : [];
    $on_duty = !empty($roster_visit_on_duty) ? $roster_visit_on_duty : [];
    $off_duty = !empty($roster_visit_off_duty) ? $roster_visit_off_duty : [];
@endphp

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Roster ({{ date('d-m-Y', strtotime($date)) }})
                    {{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ $form_url }}" method="POST">
                @csrf
                @method($form_method)
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"> <b> Patient:</b></span>
                            </div>
                            <input type="text" class="form-control" placeholder="" id="patient_name"
                                value="{{ $patient->name }}" readonly>
                            <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                        </div>
                    </div>
                    <input name="start_date" id="start_date" value="{{ $date }}" hidden="hidden">
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <div class="form-group">
                                <div style="font-weight: bold;"> Morning</div>
                                <div class="input-group">
                                    <select class="form-control select2" id="addmorning" name="addmorning[]"
                                        multiple="multiple" data-width="100%">
                                        <option value="0">Select</option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}"
                                                @if (in_array($employee->id, $morning_statff)) selected @endif>
                                                {{ $employee->first_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="form-group">
                                <div style="font-weight: bold;"> Evening</div>
                                <div class="input-group">
                                    <select class="form-control select2" id="addevening" name="addevening[]"
                                        multiple="multiple" data-width="100%">
                                        <option value="0"></option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}"
                                                @if (in_array($employee->id, $evening_statff)) selected @endif>
                                                {{ $employee->first_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="form-group">
                                <div style="font-weight: bold;"> Night</div>
                                <div class="input-group">
                                    <select class="form-control select2" id="addnight" name="addnight[]"
                                        multiple="multiple" data-width="100%">
                                        <option value="0"></option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}"
                                                @if (in_array($employee->id, $night_statff)) selected @endif>
                                                {{ $employee->first_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            {{-- @dump($employees) --}}
                            <div class="form-group">
                                <div style="font-weight: bold;"> Note</div>
                                <div class="input-group">
                                    <textarea class="form-control" id="addnote" name="note">{{ $roster->note }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <table class="table">
                                <tr>
                                    <th>Visit</th>
                                    <th>On Duty</th>
                                    <th>Off Duty</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <select class="form-control select2" id="addvisit" data-width="100%">
                                                <option value="">Select employee</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->id }}">
                                                        {{ $employee->first_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input type="radio" checked="" id="on_duty" name="on_duty"
                                                value="1"><span
                                                style="margin-left: 5px; margin-top: -3px; margin-right: 10px;">On
                                                Duty</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input type="radio" id="off_duty" name="on_duty" value="1"><span
                                                style="margin-left: 5px; margin-top: -3px;">Off Duty</span>
                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-outline-success" id="add_list_btn"><i
                                                class="fa fa-plus-square" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            </table>
                            <table class="table">
                                <tbody id="income_head_list">
                                    @if (!empty($visit_staff))
                                        @foreach ($visit_staff as $key => $visit)
                                            <tr>
                                                <td>
                                                    <select class="form-control select2" name="addvisit[]"
                                                        data-width="100%">
                                                        @foreach ($employees as $employee)
                                                            <option value="{{ $employee->id }}"
                                                                {{ $visit_staff[$key] == $employee->id ? 'selected' : '' }}>
                                                                {{ $employee->first_name }}</option>
                                                        @endforeach
                                                </td>
                                                <td>
                                                    <input type="hidden" class="form-control on_duty" placeholder=""
                                                        id="on_duty" name="on_duty[]"
                                                        value="{{ $on_duty[$key] }}">
                                                    <input type="text" class="form-control" placeholder=""
                                                        id="on_duty_text"
                                                        value="{{ $on_duty[$key] == 1 ? 'Yes' : 'No' }}" readonly>
                                                </td>
                                                <td>
                                                    <input type="hidden" class="form-control off_duty"
                                                        placeholder="" id="off_duty" name="off_duty[]"
                                                        value="{{ $off_duty[$key] }}">
                                                    <input type="text" class="form-control" placeholder=""
                                                        id="off_duty"
                                                        value="{{ $off_duty[$key] == 1 ? 'Yes' : 'No' }}" readonly>
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-outline-danger remove_list_btn"><i
                                                            class="fa fa-minus-square"
                                                            aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('.select2').select2({
        dropdownParent: $("#addModal")
    });

    // function saveRoster(patient) {
    //     var adddate = $("#adddate").val();
    //     var addmorning = $("#addmorning").val();
    //     var addevening = $("#addevening").val();
    //     var addnight = $("#addnight").val();
    //     //var addvisit = $( "#addvisit" ).val();
    //     var addnote = $("#addnote").val();
    //     //var on_duty = $( "#on_duty:checked" ).val();
    //     var on_duties = $('.on_duty').map(function() {
    //         return this.value;
    //     }).get();
    //     var addvisit = $('.addvisit').map(function() {
    //         return this.value;
    //     }).get();
    //     var visit_staff = $('.visit_staff').map(function() {
    //         return this.value;
    //     }).get();

    //     console.log(visit_staff);

    //     var off_duties = $('.off_duty').map(function() {
    //         return this.value;
    //     }).get();
    //     var morning_staff = $("#addmorning option:selected").toArray().map(item => item.text).join();
    //     var night_staff = $("#addnight option:selected").toArray().map(item => item.text).join();
    //     var evening_staff = $("#addevening option:selected").toArray().map(item => item.text).join();
    //     var visit_staff = $("#addvisit option:selected").toArray().map(item => item.text).join();
    //     $.get('{{ route('roster-store') }}', {
    //         adddate: adddate,
    //         addmorning: addmorning,
    //         addevening: addevening,
    //         addnight: addnight,
    //         addvisit: addvisit,
    //         patient: patient,
    //         addnote: addnote,
    //         morning_staff: morning_staff,
    //         night_staff: night_staff,
    //         evening_staff: evening_staff,
    //         visit_staff: visit_staff,
    //         off_duty: off_duties,
    //         on_duty: on_duties
    //     }, function(data) {
    //         // window.location.href = window.location.href
    //         $('#editModal').modal('hide');
    //     });
    // }

    $("#add_list_btn").click(function() {
        var current_visit = $('#addvisit').val();
        var current_on_duty = $('#on_duty').val();
        var current_off_duty = $('#off_duty').val();
        if (current_visit == '') {
            alert('Please Enter visit staff')
            return false;
        }

        if ($('#on_duty').is(":checked")) {
            set_on_duty_text = 'Yes';
            set_on_duty = 1;
        } else {
            set_on_duty_text = 'No';
            set_on_duty = 0;
        }
        if ($('#off_duty').is(":checked")) {
            set_off_duty_text = 'Yes';
            set_off_duty = 1;
        } else {
            set_off_duty_text = 'No';
            set_off_duty = 0;
        }
        var entered_visit =
            '<td><input type="hidden" class="form-control addvisit"  placeholder="" id="addvisit" name="addvisit[]" value="' +
            $('#addvisit').val() +
            '"><input type="text" class="form-control visit_staff"  placeholder="" value="' + $(
                '#addvisit option:selected').text().trim() +
            '"  readonly></td>';
        var entered_on_duty =
            '<td><input type="hidden" class="form-control on_duty"  placeholder="" id="on_duty" name="on_duty[]" value="' +
            set_on_duty +
            '" ><input type="text" class="form-control"  placeholder="" id="on_duty_text" value="' +
            set_on_duty_text + '"  readonly></td>';
        var entered_off_duty =
            '<td><input type="hidden" class="form-control off_duty"  placeholder="" id="off_duty" name="off_duty[]" value="' +
            set_off_duty +
            '"><input type="text" class="form-control"  placeholder="" id="off_duty" value="' +
            set_off_duty_text + '"  readonly></td>';
        var remove_btn =
            '<td><button type="button" class="btn btn-outline-danger remove_list_btn"><i class="fa fa-minus-square" aria-hidden="true"></i></button></td>';
        $("#income_head_list").append("<tr>" + entered_visit + entered_on_duty + entered_off_duty + remove_btn +
            "</tr>");
        $("#addvisit").val('').trigger('change');
    });

    $("#income_head_list").on('click', '.remove_list_btn', function(e) { // Once remove button is clicked
        $(this).closest('tr').remove(); //Remove field html
    });
</script>
