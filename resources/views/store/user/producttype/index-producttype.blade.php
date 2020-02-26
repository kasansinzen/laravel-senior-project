@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">ประเภทสินค้า</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-md-12">
        <form action="{{ url('/store/producttype') }}" method="post">
        {{ csrf_field() }}
            <div class="form-group">
                <div class="col-md-2">
                    <label class="control-label">เพิ่มประเภทสินค้า</label>
                </div>
                <div class="col-md-3" style="margin: 0px -30px 10px;">
                    <input type="text" class="form-control" name="producttype_name" required>
                </div>
                <div class="col-md-2" style="margin-left: 10px;">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus">
                    </span></button>
                </div>
            </div>
        </form>
    </div>

    <div class="row col-lg-10">
        <div class="panel panel-default">  
            <div class="panel-heading">ตารางข้อมูลประเภทสินค้า</div>
            <div class="panel-body">

                <div style="overflow-x:auto;">
                    
                    
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="80%">ชื่อประเภทสินค้า</th>
                                <th width="10%">แก้ไข</th>
                                <th width="10%">ลบ</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($producttypesIndex as $producttype)
                            <tr>
                                <td>{{$producttype->producttype_name}}</td>
                                <td>
                                    <a href="/store/producttype/{{ $producttype->producttype_id }}/edit">
                                        <button class="btn btn-warning">
                                        <span class="glyphicon glyphicon-cog"></span></button>
                                    </a>
                                </td>
                                <td>
                                    <form action="/store/producttype/{{ $producttype->producttype_id }}" method="POST"
                                    onsubmit="return confirm('ยืนยันลบประเภทสินค้า')">
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
                    <div class="pagination"> {{ $producttypesIndex->links() }} </div>
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@endsection