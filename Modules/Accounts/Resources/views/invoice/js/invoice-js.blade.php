<script>
    // Create a template for the row without Select2 initialization
    let income_heads = '';
    const rowTemplate = $('#invoiceTable tbody').find('tr:first').clone();
    rowTemplate.find('input').val('');
    rowTemplate.find('.vat-icon').html('');
    rowTemplate.find('.amount').val(0);

    $(document).on('click', '#addRow', function() {
        let row = rowTemplate.clone();
        row.find('.income_head_id').html(income_heads);
        row.find('.quantity').val(1);
        $('#invoiceTable tbody').append(row);
        $('.select2').select2();
    });





    $(document).on('click', '.removeRow', function() {
        $(this).closest('tr').remove();
    });

    $(document).on('change', '#project_id', function() {
        console.log('project_id');
        let options = '<option value="">Select Income Head</option>';
        $.get('{{ route('get-income-head') }}', {
            project_id: $(this).val()
        }, function(data) {
            data.forEach(function(item) {
                options += '<option value="' + item.id + '">' + item.name + '</option>';
            });
            $('.income_head_id').html(options);
            income_heads = options;
        })
    })

    $(document).on('change', '.income_head_id', function() {
        this_event = $(this);
        let options = '<option value="">Select Subcategory</option>';
        $.get('{{ route('get-income-subcategory') }}', {
            income_head_id: $(this).val()
        }, function(data) {
            data.forEach(function(item) {
                options += '<option value="' + item.id + '" data-vat="' + item.vat +
                    '" data-price="' + item.price + '">' + item.name +
                    '</option>';
            });
            this_event.closest('tr').find('.income_subcategory_id').html(options);
        })
    })

    $(document).on('change', '.income_subcategory_id', function() {
        let this_event = $(this);
        let vat = this_event.find(':selected').data('vat');
        let price = this_event.find(':selected').data('price');
        let quantity = this_event.closest('tr').find('.quantity').val();
        console.log(vat, price, quantity);
        // if (vat == 1) {
        //     this_event.closest('tr').find('.vat-icon').html(
        //         '<i class="fas fa-check-square" style="color:green; font-size:20px"></i>');
        // } else {
        //     this_event.closest('tr').find('.vat-icon').html(
        //         '<i class="fas fa-times-circle" style="color:red; font-size:20px"></i>');
        // }
        this_event.closest('tr').find('.unit_price').val(price);
        let total = quantity * price;
        this_event.closest('tr').find('.amount').val(total);
        calculateTotal();
    })

    $(document).on('input', '.unit_price, .quantity', function() {
        console.log('input')
        let this_event = $(this);
        let quantity = this_event.closest('tr').find('.quantity').val();
        let price = this_event.closest('tr').find('.unit_price').val();
        let total = quantity * price;
        this_event.closest('tr').find('.amount').val(total);
    })

    function calculateTotal() {
        let total = 0;
        $('.amount').each(function() {
            total += parseInt($(this).val());
        })
        $('#sub_total').val(total);
        let discount = $('#discount_amount').val() != '' ? $('#discount_amount').val() : '0'
        let vat = $('#vat_amount').val() != '' ? $('#vat_amount').val() : '0'
        let delivery_charge = $('#delivery_charge').val() != '' ? $('#delivery_charge').val() : '0'
        let service_charge = $('#service_charge').val() != '' ? $('#service_charge').val() : '0'
        let collection_charge = $('#collection_charge').val() != '' ? $('#collection_charge').val() : '0'
        console.log(total, discount, vat, delivery_charge, service_charge, collection_charge)
        let grand_total = parseFloat(total) - parseFloat(discount) + parseFloat(vat) + parseFloat(
            delivery_charge) + parseFloat(service_charge) + parseFloat(collection_charge);
        $('#total').val(grand_total);
        let advance = $('#advance').val() != '' ? $('#advance').val() : '0'
        let due = parseFloat(grand_total) - parseFloat(advance);
        $('#due').val(due);
    }

    $(document).on('input',
        '#discount_amount, #vat_amount, #delivery_charge, #service_charge, #collection_charge, #advance, #due',
        function() {
            calculateTotal();
        })

    $('#discount').on('input', function() {
        let discount = $(this).val();
        let sub_total = $('#sub_total').val();
        let discount_type = $('#discount_type').val();
        if (discount_type == '%') {
            let discount_amount = (parseFloat(sub_total) * parseFloat(discount)) / 100;
            $('#discount_amount').val(discount_amount);
        } else {
            $('#discount_amount').val(discount);
        }
        calculateTotal();
    })

    $('#vat').on('input', function() {
        let vat = $(this).val();
        let sub_total = $('#sub_total').val();
        let vat_type = $('#vat_type').val();
        if (vat_type == '%') {
            let vat_amount = (parseFloat(sub_total) * parseFloat(vat)) / 100;
            $('#vat_amount').val(vat_amount);
        } else {
            $('#vat_amount').val(vat);
        }
        calculateTotal();
    })
</script>
