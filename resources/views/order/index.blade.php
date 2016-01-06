@extends('admin.content')

@section('main')
    <div class="main">
        @include('support.editable')
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="icon-align-justify"></i>
                            </span>
                            <h5>订单管理</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>订单编号</th>
                                    <th>订单内容</th>
                                    <th>总价格</th>
                                    <th>支付状态</th>
                                    <th>买家</th>
                                    <th>送货地点</th>
                                    <th>联系方式</th>
                                    <th>配送状态</th>
                                    <th>下单时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="text-center span2">{{ $order->identifier }}</td>
                                        <td class="text-center span2">
                                            @foreach($order->content as $item)
                                                <p>{{ $item['name'].$item['number'].$item['unit'] }}</p>
                                            @endforeach
                                        </td>
                                        <td class="text-center span1">{{ number_format($order->price, $price_format, '.', '') }}</td>
                                        <td class="text-center span1">{{ $order->payStatus->name }}</td>
                                        <td class="text-center span1">{{ $order->name }}</td>
                                        <td class="text-center span2">{{ $order->location.$order->street_number }}</td>
                                        <td class="text-center span2">{{ $order->phone }}</td>
                                        <td class="text-center span2">
                                            <a href="#" class="order-delivery" data-url="/admin/order/change-status"
                                               data-name="delivery_status" data-type="select" data-pk="{{ $order->id }}"
                                               data-value="{{ $order->deliveryStatus->id }}"
                                               data-title="修改配送状态">{{ $order->deliveryStatus->name }}
                                            </a>
                                        </td>
                                        <td class="text-center span2">{{ $order->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="clearfix control-content">
                                <hr>
                                <div class="row-fluid">
                                    <div class="span6">
                                    </div>
                                    <div class="span6">
                                        <div class="text-right">
                                            <p>当前第{{ $orders->currentPage() }}页，共{{ $orders->lastPage() }}页</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination pull-right">
                                    {!!  $orders->setPath('/admin/order')->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection