@foreach($products as $product)
    <li class="col-lg-4 col-sm-4">
        <a href="/shop/{{ Session::get('user') }}/view/{{ $product->product_id }}">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12">
                            <img src="{{ Storage::url($product->product_picture) }}" height="250" width="100%" 
                            id="img-product-shop">
                        </div>
                    </div>
                    <div class="row" id="name-product-shop">
                        <div class="col-xs-12 col-sm-12">
                        @if(strlen($product->product_name) > 10)
                            {{ iconv_substr($product->product_name, 0, 50, "UTF-8"). '...' }}
                        @endif
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row" id="price-product-shop">
                        <div class="col-xs-12">
                            {{ number_format($product->product_price,2) }} บาท
                        </div>
                    </div>
                </div>
                
            </div>
        </a>
        <!-- <a href="/shop/{{ Session::get('user') }}/view/{{ $product->product_id }}">
            <p><img src="{{ $product->product_picture }}" height="250" width="100%" id="img-product-shop"></p>
            <p id="name-product-shop" maxlength="10">{{ $product->product_name }}</p>
            <p id="price-product-shop">{{ number_format($product->product_price,2) }}</p>
        </a> -->
    </li>  
@endforeach