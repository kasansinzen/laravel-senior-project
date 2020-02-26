@extends('layouts.admin-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">รายการสั่งซื้อสินค้าในระบบทั้งหมด</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $orderCount }}</div>
                        </div>
                    </div>
                </div>
                <a href="/store/order">
                    <div class="panel-footer">
                        <span class="pull-left">รายการสั่งซื้อทั้งหมด</span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div> 
    <!-- /.row -->
    </div>

    <div class="row col-lg-12">
        <div class="panel panel-default"> 
            <div class="panel-heading">ตารางข้อมูลรายการสั่งซื้อสินค้ามั้งหมด</div>
            <div class="panel-body">
                <div class="row">    
                    <div class="col-lg-5 col-lg-offset-7">
                        <div class="panel panel-default" style="text-align: center;">

                            <form method="GET" action="/store/admin/order-management">
                                <input id="checkbox-margin" type="checkbox" name="order-all" value="all"> 
                                    <label id="checkbox-label">ทั้งหมด</label>
                                <input id="checkbox-margin" type="checkbox" name="order-customer" value="customer"> 
                                    <label id="checkbox-label">ลูกค้า</label>
                                <input id="checkbox-margin" type="checkbox" name="order-dealer" value="dealer"> 
                                    <label id="checkbox-label">ตัวแทนจำหน่าย</label>

                                <button id="checkbox-margin" type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row" style="overflow-x:auto;">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>เลขที่รายการสั่งซื้อ</th>
                                <th>วันที่/เวลา</th>
                                <th>ลูกค้า</th>
                                <th>ยอดรวมทั้งหมด</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>

                        <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>
                                <a href="/store/admin/order-management/{{ $order->order_no }}">
                                    {{ sprintf('%07d',$order->order_no) }}
                                </a>
                            </td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->customer->customer_name }}</td>
                            <td>{{ number_format($order->order_totalprice, 2) }}</td>
                            <td>{{ $order->orderstatus->orderstatus_name }}</td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div> 
                <div class="col-md-4 col-md-offset-5">
                    <div class="pagination"> {{ $orders->links() }} </div>
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@endsection