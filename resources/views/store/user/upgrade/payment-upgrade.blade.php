@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">อัพเกรดการใช้งาน แบบเต็มคุณภาพ</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-8">
        <div class="panel panel-default"> 
            <div class="panel-heading">สมัครการใช้งานแบบเต็มคุณภาพ</div>
            <div class="panel-body">

                <div class="form-group row">
                    <div class="col-md-12">
                        <h4>ใช้งานเต็มคุณภาพ</h4>
                            <p id="margin-left-content">- เพิ่มสินค้าได้ไม่จำกัด</p>
                            <p id="margin-left-content">- ติดตั้งหน้าร้านเข้ากับ Page Facebook</p>
                            <p id="margin-left-content">- แชร์สินค้าลง Facebook ได้</p>
                            <p id="margin-left-content">- เพิ่มตัวแทนจำหน่ายสินค้า</p>
                            <p id="margin-left-content">- ตรวจสอบรายการสั่งซื้อจากลูกค้า</p>
                            <p id="margin-left-content">- ส่งข้อมูลยืนยันผ่าน Facebook Messenger</p>
                            <p id="margin-left-content">- ตรวจสอบรายงานการขายสินค้าทั้งหมดได้</p>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-6">
                        <a href="/store/upgrade-level/payment/confirm">
                            <button class="btn btn-warning">
                                อัพเกรด
                            </button>
                        </a>
                        
                        <button class="btn btn-danger">
                            ยกเลิก
                        </button>
                    </div>
                </div>            
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@endsection