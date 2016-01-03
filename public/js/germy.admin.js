$(function() {
    if ($('#product-img').length > 0) {
        $('#product-img').fileUpload();
    }
    if ($('.only-numeric').length > 0) {
        $.each($('.only-numeric'), function() {
           $(this).onlyNumeric();
        });
    }
});