@extends('layouts.admin-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">รายละเอียดสินค้าในระบบ</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">แสดงรายละเอียดข้อมูลสินค้าในบริการระบบ</div>
            <div class="panel-body">
                <div class="col-md-4">
                    <div class="form-group">
                        <img src="{{ Storage::url($product->product_picture) }}" width="100%" height="300">
                    </div>
                </div>

                <div class="col-md-8 panel panel-default" style="padding-top: 20px;">
                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">รหัสสินค้า</label>

                        <div class="col-md-8">
                            <p>{{ $product->product_id }}</p>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">ชื่อสินค้า</label>

                        <div class="col-md-8">
                            <p>{{ $product->product_name }}</p>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">จำนวน</label>

                        <div class="col-md-8">
                            <p>{{ $product->product_unit }}</p>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">ราคา</label>

                        <div class="col-md-8">
                            <p>{{ $product->product_price }}</p>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">ประเภท</label>

                        <div class="col-md-8">
                            <p>{{ $product->producttype->producttype_name }}</p>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">รายละเอียด</label>

                        <div class="col-md-8">
                            <p>{{ $product->product_description }}</p>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">วันที่บันทึก</label>

                        <div class="col-md-8">
                            <p>{{ $product->created_at }}</p>
                        </div>
                    </div>
                </div>
             <!-- /.panel-body -->    
            </div>
        <!-- /.panel -->
        </div>
    <!-- /.row -->
    </div>

@endsection