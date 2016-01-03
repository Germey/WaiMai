<div class="control-group">
    {!! Form::label('name', '菜名', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::text('name', null, ['class' => 'span11']) !!}
        {!! Form::label('describe', '请填写您的商品名称', ['class' => 'describe-label']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('image', '上传图片', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::file('upload', ['id' => 'product-img']) !!}
        {!! Form::hidden('image', null) !!}
        <img src="" class="pre-view" />
        {!! Form::label('describe', '请上传您的商品图片', ['class' => 'describe-label']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('price', '价格', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::text('price', null, ['class' => 'span11 only-numeric']) !!}
        {!! Form::label('describe', '请填写价格（单位元），只能输入数字，可以输入小数。', ['class' => 'describe-label']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('unit', '计价单位', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::select('unit', $units, null, ['class' => 'span4']) !!}
        {!! Form::label('describe', '请选择计价单位', ['class' => 'describe-label']) !!}
    </div>
</div>
<div class="control-group">
    {!! Form::label('max', '最多购买', ['class' => 'control-label']) !!}
    <div class="controls">
        {!! Form::text('max', null, ['class' => 'span11 only-numeric']) !!}
        {!! Form::label('describe', '请填写一次性最大购买数量，不填写默认无限制。', ['class' => 'describe-label']) !!}
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
        {!! Form::label('describe', '简单介绍一下这个商品吧，让顾客了解更全面地了解它。', ['class' => 'describe-label']) !!}
    </div>
</div>
<div class="control-group">
    <div class="controls">
        {!! Form::submit($button_name, ['class' => 'btn btn-primary']) !!}
    </div>
</div>
