<script>
    function get_employee() {
        var employee_id = $('#employee_id').val();
        var month = $('#month').val();
        var year = $('#year').val();
        console.log(employee_id, month, year)

        $.get('{{ route('get-employee-info') }}', {
            employee_id: employee_id,
            month: month,
            year: year
        }, function(data) {
            $('#monthly_rate').val(data.staff.monthly_salary);
            $('#hours_rate').val(data.staff.hourly_salary);
            $('#food_rate').val(data.staff.food);
            $('#oncall_onduty_rate').val(data.staff.oncall_onduty);
            $('#oncall_offduty_rate').val(data.staff.oncall_offduty);
            $('#conveyance_rate').val(data.staff.conveyance);
            $('#increment_rate').val(data.staff.increment);
            $('#bonus_rate').val(data.staff.bonus);
            $('#provident_fund_rate').val(data.staff.provident_fund);;
            $('#pay_leave_rate').val(data.staff.pay_leave);
            $('#pay_leave').val(data.pay_leave);
            $('#total_pay_leave_amount').val(data.salary_pay_leave);
            $('#sick_leave_rate').val(data.staff.sick_leave);
            $('#sick_leave').val(data.sick_leave);
            $('#total_sick_leave_amount').val(data.salary_sick_leave);
            $('#casual_leave_rate').val(data.staff.casual_leave);
            $('#casual_leave').val(data.casual_leave);
            $('#total_casual_leave_amount').val(data.salary_casual_leave);
            $('#educational_leave_rate').val(data.staff.educational_leave);
            $('#educational_leave').val(data.educational_leave);
            $('#total_educational_leave_amount').val(data.salary_education_leave);

            $('#roster_rate').val(data.staff.roster);
            $('#night_rate').val(data.staff.night);
            $('#emergency_leave_rate').val(data.staff.emergency_leave);
            $('#emergency_leave').val(data.emergency_leave);
            $('#total_emergency_leave_amount').val(data.salary_emergency_leave);
            $('#deduction_rate').val(data.staff.deduction);
            if (data.salary_education_leave || data.salary_pay_leave || data.salary_emergency_leave || data
                .salary_sick_leave || data.salary_casual_leave) {
                $('#deduction').val(data.salary_education_leave + data.salary_pay_leave + data
                    .salary_emergency_leave + data.salary_sick_leave + data.salary_casual_leave);
                var total_deducation = data.salary_education_leave + data.salary_pay_leave + data
                    .salary_emergency_leave + data.salary_sick_leave + data.salary_casual_leave;
                $('#total_deduction_amount').val(total_deducation * $('#deduction_rate').val());
            }
            $('#total_salary').val();
        })
        $.get('{{ route('get-roster-count') }}', {
            employee_id: employee_id,
            month: month,
            year: year
        }, function(data) {
            console.dir(data)
            $('#roster').val(data.total_roster)
            $('#night').val(data.night)
            $('#oncall_onduty').val(data.on_duty)
            $('#oncall_offduty').val(data.off_duty)
            $('#total_night_amount').val($('#night_rate').val() * $('#night').val())
            $('#total_roster_amount').val($('#roster_rate').val() * $('#roster').val());
            $('#total_oncall_onduty_amount').val($('#oncall_onduty_rate').val() * $('#oncall_onduty').val());
            $('#total_oncall_offduty_amount').val($('#oncall_offduty_rate').val() * $('#oncall_offduty').val());
        })
    }

    $(document).on('input', '#total_hours', function() {
        $('#total_hours_amount').val($('#hours_rate').val() * $('#total_hours').val());
    });

    $(document).on('input', '#total_month', function() {
        $('#total_month_amount').val($('#monthly_rate').val() * $('#total_month').val());
    });

    $(document).on('input', '#food', function() {
        $('#total_food_amount').val($('#food_rate').val() * $('#food').val());
    });

    $(document).on('input', '#oncall_onduty', function() {
        $('#total_oncall_onduty_amount').val($('#oncall_onduty_rate').val() * $('#oncall_onduty').val());
    });

    $(document).on('input', '#oncall_offduty', function() {
        $('#total_oncall_offduty_amount').val($('#oncall_offduty_rate').val() * $('#oncall_offduty').val());
    });

    $(document).on('input', '#conveyance', function() {
        $('#total_conveyance_amount').val($('#conveyance_rate').val() * $('#conveyance').val());
    });

    $(document).on('input', '#increment', function() {
        $('#total_increment_amount').val($('#increment_rate').val() * $('#increment').val());
    });

    $(document).on('input', '#total_pay_leave_amount', function() {
        deduction();
    });

    $(document).on('input', '#total_sick_leave_amount', function() {
        deduction();
    });

    $(document).on('input', '#total_casual_leave_amount', function() {
        deduction();
    });

    $(document).on('input', '#total_educational_leave_amount', function() {
        deduction();
    });

    $(document).on('input', '#total_emergency_leave_amount', function() {
        deduction();
    });


    $(document).on('input', '#bonus', function() {
        $('#total_bonus_amount').val($('#bonus').val() * $('#bonus_rate').val());
    });

    $(document).on('input', '#provident_fund', function() {
        $('#total_provident_fund_amount').val($('#provident_fund').val() * $('#provident_fund_rate').val());
    });

    $(document).on('input', '#extra_payment', function() {
        $('#total_extra_payment_amount').val($('#extra_payment').val() * $('#extra_payment_rate').val());
    });

    $(document).on('input', '#roster', function() {
        $('#total_roster_amount').val($('#roster_rate').val() * $('#roster').val());
    });

    $(document).on('input', '#night', function() {
        $('#total_night_amount').val($('#night_rate').val() * $('#night').val());
    });
    $(document).on('input', '#deduction', function() {
        $('#total_deduction_amount').val($('#deduction_rate').val() * $('#deduction').val());
    });

    function deduction() {
        var pay_leave = Number($('#total_pay_leave_amount').val());
        var casual_leave = Number($('#total_casual_leave_amount').val());
        var sick_leave = Number($('#total_sick_leave_amount').val());
        var emergency_leave = Number($('#total_emergency_leave_amount').val());
        var educational_leave = Number($('#total_educational_leave_amount').val());
        var total_deducation = pay_leave + casual_leave + sick_leave + emergency_leave + educational_leave;
        $('#total_deduction_amount').val(total_deducation * $('#deduction_rate').val());
    }

    function add_total_salary() {
        var months = Number($('#total_month_amount').val());
        var hours = Number($('#total_hours_amount').val());
        var food = Number($('#total_food_amount').val());
        var oncall_onduty = Number($('#total_oncall_onduty_amount').val());
        var oncall_offduty = Number($('#total_oncall_offduty_amount').val());
        var conveyance = Number($('#total_conveyance_amount').val());
        var increment = Number($('#total_increment_amount').val());
        var pay_leave = Number($('#total_pay_leave_amount').val());
        var casual_leave = Number($('#total_casual_leave_amount').val());
        var educational_leave = Number($('#total_educational_leave_amount').val());
        var emergency_leave = Number($('#total_emergency_leave_amount').val());
        var bonus = Number($('#total_bonus_amount').val());
        var provident_fund = Number($('#total_provident_fund_amount').val());
        var extra_payment = Number($('#total_extra_payment_amount').val());
        var sick_leave = Number($('#total_sick_leave_amount').val());
        var roster = Number($('#total_roster_amount').val());
        var night = Number($('#total_night_amount').val());
        var deduction = Number($('#total_deduction_amount').val());
        $('#total_salary').val(months + hours + food + oncall_onduty + oncall_offduty + conveyance + increment + bonus +
            extra_payment + roster + night - deduction - provident_fund);
    }
</script>
