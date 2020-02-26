@extends('layouts.user-master')
    
@section('content')

    <meta name="csrf_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">จัดการสินค้า</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-inbox fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $productCount }}</div>
                            <div>จำนวนสินค้า</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/store/product/create') }}">
                    <div class="panel-footer">
                        <span class="pull-left">เพิ่มสินค้า</span>
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
            <div class="panel-heading">ตารางข้อมูลสินค้า</div>
            <div class="panel-body">
                <div class="row">
                    <form method="GET" action="/store/select-producttype">  
                        <div class="input-group custom-search-form col-md-3 col-md-offset-9">
                            <select name="producttype_id" id="select-product-store" class="form-control">
                                <option value="0">-- เลือกประเภทสินค้า --</option>
                        @if($ptChecking)
                            @foreach($producttypesIndex as $producttype)
                                <option value="{{ $producttype->producttype_id }}"
                                @if($ptChecking->producttype_id == $producttype->producttype_id)
                                    selected
                                @endif >
                                    {{ $producttype->producttype_name }}
                                </option>
                            @endforeach
                        @else
                            @foreach($producttypesIndex as $producttype)
                                <option value="{{ $producttype->producttype_id }}">
                                    {{ $producttype->producttype_name }}
                                </option>
                            @endforeach
                        @endif
                            </select>

                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="row" style="overflow-x:auto;">
                    <table id="result" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="45%">ชื่อสินค้า</th>
                                <th width="10%">จำนวน</th>
                                <th width="10%">ราคา</th>
                                <th width="15%">ประเภทสินค้า</th>
                                <th width="10%">แก้ไข</th>
                                <th width="10%">ลบ</th>
                            </tr>
                        </thead>

                        <tbody id="getProductStore">
                        @foreach ($productsIndex as $rows)
                            <tr>
                                <td>
                                    <a href="/store/product/{{ $rows->product_id }}">
                                        {{$rows->product_name}}
                                    </a>
                                </td>
                                <td>{{ $rows->product_unit }}</td>
                                <td>{{ number_format($rows->product_price,2) }}</td>
                                <td>{{ $rows->producttype->producttype_name }}</td>
                                <td>
                                    <a href="/store/product/{{ $rows->product_id }}/edit">
                                        <button class="btn btn-warning">
                                        <span class="glyphicon glyphicon-cog"></span></button>
                                    </a>
                                </td>
                                <td>
                                    <form action="/store/product/{{ $rows->product_id }}" method="POST"
                                    onsubmit="return confirm('ยืนยันลบสินค้า')">
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
                    <div class="pagination"> {{ $productsIndex->links() }} </div>
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@endsection