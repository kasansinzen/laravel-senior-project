@extends('layouts.shop-master')

@section('content')

    <div class="col-md-4 col-md-offset-4" id="">

        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                <div class="form-group">
                    <h4 id="label-create-order">{{ Session::get('success') }}</h4>
                </div>

                <div class="form-group">
                    <label class="control-label" id="label-create-order">หมายเลขรายการสั่งซื้อ</label>
                    <label class="control-label"> {{ $orderSuccess->order_no }}</label>
                </div>
                
                <div class="form-group">
                    <label class="control-label" id="label-create-order">ราคารวมที่ต้องชำระ</label>
                    <label class="control-label"> {{ number_format($orderSuccess->order_totalprice,2) }}</label>
                </div>
            </div>
        @else
            
        @endif
    </div>

@endsection