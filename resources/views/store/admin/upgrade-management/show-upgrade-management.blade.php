@extends('layouts.admin-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">รายละเอียดรายการชำระค่าบริการระบบ</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">แสดงข้อมูลรายละเอียดรายการชำระค่าบริการระบบ</div>
            <div class="panel-body">
                <div class="col-lg-4">
                    <div class="row">
                        <img src="{{ Storage::url($upgrade->upgrade_picture) }}" width="350" height="450">
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="row panel panel-default" style="padding-top: 20px;">
                            <div class="row form-group">
                                <label id="txtLabelRight" class="col-md-2 control-label">รหัสผู้ใช้งาน</label>

                                <div class="col-md-10">
                                    <p>{{ sprintf('%04d', $upgrade->user_id) }}</p>  
                                </div>
                            </div>

                            <div class="row form-group">
                                <label id="txtLabelRight" class="col-md-2 control-label">ชื่อผู้ใช้งาน</label>

                                <div class="col-md-10">
                                    <p>{{ $upgrade->users->name }}</p>  
                                </div>
                            </div>

                            <div class="row form-group">
                                <label id="txtLabelRight" class="col-md-2 control-label">เลขบัญชี</label>

                                <div class="col-md-10">
                                    <p>{{ $upgrade->upgrade_accountno }}</p>  
                                </div>
                            </div>

                            <div class="row form-group">
                                <label id="txtLabelRight" class="col-md-2 control-label">จำนวนเงิน</label>

                                <div class="col-md-10">
                                    <p>{{ number_format($upgrade->upgrade_amount, 2) }} บาท</p>  
                                </div>
                            </div>

                            <div class="row form-group">
                                <label id="txtLabelRight" class="col-md-2 control-label">ชื่อผู้โอน</label>

                                <div class="col-md-10">
                                    <p>{{ $upgrade->upgrade_name }}</p>  
                                </div>
                            </div>

                            <div class="row form-group">
                                <label id="txtLabelRight" class="col-md-2 control-label">วันที่โอน</label>

                                <div class="col-md-10">
                                    <p>{{ $upgrade->upgrade_date }}</p>  
                                </div>
                            </div>

                            <div class="row form-group">
                                <label id="txtLabelRight" class="col-md-2 control-label">เวลาโอน</label>

                                <div class="col-md-10">
                                    <p>{{ $upgrade->upgrade_time }}</p>  
                                </div>
                            </div>
                    <!-- /.row -->
                    </div>
                <!-- /.col-lg-8 -->
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panel -->
        </div>
    </div>

@endsection