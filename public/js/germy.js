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
                console.log(index);
                bought = [];
                $.each($('.bought-items .item'), function() {
                    bought.push($(this).attr('index'));
                });
                console.log(bought);
                if ($.inArray(index, bought) != -1) {
                    node = $('.bought-items .item[index=' + index + ']');
                    node.find('.number').text(now_num);
                    node.find('.price').text(parseFloat(product.find('.price').text()) * now_num);
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
            $('.bought-items .total-price').find('.total').text(total);
        }
        $('#product-list').on('click', '.add', function() {
            handle($(this), 'add');
        });
        $('#product-list').on('click', '.minus', function() {
            handle($(this), 'minus');
        });
    }
});