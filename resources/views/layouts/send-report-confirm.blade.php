@extends('layouts.shop-master')

@section('content')

    <form action="/shop/{{ Session::get('user') }}/confirm-order" method="post">
    {{ csrf_field() }}

        <div class="row">
            <div class="col-md-8">
                <div style="overflow-x:auto;">
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
                    </table>
                </div>
            </div>

            <div class="col-md-4">
                <div style="overflow-x:auto;">
                    <table class="table table-hover">
                        <tr>
                            <th colspan="2" id="head-table-tr-customer">สรุปรายการศั่งซื้อ</th>    
                        </tr>
                        <tr>
                            <td colspan="2"> 
                                <p>{{ $customer->customer_name }}</p>
                                <p>{{ $customer->customer_email }}</p>
                                <p>{{ $customer->customer_tel }}</p>
                                <p>{{ $customer->customer_address }}</p>
                                <p>{{ $customer->customer_postcode }}</p>
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
                                <p>รวมทั้งหมด</p>
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