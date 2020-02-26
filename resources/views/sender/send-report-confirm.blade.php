@extends('layouts.sender-master')

@section('content')

    <form action="/shop/{{ Session::get('user') }}/confirm-order" method="post">
    {{ csrf_field() }}

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header" style="margin-left: 10px;">ยืนยันรายการสั่งซื้อหมายเลข: {{ sprintf('%04d',$order->order_no) }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div style="overflow-x:auto;" id="order-report">
                    <table class="table table-hover">
                        <tr id="head-table-tr-order">
                            <th>รายการ</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>รวม</th>
                        </tr>
                    @foreach($orderDetails as $orderDetail)
                        <tr>
                            <td>{{ $orderDetail->product->product_name }}</td>
                            <td>{{ number_format($orderDetail->product->product_price,2) }}</td>
                            <td>{{ $orderDetail->unit }}</td>                                         
                            <td>{{ number_format(($orderDetail->product->product_price * $orderDetail->unit),2) }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <th align="center" colspan="3" id="foot-table-tr-result">รวมทั้งหมด</th>
                            <th align="right">{{ number_format(($totalPrice + $discountTotal),2) }}</th>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-md-4">
                <div style="overflow-x:auto;" id="address-report">
                    <table class="table">
                        <tr>
                            <th colspan="2" id="head-table-tr-customer">ที่อยู่สำหรับการจัดส่ง</th>    
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><label>เลขที่รายการสั่งซื้อ: {{ sprintf('%04d',$order->order_no) }}</label></p>
                                <p><label>วันที่ทำรายการ: {{ $order->created_at }}</label></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"> 
                                <p>{{ $customer->customer_name }}</p>
                                <p>{{ $customer->customer_address }}</p>
                                <p>{{ $customer->customer_postcode }}</p>
                                <p>โทรศัพท์: {{ $customer->customer_tel }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <p>ส่วนลด</h4></p>
                            </th>
                            <td align="right">
                            @if($discountTotal)
                                {{ number_format($discountTotal, 2) }}
                            @else
                                {{ number_format(0,2) }}
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <p>ยอดสุทธิ</p>
                            </th>
                            <td align="right">
                                {{ number_format($order->order_totalprice,2) }}
                            </td>
                        </tr>
                    </table>
                </div>
            <!-- /col-md-4 -->
            </div>
        </div>

    </form>

@endsection