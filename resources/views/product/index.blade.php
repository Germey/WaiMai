@extends('admin.content')

@section('main')
    <div class="main">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="icon-align-justify"></i>
                            </span>
                            <h5>商品管理</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>商品名称</th>
                                    <th>预览图</th>
                                    <th>简介</th>
                                    <th>价格</th>
                                    <th>折扣</th>
                                    <th>订购单位</th>
                                    <th>最大订购</th>
                                    <th>已售数量</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="text-center span2">{{ $product->name }}</td>
                                        <td class="text-center span2"><img src="{{ $product->image }}"></td>
                                        <td class="text-center span2">{{ $product->detail }}</td>
                                        <td class="text-center span1">{{ $product->price }}</td>
                                        <td class="text-center span1">{{ $product->discount }}</td>
                                        <td class="text-center span1">{{ $product->getUnit->name }}</td>
                                        <td class="text-center span1">{{ $product->max }}</td>
                                        <td class="text-center span1">1</td>
                                        <td class="span2">
                                            <a href="{{ URL('admin/product/'.$product->id.'/edit')}}"
                                               class="btn btn-mini btn-success"><i class="fa fa-edit"></i> 编辑</a>
                                            {!! Form::open(['url' => url('admin/product/'.$product->id), 'method' => 'DELETE', 'style' => 'display: inline' ]) !!}
                                            <button type="submit" class="btn btn-mini btn-danger"><i
                                                        class="fa fa-remove"></i> 删除
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="clearfix control-content">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="text-left">
                                            <h5>
                                                <a href="{{ URL('admin/product/create')}}"
                                                   class="btn btn-mini btn-primary">增加菜品</a>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <div class="text-right">
                                            <p>当前第{{ $products->currentPage() }}页，共{{ $products->lastPage() }}页</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination pull-right">
                                    {!!  $products->setPath('/admin/product')->render() !!}
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection