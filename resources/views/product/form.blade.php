<div class="control-group">
    {!! Form::label('name', '菜名', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::text('name', null, ['class' => 'span11']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('image', '上传图片', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::file('upload', ['id' => 'product-img']) !!}
        {!! Form::hidden('image', null) !!}
        <img src="" class="pre-view" />
    </div>
</div>
<div class="control-group">
    {!! Form::label('price', '价格', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::text('price', null, ['class' => 'span11 only-numeric']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('unit', '计价单位', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::select('unit', $units, null, ['class' => 'span4']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('discount', '折扣', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::text('discount', null, ['class' => 'span11 only-numeric']) !!}
        {!! Form::label('describe', '填写折扣，如0.8表示打八折，不填写默认不打折。', ['class' => 'describe-label']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('remain', '余量', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::text('remain', null, ['class' => 'span11']) !!}
        {!! Form::label('describe', '不填写默认货源充足', ['class' => 'describe-label']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('detail', '介绍', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::textarea('detail', null, ['class' => 'span11', 'placeholder' => '简单介绍一下这个商品吧']) !!}
    </div>
</div>
<div class="control-group">
    <div class="controls">
        {!! Form::submit($button_name, ['class' => 'btn btn-primary']) !!}
    </div>
</div>
