@extends('admin.content')

@section('main')
    <div class="main">
        @include('support.radio')
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>店铺管理</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {!! Form::model($configs, ['url' => URL('admin/config/update'), 'class' => 'form-horizontal', 'id' => 'edit-config']) !!}
                        @include('config.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection