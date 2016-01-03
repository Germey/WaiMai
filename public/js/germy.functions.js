jQuery.fn.onlyNumeric = function() {
    var ele = $(this);
    ele.keypress(function(event) {
        var keyCode = event.which;
        if (keyCode == 46 || (keyCode >= 48 && keyCode <= 57) || keyCode == 8)//8是删除键
            return true;
        else
            return false;
    }).focus(function() {
       ele.css('ime-mode', 'disabled');
    });
}