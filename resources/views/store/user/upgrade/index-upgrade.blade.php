@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">อัพเกรดการใช้งาน</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="panel panel-default">  
            <div class="panel-heading">อัพเกรดการใช้งาน</div>
            <div class="panel-body">

                <div >
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4><label>ทดลองใช้งานฟรี</label></h4><hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-9 col-xs-offset-1">
                                    <div id="show-upgrade">
                                        ฟรีบันทึกสินค้า และแสดงหน้าร้าน
                                    </div>
                                    <p style="text-align: center;"><label>0 บาท/เดือน</label></p>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/store/upgrade-level/free') }}">
                            <div class="panel-footer">
                                <span class="pull-left"><h4>สั่งซื้อ</h4></span>
                                <span class="pull-right"><h4><i class="glyphicon glyphicon-arrow-right"></i></h4></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                <!-- /.col-lg-3 col-md-6 -->
                </div> 
            
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4><label>เต็มคุณภาพใช้งาน</label></h4><hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-9 col-xs-offset-1">
                                    <div id="show-upgrade">
                                        บันทึกสินค้า บันทึกตัวแทนจำหน่าย กำหนดส่วนลดตัวแทนจำหน่าย ส่งข้อความผ่าน messenger ได้ และแสดงหน้าร้าน
                                    </div>
                                    <p style="text-align: center;"><label>500 บาท/เดือน</label></p>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/store/upgrade-level/payment') }}">
                            <div class="panel-footer">
                                <span class="pull-left"><h4>สั่งซื้อ</h4></span>
                                <span class="pull-right"><h4><i class="glyphicon glyphicon-arrow-right"></i></h4></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                <!-- /.col-lg-3 col-md-6 -->
                </div> 
                </div>

                
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@endsection