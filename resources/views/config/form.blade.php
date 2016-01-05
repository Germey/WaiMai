@foreach($config_items as $config_item)
    @foreach($configs as $config)
        @if($config['key'] == $config_item)
            <div class="control-group">
                {!! Form::label('name', $config['title'], ['class' => 'control-label']) !!}
                <div class="controls">
                    @if($config['input'] == 'textarea')
                        {!! Form::textarea($config['key'], $config['value'], ['class' => $config['class']]) !!}
                    @elseif($config['input'] == 'radio')
                        <div data-toggle="buttons-radio" class="{{ $config['class'] }}">
                            {!! Form::button('是', ['class' => 'btn', 'value' => 1]) !!}
                            {!! Form::button('否', ['class' => 'btn', 'value' => 0]) !!}
                            {!! Form::hidden($config['key'], $config['value'], ['class' => 'value']) !!}
                        </div>
                    @elseif($config['input'] == 'time')
                        <div id="datetimepicker3" class="{{ $config['class'] }}">
                            <input data-format="hh:mm:ss" type="text"/>
                            <span class="add-on">
                                <i data-time-icon="icon-time"
                                   data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                    @else
                        {!! Form::text($config['key'], $config['value'], ['class' => $config['class']]) !!}
                    @endif
                    {!! Form::label('describe', $config['description'], ['class' => 'describe-label']) !!}
                </div>
            </div>
        @endif
    @endforeach
@endforeach

<div class="control-group">
    <div class="controls">
        {!! Form::submit('确定', ['class' => 'btn btn-primary']) !!}
    </div>
</div>