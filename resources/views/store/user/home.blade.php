@extends('layouts.user-master')

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">กระดานข่าว</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $orderCount }}</div>
                            <div>รายการสั่งซื้อทั้งหมด</div>
                        </div>
                    </div>
                </div>
                <a href="/store/order">
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
                            <div class="huge">{{ $customerCount }}</div>
                            <div>ลูกค้าทั้งหมด</div>
                        </div>
                    </div>
                </div>
                <a href="/store/customer">
                    <div class="panel-footer">
                        <span class="pull-left">ดูรายละเอียด</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div> 

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-piggy-bank fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ number_format($orderSum) }}</div>
                            <div>ยอดเงินรวมสะสม</div>
                        </div>
                    </div>
                </div>
                <a href="/store/report-all">
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
                            <i class="glyphicon glyphicon-home fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $shopCount }}</div>
                            <div>จำนวนร้านค้า</div>
                        </div>
                    </div>
                </div>
                <a href="/store/report-all">
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
        <div class="col-lg-7 col-md-12 col-sm-12">
            <div class="panel panel-default">  
                <div class="panel-heading">รายการสั่งซื้อ 10 รายการล่าสุด</div>
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
                                        <a href="/store/order/{{ $order->order_no }}">{{ sprintf('%04d',$order->order_no) }}</a>
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
        <!-- /.col-lg-7 col-md-12 col-sm-12 -->
        </div>

        <div class="col-lg-5 col-md-12 col-sm-12">
            <div class="panel panel-default">  
                <div class="panel-heading">ข่าวสาร</div>
                <div class="panel-body">
                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>หัวข้อ</th>
                                    <th>เนื้อหา</th>
                                    <th>วันที่/เวลา</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($news as $new)
                                <tr>
                                    <td>
                                        <a href="/store/news/{{ $new->news_id }}">{{ $new->news_header }}</a>
                                    </td>
                                    <td>
                                    @if(strlen($new->news_content) > 10)
                                            {{ iconv_substr($new->news_content, 0, 40, "UTF-8"). '...' }}
                                        @endif
                                    </td>
                                    <td>{{ $new->created_at }}</td>
                                </tr>
                            @endforeach  
                            </tbody>
                        </table>
                    </div>
                <!-- /.panel-body -->    
                </div>
            <!-- /.panal -->
            </div>
        <!-- /.col-lg-7 col-md-12 col-sm-12 -->
        </div>
    <!-- /.row -->
    </div>

@endsection