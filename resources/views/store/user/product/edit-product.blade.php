@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">แก้ไขข้อมูลสินค้า</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-8">
        <div class="panel panel-default"> 
            <div class="panel-heading">แบบฟอร์มแก้ไขข้อมูลสินค้า</div>
            <div class="panel-body">

                <form class="form-horizontal" role="form" method="POST" action="/store/product/{{ $productEdit->product_id }}" enctype="multipart/form-data">
                {{method_field('PUT')}}

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">ประเภทสินค้า</label>
                    
                        <div class="col-md-6">
                            <select class="form-control" name="producttype_id">
                                <option value="0">-- เลือกประเภทสินค้า --</option>
                            @foreach($producttypes as $producttype)
                                <option value="{{ $producttype->producttype_id }}"
                                @if($producttype->producttype_id == $productEdit->producttype_id)
                                    selected
                                @endif >
                                    {{ $producttype->producttype_name }}
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
                        <label for="name" class="col-md-4 control-label">ชื่อประเภทสินค้า</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="product_name"
                            value="{{ $productEdit->product_name }}" required>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">จำนวน</label>

                        <div class="col-md-2">
                            <input type="number" class="form-control" name="product_unit"
                            value="{{ $productEdit->product_unit }}">
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">ราคา</label>

                        <div class="col-md-3">
                            <input type="text" class="form-control" name="product_price" 
                            value="{{ $productEdit->product_price }}">
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">รายละเอียด</label>

                        <div class="col-md-6">
                            <textarea class="form-control" name="product_description" 
                            rows="5">{{ $productEdit->product_description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">รูปภาพ</label>

                        <div class="col-md-6">
                            <img src="{{ Storage::url($productEdit->product_picture) }}" width="100" height="100">
                            <input type="file" class="form-control" name="product_picture" 
                            value="{{ $productEdit->product_picture }}" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            <button type="submit" class="btn btn-warning">
                                แก้ไขสินค้า
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