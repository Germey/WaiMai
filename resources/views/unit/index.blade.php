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
                            <h5>计量单位管理</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bunited table-striped">
                                <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>内容</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($units as $unit)
                                    <tr>
                                        <td class="text-center span2">{{ $unit->id }}</td>
                                        <td class="text-center span2">{{ $unit->name }}</td>
                                        <td class="text-center span2">
                                            {!! Form::open(['url' => url('admin/unit/'.$unit->id), 'method' => 'DELETE', 'style' => 'display: inline' ]) !!}
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
                                    </div>
                                    <div class="span6">
                                        <div class="text-right">
                                            <p>当前第{{ $units->currentPage() }}页，共{{ $units->lastPage() }}页</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination pull-right">
                                    {!!  $units->setPath('/admin/unit')->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="icon-align-justify"></i>
                            </span>
                            <h5>增加计量单位</h5>
                        </div>
                        <div class="widget-content nopadding">
                            {!! Form::open(['url' => URL('admin/unit'), 'class' => 'form-horizontal', 'id' => 'create-product']) !!}
                            <div class="control-group">
                                {!! Form::label('name', '单位名称', ['class' => 'control-label']) !!}
                                <div class="controls">
                                    {!! Form::text('name', null, ['class' => 'span2']) !!}
                                    {!! Form::submit('添加', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection