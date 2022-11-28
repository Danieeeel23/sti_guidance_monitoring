$(document).on('click', '.emp_checkbox', function() {		
    if ($('.emp_checkbox:checked').length == $('.emp_checkbox').length) {
        $('#select_all').prop('checked', true);
    } else {
        $('#select_all').prop('checked', false);
    }
    $("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
});

