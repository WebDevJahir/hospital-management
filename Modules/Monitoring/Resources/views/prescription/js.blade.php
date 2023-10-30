<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    function loaderShow() {
        $("#loader-container").show();
        $("#content").css("pointer-events", "none");
    }

    function loaderHide() {
        $("#loader-container").hide();
        $("#content").css("pointer-events", "auto");
    }

    $(document).on('change', '#status', function() {
        var status = $(this).val();
        $.ajax({
            url: "{{ route('get-patients') }}",
            type: "GET",
            data: {
                status: status
            },
            success: function(data) {
                var html = '<option value="">Select Patient</option>';
                $.each(data, function(key, v) {
                    html += '<option value="' + v.id + '">' + v.name + '</option>';
                });
                $('#patient').html(html);
            }
        });
    });


    $('#patient').change(function() {
        var patient_id = $(this).val();
        var route = "{{ route('prescription.create', ':patient_id') }}";
        route = route.replace(':patient_id', patient_id);
        window.location.href = route;
    });

    function addInvReport() {
        loaderShow()
        var patient_id = ($('#patient').val())
        $('#modal-body').html(null);
        $.get('{{ route('investigation.create') }}', {
            patient_id: patient_id
        }, function(data) {
            $('#edit_modal_body').html(data);
            $('#investigationModal').modal('show');
            loaderHide()
        });
    }


    function editInvestigation(id) {
        loaderShow()
        $('#investigationModal').modal('hide');
        var url = "{{ route('investigation.edit', ':id') }}";
        url = url.replace(':id', id);
        $.get(url, function(data) {
            loaderHide()
            $('#edit_modal_body').html(data);
            $('#editInvestigation').modal('show');

        });
    }

    function updateInvestigation(id) {
        $('#updateInvestigation').html('Updating...');
        var sub_category_id = $('#edit_sub_category').val();
        var result = $('#edit_result').val();
        var patient_id = $('#patient_id').val();
        var url = "{{ route('investigation.update', ':id') }}";
        url = url.replace(':id', id);
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                sub_category_id: sub_category_id,
                result: result,
                patient_id: patient_id,
                _token: '{{ @csrf_token() }}',
                _method: 'PUT'
            },
            success: function(data) {
                Toast.fire({
                    icon: 'success',
                    title: 'Investigation updated successfully.',
                });
                $('#editInvestigation').modal('hide');
            }
        });

    }

    function addNextPlan() {
        $('#nextPlanModal').modal('show');
    }

    function nextplanList() {
        loaderShow()
        var patient_id = ($('#patient').val())
        let url = '{{ route('next-plan.show', ':patient_id') }}';
        url = url.replace(':patient_id', patient_id);
        $.get(url, function(data) {
            $('#edit_modal_body').html(data);
            $('#planListModal').modal('show');
            loaderHide()
        });
    }

    $(document).on('click', '.deletePlanButton', function() {
        var clickedButton = $(this);
        var id = clickedButton.closest('tr').find('.next_plan_id').val();
        var message = "Are you sure you want to delete this plan?";
        var confirmMessage = "Yes, Delete it!";
        showConfirmationDialog(message, confirmMessage, () => {
            clickedButton.html('<i class="fas fa-spinner fa-spin text-danger"></i>')
            deleteNextPlan(id);
        })
    });

    function deleteNextPlan(id) {
        var url = '{{ route('next-plan.destroy', ':id') }}';
        url = url.replace(':id', id);
        $.ajax({
            url: url,
            type: 'DELETE',
            data: {
                _token: '{{ @csrf_token() }}'
            },
            success: function(data) {
                Toast.fire({
                    icon: 'success',
                    title: 'Next plan deleted successfully.',
                });
                $('#tr' + id).fadeOut();
            }
        });
    }

    $(document).on('click', '#addNextPlanButton', function() {
        var patient_id = $("#patient_id").val();
        var plan = $("#plan").val();
        var notification_date = $("#notification_date").val();
        $.ajax({
            url: '{{ route('next-plan.store') }}',
            type: 'POST',
            data: {
                patient_id: patient_id,
                plan: plan,
                notification_date: notification_date,
                _token: '{{ @csrf_token() }}'
            },
            success: function(data) {
                Toast.fire({
                    icon: 'success',
                    title: 'Next plan added successfully.',
                });
                $('#nextPlanModal').modal('hide');
            }
        });
    });

    function addMedicine() {
        $('#addMedicinebutton').html('Adding...');
        var patient_id = $("#patient_id").val();
        var medicine = $("#medicine").val();
        var note = $("#note").val();
        var dose = $("#dose").val();
        var duration = $("#duration").val();
        var date = new Date();
        $.ajax({
            url: '{{ route('prescription.store') }}',
            type: 'POST',
            data: {
                patient_id: patient_id,
                medicine: medicine,
                note: note,
                dose: dose,
                duration: duration,
                _token: '{{ @csrf_token() }}'
            },
            success: function(data) {
                Toast.fire({
                    icon: 'success',
                    title: 'Medicine added successfully.',
                });
                $('#addMedicine').modal('hide');
                var newrow = '<tr> <td colspan="2">' +
                    data.medicine +
                    '<br>' + '(' + data.dose + ')' + '<br>' + data.note + '-' + data.duration +
                    '</td> <td>' + date.toLocaleString() +
                    '</td> <td> <button class="btn btn-sm" style="background:inherit" title="Edit" style="margin:2px;" onclick="editMedicine(' +
                    data.id +
                    ')" type="submit"><i class="fas fa-edit text-success"></i></button> <br> <button class="btn btn-sm" style="background:inherit" title="Cancel" style="margin:2px;" onclick="cancelMedicine(' +
                    data.id +
                    ')" type="submit"><i class="fas fa-trash-alt text-danger"></i></button><br><a class="btn btn-sm" style="background:inherit" title="Send SMS"  href="/send-medicine-sms/' +
                    data.id + '" type="submit"><i class="fas fa-sms text-primary"></i></a>  </td> </tr>';
                $('#activeMedicineModalTable').append(newrow);
                $('#medicineTable').append(newrow);
                $("#medicine").val('');
                $("#note").val('');
                $("#dose").val('');
                $("#duration").val('');
            }
        });
    }

    function editMedicine(id) {
        loaderShow()
        url = '{{ route('prescription.edit', ':id') }}';
        url = url.replace(':id', id);
        $.get(url, function(data) {
            $('#edit_modal_body').html(data);
            $('#editMedicine').modal('show');
            loaderHide()
        })
    }

    $(document).on('click', '#updatePrescriptionMedicine', function() {
        $('#updatePrescriptionMedicine').html('Updating...');
        var id = $("#update_medicine_id").val();
        var medicine = $("#update_medicine").val();
        var note = $("#update_note").val();
        var dose = $("#update_dose").val();
        var duration = $("#update_duration").val();
        var url = '{{ route('prescription.update', ':id') }}';
        url = url.replace(':id', id);
        $.ajax({
            url: url,
            type: 'PUT',
            data: {
                id: id,
                medicine: medicine,
                note: note,
                dose: dose,
                duration: duration,
                _token: '{{ @csrf_token() }}'
            },
            success: function(data) {
                Toast.fire({
                    icon: 'success',
                    title: 'Medicine updated successfully.',
                });
                $('#editMedicine').modal('hide');
                $('#medicineTable').find('tr').each(function() {
                    var row = $(this);
                    var medicine_id = row.find('.medicine_id').val();
                    if (medicine_id == id) {
                        row.find('td').eq(0).html(data.medicine + '<br>' + '(' + data.dose +
                            ')' +
                            '<br>' + data.note + '-' + data.duration);
                        row.find('td').eq(1).html(data.created_at);
                        row.find('td').eq(2).html(
                            '<button class="btn btn-sm" style="background:inherit" title="Edit" style="margin:2px;" onclick="editMedicine(' +
                            data.id +
                            ')" type="submit"><i class="fas fa-edit text-success"></i></button> <br> <button class="btn btn-sm" style="background:inherit" title="Cancel" style="margin:2px;" onclick="cancelMedicine(' +
                            data.id +
                            ')" type="submit"><i class="fas fa-trash-alt text-danger"></i></button><br><a class="btn btn-sm" style="background:inherit" title="Send SMS"  href="/send-medicine-sms/' +
                            data.id +
                            '" type="submit"><i class="fas fa-sms text-primary"></i></a>  </td>'
                        );
                    }
                });
            }
        });
    });

    $('.activeMedicineButton').click(function() {
        var clickedButton = $(this);
        var id = clickedButton.closest('tr').find('.cancel_medicine_id').val();
        var patient_id = $("#patient_id").val();
        var message = "Are you sure you want to active this medicine?";
        var confirmMessage = "Yes, Active it!";
        showConfirmationDialog(message, confirmMessage, () => {
            clickedButton.toggleClass('rotate');
            $.ajax({
                url: '{{ route('active-medicine') }}',
                type: 'GET',
                data: {
                    id
                },
                success: function(data) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Medicine Activated successfully.',
                    });
                    clickedButton.closest('tr').fadeOut();
                    var medicine_row = `
                        <tr>
                            <td colspan="2">
                                <p>
                                    ${data.medicine}
                                </p>
                                <p>
                                    ${data.dose}
                                </p>
                                <p>
                                    ${data.duration}
                                </p>
                            </td>
                            <td>
                                ${data.created_at}
                            </td>
                            <td>
                                <button class="btn btn-sm" style="background:inherit" title="Edit" style="margin:2px;" onclick="editMedicineView(${data.id})" type="submit"><i class="fas fa-edit text-success"></i></button>
                                <br>
                                <button class="btn btn-sm" style="background:inherit" title="Cancel" style="margin:2px;" onclick="cancelMedicine(${data.id})" type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
                                <br>
                                <a class="btn btn-sm" style="background:inherit" title="Send SMS"  href="/send-medicine-sms/${data.id}" type="submit"><i class="fas fa-sms text-primary"></i></a>
                            </td>    
                        </tr>
                    `;
                    $('#medicineTable').append(medicine_row);
                }
            });
        })
    });

    $('.cancelMedicineButton').click(function() {
        var clickedButton = $(this);
        var id = clickedButton.closest('tr').find('.medicine_id').val();
        var patient_id = $("#patient_id").val();
        var message = "Are you sure you want to cancel this medicine?";
        var confirmMessage = "Yes, Cancel it!";
        showConfirmationDialog(message, confirmMessage, () => {
            clickedButton.html('<i class="fas fa-spinner fa-spin text-danger"></i>')
            $.ajax({
                url: '{{ route('cancel-medicine') }}',
                type: 'GET',
                data: {
                    id
                },
                success: function(data) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Medicine Cancelled successfully.',
                    });
                    clickedButton.closest('tr').fadeOut();
                    var medicine_row = `
                    <tr>
                        <td>
                            <p>
                                ${data.medicine}
                            </p>
                            <p>
                                ${data.dose}
                            </p>
                            <p>
                                ${data.duration}
                            </p>
                        </td>
                        <td>
                            ${data.created_at}
                        </td>
                        <td>
                            <button class="btn btn-sm" style="background:inherit" title="Edit" style="margin:2px;" onclick="editMedicineView(${data.id})" type="submit"><i class="fas fa-edit text-success"></i></button>
                            <button class="btn btn-sm" style="background:inherit" title="Cancel" style="margin:2px;" onclick="cancelMedicine(${data.id})" type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
                        </td>
                    </tr>
                    `
                    $('#Canceltable').append(medicine_row);
                }
            })
        })

    })

    $('.deleteMedicineButton').on('click', function() {
        var clickedButton = $(this);
        var id = clickedButton.closest('tr').find('.cancel_medicine_id').val();
        var patient_id = $("#patient_id").val();
        var message = "Are you sure you want to delete this medicine?";
        var confirmMessage = "Yes, Delete it!";
        var url = '{{ route('prescription.destroy', ':id') }}';
        url = url.replace(':id', id);
        showConfirmationDialog(message, confirmMessage, () => {
            clickedButton.html('<i class="fas fa-spinner fa-spin text-danger"></i>')
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ @csrf_token() }}'
                },
                success: function(data) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Medicine deleted successfully.',
                    });
                    clickedButton.closest('tr').fadeOut();
                }
            });
        })

    });

    function generatePrescription() {
        var patient_id = $("#patient_id").val();
        $.get('/generate-prescription', {
            patient_id: patient_id
        }, function(data) {
            if (data) {
                Toast.fire({
                    icon: 'success',
                    title: data,
                })
            }
        })
    }

    $('#FollowUpList').on('click', function() {
        loaderShow()
        var patient_id = $("#patient_id").val();
        let url = '{{ route('patient-wise-follow-up', ':patient_id') }}';
        url = url.replace(':patient_id', patient_id);
        $.get(url, function(data) {
            $('#edit_modal_body').html(data);
            $('#followUpListModal').modal('show');
            loaderHide()
        });
    })

    $(document).on('click', '.deleteFollowUpButton', function() {
        var clickedButton = $(this);
        var id = clickedButton.closest('tr').find('.follow_up_id').val();
        var message = "Are you sure you want to delete this follow up?";
        var confirmMessage = "Yes, Delete it!";
        var url = '{{ route('patient-follow-up.destroy', ':id') }}';
        url = url.replace(':id', id);
        console.log(url)
        showConfirmationDialog(message, confirmMessage, () => {
            clickedButton.html('<i class="fas fa-spinner fa-spin text-danger"></i>')
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ @csrf_token() }}'
                },
                success: function(data) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Follow up deleted successfully.',
                    });
                    clickedButton.closest('tr').fadeOut();

                }
            });
        })
    });

    $('#showGraph').change(function() {
        if (this.checked) {
            $('#graph').show();
        } else {
            $('#graph').hide();
        }
    });
    $(document).ready(function() {

    });
    $('#check_response').change(function() {
        // this will contain a reference to the checkbox
        if (this.checked) {
            $('#other_response').show();
        } else {
            $('#other_response').hide();
        }
    });
    $('#check_reason').change(function() {
        // this will contain a reference to the checkbox
        if (this.checked) {
            $('#other_reason').show();
        } else {
            $('#other_reason').hide();
        }
    });
    $(document).ready(function() {
        $('#graph').hide();
        $('#other_reason').hide();
        $('#other_response').hide();
        var patient_id = $('#patient_id').val();
        $.get('{{ route('get-investigation') }}', {
            patient_id: patient_id
        }, function(res) {
            bp_high_date = []
            bp_high = []
            bp_min_date = []
            bp_min = []
            pulse_date = []
            pulse = []
            saturation_date = []
            saturation = []
            temparature_date = []
            temparature = []
            sugar_date = []
            sugar = []
            $.each(res.bp_high, function(key, v) {
                bp_high.push(Number(v.bp_high));
                bp_high_date.push(v.created_at);
            })
            $.each(res.bp_min, function(key, v) {
                bp_min.push(Number(v.bp_min));
                bp_min_date.push(v.created_at);
            })
            $.each(res.pulse, function(key, v) {
                pulse.push(Number(v.pulse));
                pulse_date.push(v.created_at);
            })
            $.each(res.saturation, function(key, v) {
                saturation.push(Number(v.saturation));
                saturation_date.push(v.created_at);
            })
            $.each(res.temparature, function(key, v) {
                temparature.push(Number(v.temp));
                temparature_date.push(v.created_at);
            })
            $.each(res.sugar, function(key, v) {
                sugar.push(Number(v.sugar));
                sugar_date.push(v.created_at);
            })
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'blood-chart',
                    marginBottom: 80
                },
                title: {
                    text: 'Blood Pressure'
                },
                xAxis: {
                    categories: bp_high_date,
                    labels: {
                        rotation: 0
                    }
                },
                series: [{
                        name: 'Blood High',
                        data: bp_high
                    },
                    {
                        name: 'Blood Low',
                        data: bp_min,
                        color: 'red'
                    }
                ]
            });
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'pulse-chart',
                    marginBottom: 80
                },
                title: {
                    text: 'Pulse'
                },
                xAxis: {
                    categories: bp_min_date,
                    labels: {
                        rotation: 0
                    }
                },
                series: [{
                    name: 'Pulse',
                    data: pulse,
                    color: 'limegreen'
                }]
            });
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'oxygen-chart',
                    marginBottom: 80
                },
                title: {
                    text: 'O2'
                },
                xAxis: {
                    categories: saturation_date,
                    labels: {
                        rotation: 0
                    }
                },
                series: [{
                    name: 'Oxygen',
                    data: saturation,
                    color: 'greenyellow'
                }]
            });
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'temparature-chart',
                    marginBottom: 80
                },
                title: {
                    text: 'Temparature'
                },
                xAxis: {
                    categories: temparature_date,
                    labels: {
                        rotation: 0
                    }
                },
                series: [{
                    name: 'Temparature',
                    data: temparature,
                    color: 'lime'
                }]
            });
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'blood-sugar',
                    marginBottom: 80
                },
                title: {
                    text: 'Blood Sugar'
                },
                xAxis: {
                    categories: sugar_date,
                    labels: {
                        rotation: 0
                    }
                },
                series: [{
                    name: 'Blood Sugar',
                    data: sugar,
                    color: 'red'
                }]
            });
        })
    })
</script>
