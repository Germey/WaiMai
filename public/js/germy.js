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
    }
    if ($('#map').length > 0) {
        var map = new BMap.Map("map");
        point = new BMap.Point(116.404, 39.915);
        var lng, lat;
        var province, city, district, street;
        map.centerAndZoom(point, 12);
        var getlocation = new BMap.Geolocation();
        getlocation.getCurrentPosition(function(e) {
            if (this.getStatus() == BMAP_STATUS_SUCCESS) {
                lng = e.point.lng;
                lat = e.point.lat;
                var marker = new BMap.Marker(e.point);
                map.addOverlay(marker);
                map.panTo(e.point);
                marker.enableDragging();
                var geo = new BMap.Geocoder();
                geo.getLocation(e.point, function(rs) {
                    var addComp = rs.addressComponents;
                    province = addComp.province;
                    city = addComp.city;
                    district = addComp.district;
                    street = addComp.street;
                    updateLocationInfo();
                });
                marker.addEventListener("dragend", function(e) {
                    lng = e.point.lng;
                    lat = e.point.lat;
                    geo.getLocation(e.point, function(rs) {
                        var addComp = rs.addressComponents;
                        province = addComp.province;
                        city = addComp.city;
                        district = addComp.district;
                        street = addComp.street;
                        updateLocationInfo();
                    });
                });
            }
            else {
                alert('定位失败，请重试' + this.getStatus());
            }
        }, {enableHighAccuracy: true})
        var address = '';
        var top_left_control = new BMap.ScaleControl({anchor: BMAP_ANCHOR_TOP_LEFT});// 左上角，添加比例尺
        // 添加带有定位的导航控件
        var navigationControl = new BMap.NavigationControl({
            // 靠左上角位置
            anchor: BMAP_ANCHOR_TOP_LEFT,
            // LARGE类型
            type: BMAP_NAVIGATION_CONTROL_LARGE,
            // 启用显示定位
            enableGeolocation: true
        });
        map.addControl(navigationControl);
        map.addControl(top_left_control);


        function updateLocationInfo() {
            $('#location-info').html('');
            $('<input>').attr({
                'type': 'hidden',
                'value': lng,
                'name': 'lng',
            }).appendTo($('#location-info'));
            $('<input>').attr({
                'type': 'hidden',
                'value': lat,
                'name': 'lat',
            }).appendTo($('#location-info'));
            $('input[name="location"]').val(province+city+district+street);
        }

    }
});