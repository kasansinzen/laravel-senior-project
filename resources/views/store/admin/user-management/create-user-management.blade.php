@extends('layouts.admin-master')

@section('content')

   <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">เพิ่มผู้ใช้งาน</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">แบบฟอร์มเพิ่มผู้ใช้งาน</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" 
                action="/store/admin/user-management" enctype="multipart/form-data">
                {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">ชื่อ-นามสกุล</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" 
                            value="{{ old('name') }}" required autofocus>

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
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">รหัสผ่าน</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">ยืนยันรหัสผ่าน</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">รูปภาพ</label>

                        <div class="col-md-6">
                            <input id="picture" type="file" class="form-control" name="picture" required autofocus>

                            @if ($errors->has('picture'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('picture') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                เพิ่มข้อมูลสมาชิก
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
