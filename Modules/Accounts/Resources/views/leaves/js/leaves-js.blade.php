<script>
    function getTotalDays() {
        var from = moment($('#from_date').val());
        var to = moment($('#to_date').val());
        if (Date.parse($('#from_date').val()) == Date.parse($('#to_date').val())) {
            $('#total_day_in').val('1')
        } else if ($('#from_date').val() && $('#to_date').val()) {
            $('#total_day_in').val(to.diff(from, 'days'))
        }
    }

    function ApproveAlert(id) {
        Swal.fire({
            title: 'Are you sure approve?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.get('{{ url('approve-leave') }}', {
                    id: id
                }, function(data) {
                    if (data == 'success') {
                        $('#status' + id).text('Approved')
                        Swal.fire(
                            'Approved!',
                            'Leave has been Approved.',
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Sorry!',
                            'Leave already Approved.',
                            'error'
                        )
                    }

                })
            }
        })
    }

    function checkLeave() {
        var leave_type = $('#leave_type').val();
        var employee_id = $('#employee_id').val();
        $.get('{{ route('get-leave') }}', {
            leave_type: leave_type,
            employee_id: employee_id
        }, function(data) {
            $('#total_leave').val(data);
            $.get('{{ route('get-used-leave') }}', {
                leave_type: leave_type,
                employee_id: employee_id
            }, function(data) {
                var total_leave = $('#total_leave').val();
                $('#used_leave').val(data);
                $('#rest_leave').val(total_leave - data);
            })
        })
    }


    $('#addLeave').on('click', function(e) {
        e.preventDefault();
        var total_leave = $('#total_leave').val();
        var used_leave = $('#used_leave').val();
        if (total_leave < used_leave) {
            Swal.fire({
                title: 'Leave type already taken',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, ok it!'
            }).then(function(result) {
                if (result.value === true) {
                    $('#leaveForm').submit();
                }
            });
        }
    })
</script>
