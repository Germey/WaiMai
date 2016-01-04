<link href="/css/bootstrap-editable.css" rel="stylesheet">
<script src="/js/bootstrap-editable.js"></script>
<script>
    $.fn.editable.defaults.mode = 'popup';
    $.fn.editable.defaults.params = function(params) {
        params._token = '{{ csrf_token() }}';
        return params;
    }
    $.fn.editable.defaults.error = function(response) {
        if (response.status > 500) {
            return '服务器错误';
        } else if (response.status > 404) {
            return '修改失败';
        }
    }
    $(function() {
        $('.order-delivery').editable({
            source: '{!! $delivery_status !!}',
        });
    });
</script>