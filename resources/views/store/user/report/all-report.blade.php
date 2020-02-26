@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">รายงานทั้งหมด</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">  
                <div class="panel-heading">รายงานการขายทั้งหมด</div>
                <div class="panel-body">

                    @foreach($orders as $order)
                        <label class="control-label" id="date-on-table">วันที่</label> {{ $order->created_at }}
                        <div style="overflow-x:auto;">
                            <table class="table table-hover">
                                <tr id="head-table-tr-order">
                                    <th width="70%">รายการ</th>
                                    <th width="10%">ราคา</th>
                                    <th width="10%">จำนวน</th>
                                    <th width="10%">รวม</th>
                                </tr>
                            @foreach($orderdetails as $orderdetail)
                                @if($order->order_no == $orderdetail->order_no)
                                <tr>
                                    <td>{{ $orderdetail->product->product_name }}</td>
                                    <td>{{ number_format($orderdetail->product->product_price,2) }}</td>
                                    <td align="center">{{ $orderdetail->unit }}</td>
                                    <td align="right">
                                        {{ number_format($orderdetail->product->product_price * $orderdetail->unit,2) }}
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                                <tr>
                                    <th colspan="2" id="foot-table-tr-discount">ส่วนลดราคา</th>
                                    <th colspan="2" id="foot-table-discount"> 
                                        {{ number_format($order->order_totaldiscount,2) }}
                                    </th>
                                </tr>
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

        <div class="col-lg-4 col-md-6">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-piggy-bank fa-5x"></i>
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
            </div>

            <div class="row">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-usd fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{ number_format($discount,2) }} ฿</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <span class="pull-left">จำนวนที่ลดราคาทั้งหมด</span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        <!-- /.col-lg-4 col-md-6-->
        </div> 
    <!-- /.row -->
    </div>

@endsection