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
        $('.btn-group').on('click', function() {
            if ($('.btn-group').hasClass('warning')) {
                var result = confirm('确定要执行该操作吗？');
                if (result) {
                    $('.btn-group .value').radio();
                }
            } else {
                $('.btn-group .value').radio();
            }
        });
        $('.btn-group .value').radio();
    }
});