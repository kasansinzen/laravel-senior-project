@extends('layouts.user-master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">รายละเอียดข้อมูลลูกค้า</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">  
                <div class="panel-heading">แสดงรายละเอียดการสั่งซื้อของลูกค้าทั้งหมด</div>
                <div class="panel-body">
                    @foreach($ordersShow as $order)
                        <label class="control-label" id="date-on-table">
                            วันที่ {{ $order->created_at }}
                        </label>
                        
                        <div style="overflow-x:auto;">
                            <table class="table table-hover">
                                <tr id="head-table-tr-order">
                                    <th width="70%">รายการ</th>
                                    <th width="10%">ราคา</th>
                                    <th align="center" width="10%">จำนวน</th>
                                    <th width="10%">รวม</th>
                                </tr>
                            @foreach($orderdetailsShow as $orderdetail)
                                @if($order->order_no == $orderdetail->order_no)
                                <tr>
                                    <td>{{ $orderdetail->product->product_name }}</td>
                                    <td>{{ number_format($orderdetail->product->product_price,2) }}</td>
                                    <td>{{ $orderdetail->unit }}</td>
                                    <td>{{ number_format($orderdetail->product->product_price * $orderdetail->unit,2) }}
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                                <tr>
                                    <th colspan="2" id="foot-table-tr-result">รวมทั้งหมด</th>
                                    <th colspan="2" id="foot-table-result">
                                        {{ number_format($order->order_totalprice,2) }}
                                    </th>
                                </tr>
                            </table><hr>
                        </div>
                    @endforeach
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
                    <div class="row" style="overflow-x:auto;">
                        <table class="table">
                            <tr id="content-table-tr-customer">
                                <td>
                                    <p>{{ $customerShow->customer_name }}</p>
                                    <p>{{ $customerShow->customer_address }}</p>
                                    <p>{{ $customerShow->customer_postcode }}</p>
                                    <p>โทรศัพท์: {{ $customerShow->customer_tel }}</p>
                                    <p>อีเมลล์: {{ $customerShow->customer_email }}</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                <!-- /.panel-body -->    
                </div>
            <!-- /.panal -->
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-usd fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ number_format($total,2) }} ฿</div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <span class="pull-left">ขายได้ทั้งหมด</span>
                    <div class="clearfix"></div>
                </div>
            </div>
        <!-- /.col-md-4 -->
        </div>
    <!-- /.row -->
    </div>

@endsection