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
                    @foreach($product as $rows)
                        <tr>
                            <td>{{ $rows['item']['product_name'] }}</td>
                            <td>{{ number_format($rows['item']['product_price'],2) }}</td>
                            <td>{{ $rows['qty'] }}</td>                                         
                            <td>{{ number_format($rows['price'],2) }}</td>
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
                                <p>{{ Session::get('customer')['customer_name'] }}</p>
                                <p>{{ Session::get('customer')['customer_email'] }}</p>
                                <p>{{ Session::get('customer')['customer_tel'] }}</p>
                                <p>{{ Session::get('customer')['customer_address'] }}</p>
                                <p>{{ Session::get('customer')['customer_postcode'] }}</p>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <p>ส่วนลด</h4></p>
                            </th>
                            <td align="right">
                            @if(Session::has('discount_total'))
                                {{ number_format(Session::get('discount_total'),2) }}
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
                                <p>{{ number_format($totalPrice - $discount_total,2) }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <button type="submit" class="btn btn-info btn-lg">
                                    สั่งซื้อ
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            <!-- /col-md-4 -->
            </div>
        </div>

    </form>

@endsection