@extends('layouts.user-master')

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">รายละเอียดตัวแทนจำหน่าย</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-12">
        <div class="panel panel-default">  
            <div class="panel-heading">แสดงรายละเอียดข้อมูลตัวแทนจำหน่าย</div>
            <div class="panel-body">

                <div class="col-md-3">
                    <div class="form-group">
                        <img src="{{ Storage::url($dealerShow->dealer_picture) }}" width="100%" height="250">
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="row panel panel-default" style="padding-top: 20px;">
                        <div class="row form-group">
                            <label id="txtLabelRight" class="col-md-2 control-label">ชื่อ-นามสกุล</label>

                            <div class="col-md-6">
                                    <p>{{ $dealerShow->dealer_name }}</p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label id="txtLabelRight" class="col-md-2 control-label">เบอร์โทรศัพท์</label>

                            <div class="col-md-6">
                                    <p>{{ $dealerShow->dealer_tel }}</p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label id="txtLabelRight" class="col-md-2 control-label">อีเมลล์</label>

                            <div class="col-md-6">
                                    <p>{{ $dealerShow->dealer_email }}</p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label id="txtLabelRight" class="col-md-2 control-label">วันที่สมัคร</label>

                            <div class="col-md-6">
                                    <p>{{ $dealerShow->created_at }}</p>
                            </div>
                        </div>
                    <!-- /.row -->
                    </div>
                <!-- /.col-md-9 -->
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>
@if($orders)
    <div class="row col-lg-12">
        <div class="panel panel-default">  
            <div class="panel-heading">
                แสดงรายละเอียดข้อมูลตัวแทนจำหน่าย
                <label class="pull-right">ยอดรวมทั้งหมด {{ number_format($total,2) }} บาท</label>
            </div>
            <div class="panel-body">
                
                    <!-- <div class="col-md-4 col-md-offset-8">
                        <div class="row form-group" id="all-result-table-customer">
                            <label class="control-label">ยอดรวมทั้งหมด</label>
                            {{ number_format($total,2) }} บาท
                        </div>
                    </div> -->
                    @foreach($orders as $order)
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
                                    <td>{{ number_format($orderdetail->product->product_price, 2) }}</td>
                                    <td align="center">{{ $orderdetail->unit }}</td>
                                    <td align="right">
                                    {{ number_format($orderdetail->product->product_price * $orderdetail->unit, 2) }}
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                                <tr>
                                    <th colspan="2" id="foot-table-tr-result">รวมทั้งหมด</th>
                                    <th colspan="2" id="foot-table-result">
                                        {{ number_format($order->order_totalprice, 2) }}
                                    </th>
                                </tr>
                            </table><hr>
                        </div>
                    @endforeach
                
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>
@endif

@endsection