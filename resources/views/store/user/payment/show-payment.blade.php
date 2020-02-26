@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">จัดการส่วนลดราคา</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-12">
        <div class="panel panel-default">  
            <div class="panel-heading">รายละเอียดสินค้า</div>
            <div class="panel-body">

                <div class="form-group">
                    <div class="col-md-3">
                        <div class="form-group">
                            <img src="{{ $productShow->product_picture }}" width="100%" height="300">
                        </div>
                        
                        <div class="form-group">
                            <div class="row col-md-4 col-md-offset-5">
                                <!-- Your share button code -->
                                <div class="fb-share-button" data-href="http://kasansin-project2.esy.es/shop/1/view/{{ $productShow->product_id }}" data-layout="button" size="large"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">ชื่อสินค้า</label>

                        <div class="col-md-6">
                            <p>{{ $productShow->product_name }}</p>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">จำนวน</label>

                        <div class="col-md-6">
                            <p>{{ $productShow->product_unit }}</p>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">ราคา</label>

                        <div class="col-md-6">
                            <p>{{ number_format($productShow->product_price,2) }}</p>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">ประเภทสินค้า</label>

                        <div class="col-md-6">
                            <p>{{ $productShow->producttype->producttype_name }}</p>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">รายละเอียด</label>

                        <div class="col-md-6">
                            <p>{{ $productShow->product_description }}</p>
                        </div>
                    </div>
                <!-- /col-md-9 -->
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@endsection