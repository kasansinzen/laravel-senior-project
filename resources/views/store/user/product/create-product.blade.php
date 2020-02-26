@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">เพิ่มสินค้า</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-8">
        <div class="panel panel-default">  
            <div class="panel-heading">แบบฟอร์มเพิ่มสินค้า</div>
            <div class="panel-body">

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/store/product') }}" 
                enctype="multipart/form-data">
                {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">ประเภทสินค้า</label>

                        <div class="col-md-6">
                            <select class="form-control" name="producttype_id" required>
                                <option value="0">-- เลือกประเภทสินค้า --</option>
                            @foreach($producttypesCreate as $rows)
                                <option value="{{ $rows->producttype_id }}">
                                    {{ $rows->producttype_name }}
                                </option>
                            @endforeach
                            </select>

                            @if (Session::has('error'))
                                <span class="help-block" id="alert-error"> 
                                    <strong>{{ Session::get('error') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">ชื่อสินค้า</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="product_name" required>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">จำนวน</label>

                        <div class="col-md-2">
                            <input type="number" class="form-control" name="product_unit">
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">ราคา</label>

                        <div class="col-md-3">
                            <input type="text" class="form-control" name="product_price" value="0.00">
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">รายละเอียด</label>

                        <div class="col-md-6">
                            <textarea class="form-control" name="product_description" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">รูปภาพ</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control" name="product_picture" 
                            accept="image/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            <button type="submit" class="btn btn-primary">
                                เพิ่มสินค้า
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