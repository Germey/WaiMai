@extends('admin.content')

@section('main')
<div class="main">
    <div class="widget-box">
        <div class="widget-title">
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
                        <a href="{{ URL('admin/advanced/unit/'.$unit->id.'/edit')}}"
                           class="btn btn-mini btn-success"><i class="fa fa-edit"></i> 编辑</a>
                        {!! Form::open(['url' => url('admin/anvanced/unit/'.$unit->id), 'method' => 'DELETE', 'style' => 'display: inline' ]) !!}
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
                    <p>当前第{{ $units->currentPage() }}页，共{{ $units->lastPage() }}页</p>
                </div>
                <div class="pagination pull-right">
                    {!!  $units->setPath('/admin/unit')->render() !!}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection