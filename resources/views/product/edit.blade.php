@extends('admin.content')
@section('main')
    <div class="main">
        <div class="container-fluid">
            @include('support.upload')
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>编辑商品</h5>
                        </div>
                        <div class="widget-content nopadding">
                            {!! Form::model($product, ['url' => URL('admin/product/'.$product->id), 'class' => 'form-horizontal', 'method' => 'PUT', 'id' => 'edit-product']) !!}
                            @include('product.form', ['button_name' => '修改'])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection