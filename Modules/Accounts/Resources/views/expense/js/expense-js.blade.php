<script>
    // Create a template for the row without Select2 initialization
    let income_heads = '';
    const rowTemplate = $('#expenseTable tbody').find('tr:first').clone();
    rowTemplate.find('input').val('');
    rowTemplate.find('.amount').val('');

    $(document).on('click', '#addRow', function() {
        let row = rowTemplate.clone();
        row.find('.income_head_id').html(income_heads);
        row.find('.description').val('');
        row.find('.amount').val('');
        $('#expenseTable tbody').append(row);
        $('.select2').select2();
    });





    $(document).on('click', '.removeRow', function() {
        $(this).closest('tr').remove();
    });

    $(document).on('change', '#project_id', function() {
        console.log('project_id');
        let options = '<option value="">Select Expense Head</option>';
        $.get('{{ route('get-expense-head') }}', {
            project_id: $(this).val()
        }, function(data) {
            data.forEach(function(item) {
                options += '<option value="' + item.id + '">' + item.name + '</option>';
            });
            console.log(options);
            $('.expense_head_id').html(options);
            income_heads = options;
        })
    })

    $(document).on('change', '.expense_head_id', function() {
        this_event = $(this);
        let options = '<option value="">Select Sub category</option>';
        $.get('{{ route('get-expense-sub-category') }}', {
            expense_head_id: $(this).val()
        }, function(data) {
            data.forEach(function(item) {
                options += '<option value="' + item.id + '" data-vat="' + item.vat +
                    '" data-price="' + item.price + '">' + item.name +
                    '</option>';
            });
            this_event.closest('tr').find('.expense_sub_category_id').html(options);
        })
    })

    function calculateTotal() {
        let total = 0;
        $('.amount').each(function() {
            total += $(this).val() ? parseFloat($(this).val()) : 0;
        })
        $('#total').val(total);
    }

    $(document).on('change', '#type', function() {
        if ($(this).val() == 'Conveyance') {
            $('.from_address_heading').removeClass('d-none');
            $('.to_address_heading').removeClass('d-none');
            $('.used_transport_heading').removeClass('d-none');
            $('.from_address_td').removeClass('d-none');
            $('.to_address_td').removeClass('d-none');
            $('.used_transport_td').removeClass('d-none');
            $('#total_td').attr('colspan', 5)
            $('#total_amount_td').attr('colspan', 2)
        } else {
            $('.from_address_heading').addClass('d-none');
            $('.to_address_heading').addClass('d-none');
            $('.used_transport_heading').addClass('d-none');
            $('.from_address_td').addClass('d-none');
            $('.to_address_td').addClass('d-none');
            $('.used_transport_td').addClass('d-none');
            $('#total_td').attr('colspan', 3)
            $('#total_amount_td').attr('colspan', 1)
        }
    })
</script>
