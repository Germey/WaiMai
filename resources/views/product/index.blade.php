@extends('layout.germy')

@section('content')
    <div id="product-list">
        <ul class="ui-list ui-border-tb">
            @foreach($products as $product)
                <li class="ui-border-t product-item" id="product-{{ $product->id }}" index="{{ $product->id }}">
                    <div class="ui-avatar">
                        <a href="{{ url('/product/'.$product->id) }}">
                            <span><img src="{{ $product->image }}"></span>
                        </a>
                    </div>
                    <div class="ui-list-info">
                        <h4 class="ui-nowrap name">{{ $product->name }}</h4>

                        <p class="ui-nowrap detail">{{ $product->detail }}</p>

                        <p class="price">{{ $product->price }}</p>

                        <div><i class="icon-angle-left minus"></i><span class="choose-num">0</span><i
                                    class="icon-angle-right add"></i></div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="ui-list bought-items">
            <div class="ui-row-flex options">
                <div class="ui-col ui-col-3 total"></div>
                <div class="ui-col ui-col-2 submit">
                    <button class="ui-btn ui-btn-danger">
                        确定
                    </button>
                </div>
            </div>
        </div>
        <div class="ui-row-flex ui-whitespace item" id="template">
            <div class="ui-col ui-col-3 name"></div>
            <div class="ui-col ui-col-1 price"></div>
            <div class="ui-col ui-col-2 number"></div>
        </div>
    </div>
@endsection