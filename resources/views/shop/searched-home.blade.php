@extends('layouts.shop-master')

@section('content')

    <div class="form-group">
    @foreach($products as $product)
        <div class="col-xs-4" id="show-product-shop">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/shop/{{ Session::get('user') }}/view/{{ $product->product_id }}">
                        <img src="{{ Storage::url($product->product_picture) }}" height="250" width="100%" id="img-product-shop">
                        <p id="name-product-shop" maxlength="10">{{ $product->product_name }}</p>
                        <p id="price-product-shop">{{ number_format($product->product_price,2) }}</p>
                    </a>
                </li>
            </ul>
        </nav>
            
        </div>
    @endforeach
    </div>

@endsection