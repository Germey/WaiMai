@extends('layout.germy')

@section('content')
    <div id="order-preview">
        <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=AE4d81c6a9edc1562e49ccc0a87d3fb5"></script>
        {!! Form::open(['url' => url('order/submit'), 'id' => 'order-submit-form']) !!}
        <p class="title">点餐信息确认</p>

        <div class="bought-items">
            @foreach($items as $item)
                <div class="ui-row-flex ui-whitespace item">
                    <div class="ui-col ui-col-4 name">{{ $item['name'] }}</div>
                    <div class="ui-col ui-col-1 price-info"><i class="fa fa-cny"></i><span
                                class="price">{{ $item['price'] }}</span></div>
                    <div class="ui-col ui-col-1 number-info"><span class="number">{{ $item['number'] }}</span><span
                                class="unit">{{ $item['unit'] }}</span>
                    </div>
                    {!! Form::hidden('order[][index]', $item['index']) !!}
                </div>
            @endforeach
        </div>
        <div class="ui-row-flex ui-whitespace total-info">
            <div class="ui-col ui-col-4 total">总计</div>
            <div class="ui-col ui-col-1 price-info">
                <i class="fa fa-cny"></i>
                <span class="price">{{ $total['price'] }}</span>
            </div>
            <div class="ui-col ui-col-1 number-info">
                <span class="number">{{ $total['number'] }}</span>
            </div>
        </div>
        <p class="title">个人信息</p>

        <div class="ui-form ui-border-t" id="map">

        </div>
        <div id="location-info">

        </div>
        <div class="ui-form ui-border-t">

            <div class="ui-form-item ui-form-item-l ui-border-b">
                <label class="ui-border-r">
                    姓名
                </label>
                <input type="text" placeholder="请填写您的姓名"/>
                <a class="ui-icon-close">
                </a>
            </div>
            <div class="ui-form-item ui-form-item-l ui-border-b">
                <label class="ui-border-r">
                    备注
                </label>
                <input type="text" placeholder="写下您想说的话"/>
                <a class="ui-icon-close">
                </a>
            </div>
            <div class="ui-form-item ui-form-item-l ui-border-b">
                <label class="ui-border-r">
                    地址
                </label>
                <input type="text" name="location" placeholder="请填写街道详细地址"/>
                <a class="ui-icon-close"></a>
            </div>
            <div class="ui-form-item ui-form-item-l ui-border-b">
                <label class="ui-border-r">
                    手机
                </label>
                <input type="text" placeholder="请输入手机号码"/>
                <a class="ui-icon-close">
                </a>
            </div>
            <div class="ui-btn-wrap">
                <button class="ui-btn-lg ui-btn-danger">
                    提交订单
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection