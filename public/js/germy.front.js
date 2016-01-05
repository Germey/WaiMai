$(function() {
    if ($('#product-list').length > 0) {
        function handle(ele, mode) {
            if (mode == 'add') {
                sign = 1;
            } else if (mode == 'minus') {
                sign = -1;
            }
            product = ele.parents('.product-item');
            now_num = parseInt(product.find('.choose-num').text()) + sign * 1;
            index = product.attr('index');
            if (now_num > 0) {
                product.find('.choose-num').text(now_num);
                bought = [];
                $.each($('.bought-items .item'), function() {
                    bought.push($(this).attr('index'));
                });
                if ($.inArray(index, bought) != -1) {
                    node = $('.bought-items .item[index=' + index + ']');
                    node.find('.number').text(now_num);
                    price = (parseFloat(product.find('.price').text()) * now_num).toFixed(price_format);
                    node.find('.price').text(price);
                } else {
                    node = $('#template').clone().removeAttr('id').removeClass('hidden');
                    node.find('.name').text(product.find('.name').text());
                    node.find('.price').text(product.find('.price').text());
                    node.find('.unit').text(product.find('.unit').text());
                    node.find('.number').text(1);
                    node.attr('index', index);
                    node.prependTo($('.bought-items'));
                }
            } else if (now_num == 0) {
                node = $('.bought-items .item[index=' + index + ']');
                product.find('.choose-num').text(now_num);
                node.remove();
            }
            total = 0;
            $.each($('.bought-items .item'), function() {
                total += parseFloat($(this).find('.price').text());
            });
            $('.bought-items .total-price').find('.total').text(total.toFixed(price_format));
        }

        $('#product-list').on('click', '.add', function() {
            handle($(this), 'add');
        });
        $('#product-list').on('click', '.minus', function() {
            handle($(this), 'minus');
        });

        $('.bought-items').on('click', '.submit', function() {
            $('#order-info').html('');
            $.each($('.bought-items .item'), function(index) {
                $('<input>').attr({
                    'type': 'hidden',
                    'name': 'order[' + index + '][index]',
                    'value': $(this).attr('index'),
                }).appendTo('#order-info');
                $('<input>').attr({
                    'type': 'hidden',
                    'name': 'order[' + index + '][number]',
                    'value': $(this).find('.number').text(),
                }).appendTo('#order-info');
                if (index == $('.bought-items .item').length - 1) {
                    $('#order-form').submit();
                }
            });
        });
    }
    if ($('#order-preview').length > 0) {
        $('#order-preview').on('click', '.ui-icon-close', function() {
            $(this).siblings('input').val('');
        });
        $('#order-preview').on('click', '#submit', function() {
            $('#order-submit-form').judgeInfo({
                'name': ['required'],
                'location': ['required'],
                'street_number': ['required'],
                'phone': ['phone'],
            }, {
                'name': '您的姓名',
                'phone': '手机号',
                'location': '地址',
                'street_nubmer': '门牌号',
            }, function() {
                $('#order-submit-form').submit();
                //console.log('no_error');
            });
        });
    }

});