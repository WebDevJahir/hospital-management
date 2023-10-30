<script>
    $(document).on('click', '#addMedicine', function() {
        let medicine = $('#medicine').val();
        let note = $('#note').val();
        let dose = $('#dose').val();
        let duration = $('#duration').val();
        let row = `<tr>
                        <td colspan="2"><input type="text" name="medicine[]" value="${medicine}" class="form-control" readonly></td>
                        <td><input type="text" name="note[]" value="${note}" class="form-control" readonly></td>
                        <td><input type="text" name="dose[]" value="${dose}" class="form-control" readonly></td>
                        <td><input type="text" name="duration[]" value="${duration}" class="form-control" readonly></td>
                        <td>
                            <button type="button" class="btn btn-outline-danger btn-sm removeMedicine"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>`;
        $('#medicineTable').append(row);
    })

    $(document).on('click', '.removeMedicine', function() {
        $(this).closest('tr').remove();
        var deleted_prescription_id = $('#deleted_prescription_id').val();
        if (deleted_prescription_id == '') {
            $('#deleted_prescription_id').val($(this).closest('tr').find('input[name="opd_prescription_id[]"]')
                .val() + ',');
        } else {
            $('#deleted_prescription_id').val(deleted_prescription_id + $(this).closest('tr').find(
                'input[name="opd_prescription_id[]"]').val() + ',');
        }
    }
    })

    $(document).on('click', '#addAdvice', function() {
        let container = $(this).closest('.form-group'); // Find the closest container
        let clonedRow = container.clone(); // Clone the entire container
        clonedRow.find('#addAdvice').replaceWith(
            '<button type="button" class="btn btn-outline-danger btn-sm removeAdvice"><i class="fas fa-trash"></i></button>'
        );
        container.after(clonedRow);
        container.find('.advice').val('').trigger('change');
    });

    $(document).on('click', '.removeAdvice', function() {
        $(this).closest('.form-group').remove();
    });
</script>
