@extends('layouts.admin-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">จัดการสินค้าในระบบ</h2>
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
                            <div class="huge">{{ $productCount }}</div>
                        </div>
                    </div>
                </div>
                    <div class="panel-footer">
                        <span class="pull-left">สินค้าทั้งหมด</span>
                        <div class="clearfix"></div>
                    </div>
            </div>
        </div> 
    <!-- /.row -->
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">ตารางข้อมูลสินค้าในบริการระบบ</div>
            <div class="panel-body">
                <div style="overflow-x:auto;">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10%">รหัส</th>
                                <th width="40%">รายการ</th>
                                <th width="10%">จำนวน</th>
                                <th width="10%">ราคา</th>
                                <th width="15%">ประเภท</th>
                                <th width="10%">วันที่บันทึก</th>
                                <th width="5%">ลบ</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td width="10%">
                                        <a href="/store/admin/product-management/{{ $product->product_id }}">
                                            {{ sprintf('%07d',$product->product_id) }}
                                        </a>
                                    </td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_unit }}</td>
                                    <td>{{ $product->product_price }}</td>
                                    <td>{{ $product->producttype->producttype_name }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <form action="/store/admin/product-management/{{ $product->product_id }}"
                                        method="POST" onsubmit="return confirm('ยืนยันลบข้อมูลสินค้า')">
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
                    <div class="pagination"> {{ $products->links() }} </div>
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panel -->
        </div>
    <!-- /.row -->
    </div>

@endsection