@extends('layouts.shop-master')

@section('content')
    
    <div id="show-product-shop">
        <div class="form-group">
            <div class="col-md-8 col-sm-8" id="view-product">
                <img src="{{ Storage::url($view->product_picture) }}" width="100%" height="500" align="left">
            </div>
        </div>

        <div class="col-md-3 col-sm-4" id="detail-product">

            <div class="row form-group">

                <div class="col-md-12">
                    <label class="control-label" id="price-product">
                        {{ number_format($view->product_price,2) }} ฿
                    </label>
                </div>
            </div>
            <form action="/shop/{{ Session::get('user') }}/view/{{ $view->product_id }}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                <div class="row form-group">
                    <label class="col-md-2 col-sm-2 col-xs-2 control-label" id="label-product">จำนวน</label>

                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <input type="number" class="form-control" name="cart_unit"
                        required>
                        <input type="hidden" name="product_id" value="{{ $view->product_id }}">
                    </div>
                    <div class="col-md-6">
                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                          <span class="sr-only">Error:</span>
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12 col-sm-12">
                        <button class="btn btn-warning" type="button">กลับไปร้านค้า</button> 
                        <button class="btn btn-primary" type="submit">เพิ่มลงตะกร้า</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                <label class="control-label">
                    {{ $view->product_name }}
                </label>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{ $view->product_description }}
                </p>
            </div>
        </div>
    </div>
    
@endsection