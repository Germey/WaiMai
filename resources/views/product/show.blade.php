@extends('layout.germy')

@section('content')
    <section class="ui-placehold-img">
        <span><img src="{{ $product->image }}"></span>
    </section>
    <h4 class="ui-nowrap">{{ $product->name }}</h4>
    <p class="ui-nowrap">{{ $product->detail }}</p>
@endsection