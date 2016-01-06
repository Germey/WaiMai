$(function() {
    if ($('#product-img').length > 0) {
        $('#product-img').fileUpload();
    }
    if ($('.only-numeric').length > 0) {
        $.each($('.only-numeric'), function() {
            $(this).onlyNumeric();
        });
    }
    if ($('.btn-group').length > 0) {
        $('.btn-group .value').radio();
    }

    if ($('.timepick').length > 0) {
        $('.timepick').timepick();
    }

    if ($('#sidebar .submenu li.active').length > 0) {
        $('#sidebar .submenu li.active').parents('.submenu').addClass('open');
    }

});