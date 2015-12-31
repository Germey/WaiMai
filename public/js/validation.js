/* check libs */
function checkPhone(value) {
    if ((value.length != 11) || (!value.match(/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|17[0|6|7|8]|18[0-9])\d{8}$/))) {
        return false;
    }
    return true;
}
function checkRequired(value) {
    if (!value.length > 0) {
        return false;
    }
    return true;
}
var showed = 0;
var error_exits = 0;
var i = 0;
/* show alert function */
function showAlert(message) {
    alert(message);
}
/* how to deal with the message */
function dealAlert(message) {
    if (!showed) {
        showAlert(message);
        showed = 1;
        error_exits = 1;
    }
}
/* alert messages */
msg = {
    'phone': '不符合要求',
    'required': '请填写',
};
/* alias configure */
alias_default = {
    'name': '姓名',
    'phone': '手机号',
    'location': '地址',
    'email': '邮箱',
    'street': '街道',
    'street_number': '门牌号',
};
/* init variable */
function initial() {
    showed = 0;
    i = 0;
    error_exits = 0;
}
jQuery.fn.judgeInfo = function(data, alias, func) {
    ele = $(this);
    initial();
    data_length = Object.keys(data).length;
    $.each(data, function(key, items) {
        input = ele.find('input[name=' + key + ']');
        i++;
        if (input.length > 0) {
            val = input.val();
            var alia = alias[key];
            if (!alia) {
                alia = alias_default[key];
            }
            $.each(items, function(index, item) {
                switch (item) {
                    /* check if it is legal phone number */
                    case 'phone':
                        if (!checkPhone(val)) {
                            dealAlert(alia + msg[item]);
                        }
                        break;
                    /* check if it is completed */
                    case 'required':
                        if (!checkRequired(val)) {
                            dealAlert(msg[item] + alia);
                        }
                        break;
                }
                if (i == data_length && index == items.length - 1 && error_exits == 0) {
                    func();
                }
            });
        }
    });
}
