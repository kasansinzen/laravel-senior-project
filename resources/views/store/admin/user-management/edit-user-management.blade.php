@extends('layouts.admin-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">แก้ไขผู้ใช้งาน</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">แบบฟอร์มแก้ไขผู้ใช้งาน</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                action="/store/admin/user-management/{{ $user->user_id }}">
                {{ method_field('PUT') }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">ชื่อ-นามสกุล</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" 
                            value="{{ $user->name }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">อีเมลล์</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" 
                            value="{{ $user->email }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">รูปภาพ</label>

                        <div class="col-md-6">
                            <img src="{{ Storage::url($user->picture) }}" width="100" height="100">
                            <input type="file" class="form-control" name="picture" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            <button type="submit" class="btn btn-warning">
                                แก้ไขข้อมูลสมาชิก
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
