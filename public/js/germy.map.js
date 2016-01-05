$(function() {
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