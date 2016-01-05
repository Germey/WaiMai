<script src="/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css"/>
<script>
    jQuery.fn.timepick = function() {
        var ele = $(this);
        ele.datetimepicker({
            pickDate: false
        });
        ele.on('click', '.add-on', function() {
            console.log('dsfsd');
        });
        ele.find('.add-on').on('click', function() {
            var top = $(this).offset().top;
            $('.bootstrap-datetimepicker-widget')
                    .css('top', top + 35 + 'px')
                    .find('.btn').addClass('btn-info');
        });
    }
</script>