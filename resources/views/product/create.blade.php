@extends('admin.content')
@section('main')
    <div class="main">
        @include('support.upload')
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>新增商品</h5>
                        </div>
                        <div class="widget-content nopadding">
                            {!! Form::open(['url' => URL('admin/product'), 'class' => 'form-horizontal', 'id' => 'create-product']) !!}
                            @include('product.form', ['button_name' => '新增'])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection