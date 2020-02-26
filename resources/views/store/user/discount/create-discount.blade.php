@extends('layouts.user-master')

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">เพิ่มส่วนลดสินค้า</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-8">
        <div class="panel panel-default">  
            <div class="panel-heading">แบบฟอร์มเพิ่มส่วนลดสินค้า</div>
            <div class="panel-body">

                <form class="form-horizontal" role="form" method="get" action="{{ url('/store/discount/create') }}">

                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">ค้นหาประเภทสินค้า</label>

                        <div class="col-md-4">
                            <select class="form-control" name="producttype_id" required>
                                <option value="0">-- เลือกประเภทสินค้า --</option>
                            @foreach($producttypesCreate as $producttype)
                                <option id="producttype" for="producttype" value="{{ $producttype->producttype_id }}"
                            @if($checkProducttype)
                                @if($checkProducttype->producttype_id == $producttype->producttype_id)
                                    selected
                                @endif >
                                    {{ $producttype->producttype_name }}
                                </option>
                            @else
                                <option id="producttype" for="producttype" value="{{ $producttype->producttype_id }}">
                                    {{ $producttype->producttype_name }}
                                </option>
                            @endif
                                
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-deafault">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>

                </form>

            @if($checkProducttype)
                <form method="post" action="{{ url('/store/discount') }}" class="form-horizontal" role="form">
                {{ csrf_field() }}
                
                    <div class="form-group row" id="form-margin-top">
                        <label for="name" class="col-md-3 control-label">รายการสินค้า</label>

                        <div class="col-md-6">
                            <select class="form-control" name="product_id">
                            @foreach($productsCreate as $product)
                                <option value="{{ $product->product_id }}">
                                    {{ $product->product_name }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-3 control-label">ตัวแทนจำหน่าย</label>

                        <div class="col-md-6">
                            <select class="form-control" name="dealer_id">
                                <option value="0">-- เลือกตัวแทนจำหน่าย --</option>
                                @foreach($dealersCreate as $dealer)
                                    <option value="{{ $dealer->dealer_id }}">
                                        {{ $dealer->dealer_name }}
                                    </option>
                                @endforeach
                            </select>

                            @if(Session::has('error'))
                                <span class="help-block" id="alert-error"> 
                                    <strong>{{ Session::get('error') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-3 control-label">จำนวน</label>

                        <div class="col-md-2">
                            <input type="number" name="discount_unit" class="form-control" required>
                        </div>
                        <div class="col-md-1" id="margin-top-percent">
                            <label class="control-label"><strong>ชิ้น</strong></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-3 control-label">ลด</label>

                        <div class="col-md-2">
                            <input type="number" name="discount_percent" class="form-control" required>
                        </div>
                        <div class="col-md-1" id="margin-top-percent">
                            <label class="control-label"><strong>%</strong></label>
                        </div>
                    </div>

                    <div class="form-group row" id="form-margin-top">
                        <div class="col-md-2 col-md-offset-5">
                            <button type="submit" class="btn btn-primary">
                                เพิ่มส่วนลดราคา
                            </button>
                        </div>
                    </div>

                </form>
            @endif
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@endsection