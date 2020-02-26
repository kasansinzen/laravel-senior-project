@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">แก้ไขประเภทสินค้า</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-8">
        <div class="panel panel-default">  
            <div class="panel-heading">แบบฟอร์มแก้ไขประเภทสินค้า</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" 
                action="/store/producttype/{{ $producttypeEdit->producttype_id }}">
                {{method_field('PUT')}}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">ชื่อประเภทสินค้า</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="producttype_name" 
                            value="{{$producttypeEdit->producttype_name}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            <button type="submit" class="btn btn-warning">
                                แก้ไขประภทสินค้า
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