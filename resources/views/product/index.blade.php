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

                        <div class="ui-row-flex">
                            <div class="ui-col ui-col-3">
                                <p class="describe">
                                    <i class="fa fa-cny"></i>
                                    <span class="price">{{ $product->price }}</span>
                                    <span class="every">/</span>
                                    <span class="unit">{{ $product->unit }}</span>
                                </p></div>
                            <div class="ui-col ui-col-1">
                                <div>
                                    <i class="fa fa-minus-square-o minus"></i>
                                    <span class="choose-num">0</span>
                                    <i class="fa fa-plus-square-o add"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="ui-list bought-items">
            <div class="ui-row-flex options">
                <div class="ui-col ui-col-3 total">
                    <div class="total-price">
                        <i class="fa fa-cny"></i>
                        <span class="total">0</span>
                    </div>
                </div>
                <div class="ui-col ui-col-2 submit">
                    <button class="ui-btn ui-btn-danger">
                        确定
                    </button>
                </div>
            </div>
        </div>
        <div class="ui-row-flex ui-whitespace item hidden" id="template">
            <div class="ui-col ui-col-4 name"></div>
            <div class="ui-col ui-col-1 price-info"><i class="fa fa-cny"></i><span class="price"></span></div>
            <div class="ui-col ui-col-1 number-info"><span class="number"></span><span class="unit"></span></div>
        </div>
    </div>
@endsection