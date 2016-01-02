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
        {!! Form::text('price', null, ['class' => 'span11']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('discount', '折扣', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::text('discount', null, ['class' => 'span11']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('unit', '单位', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::text('unit', null, ['class' => 'span11']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('detail', '详情', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::textarea('detail', null, ['class' => 'span11', 'placeholder' => 'Enter text ...']) !!}
    </div>
</div>
<div class="control-group">
    <div class="controls">
        {!! Form::submit($button_name, ['class' => 'btn btn-primary']) !!}
    </div>
</div>
