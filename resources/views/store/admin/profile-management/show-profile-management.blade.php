@extends('layouts.admin-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">ข้อมูลผู้ดูและระบบ</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">แสดงรายละเอียดข้อมูลผู้ดูแลระบบ</div>
            <div class="panel-body">
                <div class="col-md-3">
                    <div class="row form-group">
                        <img src="{{ Storage::url($userIndex->picture) }}" width="100%" height="250">
                    </div>
                    
                </div>

                <div class="col-md-9 panel panel-default" style="padding-top: 20px;">

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">ชื่อผู้ใช้</label>

                        <div class="col-md-10">
                            <p>{{ $userIndex->name }}</p>  
                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">อีเมลล์</label>

                        <div class="col-md-10">
                            <p>{{ $userIndex->email }}</p>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">สถานะใช้งาน</label>

                        <div class="col-md-10">
                            <p>ผู้ดูแลระบบ</p>
                        </div>
                    </div>
                <!-- /col-md-9 -->
                </div> 
            <!-- /.panel-body -->   
            </div>
        <!-- /.panel -->
        </div>
    <!-- /.row -->
    </div>

@endsection