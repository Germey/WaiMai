<link rel="stylesheet" type="text/css" href="{{ asset('css/uploadify.css') }}">
<script src="{{ asset('js/jquery.uploadify.min.js') }}"></script>
<script>
    jQuery.fn.fileUpload = function() {
        function addDel(img, hidden) {
            if ($('.del-upload')) {
                $('.del-upload').remove();
            }
            del = $('<div></div>').addClass('btn btn-danger del-upload').text('删除');
            del.insertAfter(img);
            del.on('click', function() {
                img.attr('src', '');
                hidden.val('');
                $(this).remove();
            });
        }
        ele = $(this);
        img = ele.siblings('img');
        hidden = ele.siblings('input[type="hidden"]');
        if (hidden.val()) {
            img.attr('src', hidden.val());
            addDel(img, hidden);
        }
        setTimeout(function() {
            ele.uploadify({
                'formData': {
                    '_token': '{{ csrf_token() }}'
                },
                'buttonClass': 'btn btn-primary btn-upload',
                'fileTypeDesc': 'Image Files',
                'fileTypeExts': '*.gif; *.jpg; *.png',
                'buttonText': '上传图片',
                'fileSizeLimit': '2MB',
                'swf': '{{ asset('swf/uploadify.swf') }}',
                'uploader': '/ajaxUploadInfoImg',
                'onUploadSuccess': function(data, response) {
                    response = JSON.parse(response);
                    status = response.status;
                    switch (status) {
                        case '404':
                            alert('没有图片可以上传');
                            break;
                        case '403':
                            alert('格式不允许');
                            break;
                        case '500':
                            alert('文件错误，无法上传');
                            break;
                        case '200':
                            img.attr('src', response.path);
                            hidden.val(response.path);
                            addDel(img, hidden);
                            break;
                    }
                }
            });
        }, 0);
    }
</script>