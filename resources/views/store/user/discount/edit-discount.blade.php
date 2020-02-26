@extends('layouts.user-master')

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">แก้ไขส่วนลดสินค้า</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-8">
        <div class="panel panel-default">  
            <div class="panel-heading">แบบฟอร์มแก้ไขส่วนลดสินค้า</div>
            <div class="panel-body">

                <form method="post" action="/store/discount/{{ $discountEdit->discount_id }}" class="form-horizontal" role="form">
                {{ method_field('PUT') }}
                    <div class="form-group row" id="form-margin-top">
                        <label for="name" class="col-md-3 control-label">รายการสินค้า</label>

                        <div class="col-md-6">
                            <input type="text" name="product_id" readonly class="form-control" 
                            value="{{ $discountEdit->product->product_name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-3 control-label">ตัวแทนจำหน่าย</label>

                        <div class="col-md-6">
                            <input type="text" name="dealer_id" readonly class="form-control"
                            value="{{ $discountEdit->dealer->dealer_name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-3 control-label">จำนวน</label>

                        <div class="col-md-2">
                            <input type="number" name="discount_unit" class="form-control"
                            value="{{ $discountEdit->discount_unit }}">
                        </div>
                        <div class="col-md-1" id="margin-top-percent">
                            <label class="control-label"><strong>ชิ้น</strong></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-3 control-label">ลด</label>

                        <div class="col-md-2">
                            <input type="number" name="discount_percent" class="form-control"
                            value="{{ $discountEdit->discount_percent }}">
                        </div>
                        <div class="col-md-1" id="margin-top-percent">
                            <label class="control-label"><strong>%</strong></label>
                        </div>
                    </div>

                    <div class="form-group row" id="form-margin-top">
                        <div class="col-md-2 col-md-offset-5">
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            <button type="submit" class="btn btn-warning">
                                แก้ไขส่วนลดราคา
                            </button>
                        </div>
                    </div>
                </form>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@endsection