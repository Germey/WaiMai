@extends('admin.content')

@section('main')
    <div class="main">
        <div class="widget-box">
            <div class="widget-title">
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>订单编号</th>
                        <th>订单内容</th>
                        <th>总价格</th>
                        <th>状态</th>
                        <th>买家</th>
                        <th>送货地点</th>
                        <th>联系方式</th>
                        <th>配送状态</th>
                        <th>下单时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="text-center span1">{{ $order->id }}</td>
                            <td class="text-center span2">
                                @foreach($order->content as $item)
                                    <p>{{ $item['name'].$item['number'].$item['unit'] }}</p>
                                @endforeach
                            </td>
                            <td class="text-center span2">{{ $order->price }}</td>
                            <td class="text-center span">{{ $order->status }}</td>
                            <td class="text-center span">{{ $order->name }}</td>
                            <td class="text-center span">{{ $order->location.$order->street_number }}</td>
                            <td class="text-center span">{{ $order->phone }}</td>
                            <td class="text-center span">{{ $order->status }}</td>
                            <td class="text-center span">{{ $order->updated_at }}</td>
                            <td class="span2">
                                {!! Form::open(['url' => url('admin/order/'.$order->id), 'method' => 'DELETE', 'style' => 'display: inline' ]) !!}
                                <button type="submit" class="btn btn-mini btn-danger"><i class="fa fa-remove"></i> 删除
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="text-right">
                        <p>当前第{{ $orders->currentPage() }}页，共{{ $orders->lastPage() }}页</p>
                    </div>
                    <div class="pagination pull-right">
                        {!!  $orders->setPath('/admin/order')->render() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection