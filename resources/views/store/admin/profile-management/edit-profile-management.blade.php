@extends('layouts.admin-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">แก้ไขข้อมูลผู้ดูและระบบ</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">แบบฟอร์มแก้ไขข้อมูลผู้ดูแลระบบ</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" 
                action="/store/admin/profile-management/{{ $userEdit->user_id }}" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">ชื่อ-นามสกุล</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" 
                            value="{{ $userEdit->name }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">อีเมลล์</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" 
                            value="{{ $userEdit->email }}" required>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">รูปภาพ</label>

                        <div class="col-md-6">
                            <img src="{{ Storage::url($userEdit->picture) }}" width="100" height="100">
                            <input id="picture" type="file" class="form-control" name="picture" accept="img/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            <button type="submit" class="btn btn-warning">
                                แก้ไขข้อมูลผู้ใช้
                            </button>
                        </div>
                    </div>
                </form> 
            <!-- /.panel-body -->    
            </div>
        <!-- /.panel -->
        </div>
    <!-- /.row -->
    </div>

@endsection