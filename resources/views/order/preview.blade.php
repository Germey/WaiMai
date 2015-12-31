@extends('layout.germy')

@section('content')
    <div id="order-preview">
        <script type="text/javascript"
                src="http://api.map.baidu.com/api?v=2.0&ak=AE4d81c6a9edc1562e49ccc0a87d3fb5"></script>
        {!! Form::open(['url' => url('order/submit'), 'id' => 'order-submit-form']) !!}
        <p class="title">点餐信息确认</p>

        <div class="bought-items">
            @foreach($items as $key => $item)
                <div class="ui-row-flex ui-whitespace item">
                    <div class="ui-col ui-col-4 name">{{ $item['name'] }}</div>
                    <div class="ui-col ui-col-1 price-info"><i class="fa fa-cny"></i><span
                                class="price">{{ $item['price'] }}</span></div>
                    <div class="ui-col ui-col-1 number-info"><span class="number">{{ $item['number'] }}</span><span
                                class="unit">{{ $item['unit'] }}</span>
                    </div>
                    {!! Form::hidden("order[$key][index]", $item['index']) !!}
                    {!! Form::hidden("order[$key][number]", $item['number']) !!}
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

        <p class="title">您的位置</p>

        <div class="ui-form ui-border-t" id="map">

        </div>
        <div id="location-info">

        </div>
        <p class="title">个人信息</p>

        <div class="ui-form ui-border-t">

            <div class="ui-form-item ui-form-item-l ui-border-b">
                <label class="ui-border-r">
                    姓名
                </label>
                <input type="text" name="name" placeholder="请填写您的姓名"/>
                <a class="ui-icon-close">
                </a>
            </div>
            <div class="ui-form-item ui-form-item-l ui-border-b">
                <label class="ui-border-r">
                    备注
                </label>
                <input type="text" name="remark" placeholder="写下您想说的话"/>
                <a class="ui-icon-close">
                </a>
            </div>
            <div class="ui-form-item ui-form-item-l ui-border-b">
                <label class="ui-border-r">
                    地址
                </label>
                <input type="text" name="location" placeholder="请填写地址"/>
            </div>
            <div class="ui-form-item ui-form-item-l ui-border-b">
                <label class="ui-border-r">
                    门牌号
                </label>
                <input type="text" name="street_number" placeholder="请输入您的门牌号,如XX小区（村）XX号"/>
                <a class="ui-icon-close">
                </a>
            </div>
            <div class="ui-form-item ui-form-item-l ui-border-b">
                <label class="ui-border-r">
                    手机
                </label>
                <input type="text" name="phone" placeholder="请输入手机号码"/>
                <a class="ui-icon-close">
                </a>
            </div>
            <div class="ui-btn-wrap">
                <a class="ui-btn-lg ui-btn-danger" id="submit">
                    提交订单
                </a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection