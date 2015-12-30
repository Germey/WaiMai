@extends('layout.germy')

@section('content')
    <div id="order-preview">
        <div class="ui-form ui-border-t">
            <form action="#">
                <div class="ui-form-item ui-border-b">
                    <label>
                        姓名
                    </label>
                    <input type="text" placeholder="请填写您的姓名"/>
                    <a class="ui-icon-close">
                    </a>
                </div>
                <div class="ui-form-item ui-border-b">
                    <label>
                        备注
                    </label>
                    <input type="text" placeholder="写下您想说的话"/>
                    <a class="ui-icon-close">
                    </a>
                </div>
                <div class="ui-form-item ui-border-b">
                    <label>
                        地址
                    </label>
                    <input type="text" placeholder="请填写街道详细地址"/>
                    <a class="ui-icon-close"></a>
                </div>
                <div class="ui-form-item ui-border-b">
                    <label>
                        +86
                    </label>
                    <input type="text" placeholder="请输入手机号码"/>
                    <a class="ui-icon-close">
                    </a>
                </div>
                <div class="ui-btn-wrap">
                    <button class="ui-btn-lg ui-btn-danger">
                        支付
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection