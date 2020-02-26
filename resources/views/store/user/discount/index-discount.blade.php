@extends('layouts.user-master')

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">จัดการส่วนลดราคา</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

@if($user->level_id == $level_id)

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-usd fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $discountCount }}</div>
                            <div>จำนวนส่วนลดราคา</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/store/discount/create') }}">
                    <div class="panel-footer">
                        <span class="pull-left">เพิ่มส่วนลดราคา</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-plus-sign"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        <!-- /.col-lg-3 col-md-6 -->
        </div> 
    <!-- /.row -->
    </div>

    <div class="row col-lg-12">
        <div class="panel panel-default">  
            <div class="panel-heading">ตารางข้อมูลส่วนลดราคา</div>
            <div class="panel-body">
                <div style="overflow-x:auto;">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ตัวแทนจำหน่าย</th>
                                <th width="400">รายการ</th>
                                <th>จำนวน</th>
                                <th>รวม</th>
                                <th>ส่วนลด</th>
                                <th>จำนวนลด</th>
                                <th>เหลือราคา</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($discountsIndex as $discount)
                            <tr>
                                <td>
                                    <a href="/store/dealer/{{ $discount->dealer_id }}">
                                        {{ $discount->dealer->dealer_name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="/store/product/{{ $discount->product_id }}">
                                        {{ $discount->product->product_name }}
                                    </a>
                                </td>
                                <td>{{ $discount->discount_unit }}</td>
                                <td>
                                    {{ number_format($discount->product->product_price * $discount->discount_unit,2) }}
                                </td>
                                <td>{{ $discount->discount_percent }}%</td>
                                <td>{{ number_format($discount->discount_result,2) }}</td>
                                <td>
                                    {{ number_format(($discount->product->product_price * $discount->discount_unit) - $discount->discount_result,2) }}
                                </td>
                                <td>
                                    <a href="/store/discount/{{ $discount->discount_id }}/edit">
                                        <button class="btn btn-warning">
                                        <span class="glyphicon glyphicon-cog"></span></button>
                                    </a>
                                </td>
                                <td>
                                    <form action="/store/discount/{{ $discount->discount_id }}" method="POST"
                                    onsubmit="return confirm('ยืนยันลบส่วนลดตัวแทนจำหน่าย?')">
                                    {{ method_field('DELETE') }}
                                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                                        <button type="submit" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4 col-md-offset-5">
                    <div class="pagination"> {{ $discountsIndex->links() }} </div>
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@else

    <div class="alert alert-danger">
        <strong>ไม่สามารถใช้งานได้</strong> เนื่องจากสถานะการใช้งานถูกจำกัด
    </div>

@endif

@endsection