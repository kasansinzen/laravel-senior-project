@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">แก้ไขข้อมูลตัวแทนจำหน่าย</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-8">
        <div class="panel panel-default">  
            <div class="panel-heading">แบบฟอร์มแก้ไขข้อมูลตัวแทนจำหน่าย</div>
            <div class="panel-body">

                <form class="form-horizontal" role="form" method="POST" 
                action="/store/dealer/{{ $dealerEdit->dealer_id }}" enctype="multipart/form-data">
                {{ method_field('PUT') }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">ชื่อ-นามสกุล</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="dealer_name" 
                             value="{{ $dealerEdit->dealer_name }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">เบอร์โทรศัพท์</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="dealer_tel"
                            value="{{ $dealerEdit->dealer_tel }}">
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">อีเมลล์</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="dealer_email"
                            value="{{ $dealerEdit->dealer_email }}">
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">รูปภาพ</label>

                        <div class="col-md-6">
                            <img src="{{ Storage::url($dealerEdit->dealer_picture) }}" width="100" height="100">
                            <input type="file" class="form-control" name="dealer_picture" 
                            value="{{ $dealerEdit->dealer_picture }}" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            <button type="submit" class="btn btn-warning">
                                แก้ไขตัวแทนจำหน่าย
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