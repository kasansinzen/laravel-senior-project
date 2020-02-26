@extends('layouts.admin-master')

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">กระดานข่าว</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-usd fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $upgradeCount }}</div>
                            <div>รายการชำระค่าบริการทั้งหมด</div>
                        </div>
                    </div>
                </div>
                <a href="/store/admin/upgrade-management">
                    <div class="panel-footer">
                        <span class="pull-left">ดูรายละเอียด</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $userCount }}</div>
                            <div>สมาชิกทั้งหมด</div>
                        </div>
                    </div>
                </div>
                <a href="/store/admin/user-management">
                    <div class="panel-footer">
                        <span class="pull-left">ดูรายละเอียด</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div> 

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $productCount }}</div>
                            <div>สินค้าในระบบทั้งหมด</div>
                        </div>
                    </div>
                </div>
                <a href="/store/admin/product-management">
                    <div class="panel-footer">
                        <span class="pull-left">ดูรายละเอียด</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div> 

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-duplicate fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $orderCount }}</div>
                            <div>รายงานสั่งซื้อในระบบทั้งหมด</div>
                        </div>
                    </div>
                </div>
                <a href="/store/admin/order-management">
                    <div class="panel-footer">
                        <span class="pull-left">ดูรายละเอียด</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div> 
    <!-- ./row -->
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">  
                <div class="panel-heading">รายการชำระค่าบริการล่าสุด 10 รายการ</div>
                <div class="panel-body">
                    
                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>รหัส</th>
                                    <th>ชื่อผู้ใช้</th>
                                    <th>จำนวนชำระ</th>
                                    <th>วันที่บันทึก</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($upgrades as $upgrade)
                                <tr>
                                    <td>
                                        <a href="/store/admin/upgrade-management/{{ $upgrade->upgrade_id }}">
                                            {{ sprintf('%04d', $upgrade->upgrade_id) }}
                                        </a>
                                    </td>
                                    <td>{{ $upgrade->users->name }}</td>
                                    <td>{{ number_format($upgrade->upgrade_amount,2) }}</td>
                                    <td>{{ $upgrade->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                <!-- /.panel-body -->    
                </div>
            <!-- /.panal -->
            </div>
        <!-- /.col-lg-6 -->
        </div>

        <div class="col-lg-6">
            <div class="panel panel-default">  
                <div class="panel-heading">รายการสั่งซื้อล่าสุด 10 รายการ</div>
                <div class="panel-body">
                    
                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>เลขที่รายการสั่งซื้อ</th>
                                    <th>วันที่/เวลา</th>
                                    <th>ลูกค้า</th>
                                    <th>ยอดรวมทั้งหมด</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <a href="/store/admin/order-management/{{ $order->order_no }}">
                                            {{ sprintf('%04d',$order->order_no) }}
                                        </a>
                                    </td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->customer->customer_name }}</td>
                                    <td align="right">{{ number_format($order->order_totalprice,2) }}</td>
                                </tr>
                            @endforeach  
                            </tbody>
                        </table>
                    </div>
                <!-- /.panel-body -->    
                </div>
            <!-- /.panal -->
            </div>
        <!-- /.col-lg-6 -->
        </div>
    <!-- /.row -->
    </div>

@endsection