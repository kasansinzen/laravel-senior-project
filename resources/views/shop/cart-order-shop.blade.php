@extends('layouts.shop-master')

@section('content')
    <!-- /.head menu -->
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-md-9">
                <div style="overflow-x:auto;">
                    <table class="table table-hover">
                    <tr>
                        <th>รายการ</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        <th>รวม</th>
                    </tr>
                @foreach($product as $rows)
                    <tr>
                        <td>
                            <img src="{{ Storage::url($rows['item']['product_picture']) }}" height="50" width="50"> 
                            {{ $rows['item']['product_name'] }}
                        </td>
                        <td>{{ number_format($rows['item']['product_price'],2) }}</td>
                        <td>{{ $rows['qty'] }}</td>
                        <td>{{ number_format($rows['price'],2) }}</td>
                    </tr>
                @endforeach
                    </table>
                </div>
            </div>
            <div class="col-md-3" id="form-margin-top">
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label" id="price-product">รวมทั้งหมด</label>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label" id="price-product">
                            {{ number_format($totalPrice,2) }}
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 btn-group-justified">
                        <a href="/shop/{{ Session::get('user') }}">
                            <button class="btn btn-warning" id="btn-product-shop">
                                กลับไปที่ร้านค้า
                            </button>
                        </a>
                        <a href="/shop/{{ Session::get('user') }}/shopping-cart/clean-cart">
                            <button class="btn btn-danger" id="btn-product-shop">
                                ล้างตะกร้าสินค้า
                            </button>
                        </a>
                        <a href="/shop/{{ Session::get('user') }}/fill-customer">
                            <button class="btn btn-success" id="btn-product-shop-full">
                                สั่งซื้อสืนค้า
                            </button>
                        </a>
                    </div>
                </div>
            <!-- /col-md-3 -->
            </div>
        <!-- /row -->
        </div>
    @else
        
    @endif

@endsection