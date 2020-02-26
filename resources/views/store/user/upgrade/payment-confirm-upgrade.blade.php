@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">สั่งซื้ออัพเกรดการใช้งาน</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-8">
        <div class="panel panel-default"> 
            <div class="panel-heading">แบบฟอร์มสั่งซื้ออัพเกรดการใช้งาน</div>
            <div class="panel-body">
            
                <form class="form-horizontal" role="form" method="POST" 
                action="{{ url('/store/upgrade-level/payment/confirm') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                    
                    <p><label class="control-label"><h4>ข้อมูลชำระเงิน</h4></label></p>
                    <div class="form-group">
                        <label class="col-md-10">
                            <p id="margin-left-content">ธนาคาร ไทยพาณิช</p>
                            <p id="margin-left-content">เลขบัญชี 202-401540-81</p>
                            <p id="margin-left-content">ชื่อบัญชี นายกสานติ์ศิลป์ คำสัตย์</p>
                        </label>
                    </div>

                    <div class="form-group">
                        <hr>
                    </div>

                    <p><label class="control-label"><h4>วิธีชำระเงิน</h4></label></p>
                    <div class="form-group">
                        <label class="col-md-10">
                            <p id="margin-left-content">1. ตรวจสอบยอดเงินที่ต้องชำระ และชำระเงินตามยอดผ่านธนาคาร </p>
                            <p id="margin-left-content">2. กรอกข้อมูลยืนยันการชำระตามแบบฟอร์มข้างล่าง </p>
                            <p id="margin-left-content">3. รอตรวจสอบความถูกต้อง เพื่ออัพเกรดการใช้งาน </p>
                        </label>
                    </div>

                    <div class="form-group">
                        <hr>
                    </div>
                    
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">ธนาคาร</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="upgrade_bank" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">เลขบัญชีผู้โอน</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="upgrade_accountno" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">จำนวนเงิน</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="upgrade_amount" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">รูปสลิป</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control" name="upgrade_picture" 
                            accept="image/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">ชื่อผู้โอน</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="upgrade_name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">วันที่โอน</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="upgrade_date" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">เวลาโอน</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="upgrade_time" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            <button type="submit" class="btn btn-primary">
                                ยืนยันข้อมูลชำระเงิน
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