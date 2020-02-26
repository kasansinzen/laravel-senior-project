@extends('layouts.admin-master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">รายละเอียดรายการสั่งซื้อสินค้า</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">  
                <div class="panel-heading">แสดงรายละเอียดข้อมูลรายการสั่งซื้อสินค้าทั้งหมด</div>
                <div class="panel-body">
                    <label class="control-label" id="date-on-table">
                        วันที่ {{ $orderShow->created_at }}
                    </label>
                    <div style="overflow-x:auto;">
                        <table class="table table-hover">
                            <tr id="head-table-tr-order">
                                <th>รายการ</th>
                                <th>ราคา</th>
                                <th>จำนวน</th>
                                <th>รวม</th>
                            </tr>
                        @foreach($orderdetailsShow as $orderdetail)
                            <tr>
                                <td>{{ $orderdetail->product->product_name }}</td>
                                <td>{{ number_format($orderdetail->product->product_price, 2) }}</td>
                                <td align="center">{{ $orderdetail->unit }}</td>
                                <td align="right">
                                    {{ number_format($orderdetail->product->product_price * $orderdetail->unit, 2) }}
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <th colspan="3" id="foot-table-tr-discount">ส่วนลดราคา</th>
                                <th id="foot-table-discount"> 
                                    {{ number_format($orderShow->order_totaldiscount,2) }}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3" id="foot-table-tr-result">รวมทั้งหมด</th>
                                <th id="foot-table-result">
                                    {{ number_format($orderShow->order_totalprice, 2) }}
                                </th>
                            </tr>
                        </table>
                    </div>
                <!-- /.panel-body -->    
                </div>
            <!-- /.panal -->
            </div>
        <!-- /.col-lg-8 -->
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">  
                <div class="panel-heading">แสดงรายละเอียดข้อมูลลูกค้า</div>
                <div class="panel-body">
                    <div style="overflow-x:auto;">
                        <table class="table">
                            <tr>
                                <td>
                                    <p><label>เลขที่รายการสั่งซื้อ: {{ sprintf('%04d', $orderShow->order_no) }}</label></p>
                                    <p><label>วันที่ทำรายการ:</label> {{ $orderShow->created_at }}</p>
                                </td>
                            </tr>
                            <tr id="content-table-tr-customer">
                                <td>
                                    <p>{{ $orderShow->customer->customer_name }}</p>
                                    <p>{{ $orderShow->customer->customer_address }}</p>
                                    <p>{{ $orderShow->customer->customer_postcode }}</p>
                                    <p>โทรศัพท์: {{ $orderShow->customer->customer_tel }}</p>
                                    <p>อีเมลล์: {{ $orderShow->customer->customer_email }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p><label>สถานะรายการ: {{ $orderShow->orderstatus->orderstatus_name }}</label></p>
                                </td>
                            </tr>
                        </table>
                    <!-- /.overflow-x:auto -->
                    </div>
                <!-- /.panel-body -->    
                </div>
            <!-- /.panal -->
            </div>
        <!-- /.col-lg-4 -->
        </div>
    <!-- /.row -->
    </div>

@endsection
