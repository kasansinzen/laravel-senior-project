@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">แก้ไขบัญชีธนาคาร</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-8">
        <div class="panel panel-default">  
            <div class="panel-heading">แบบฟอร์มแก้ไขบัญชีธนาคาร</div>
            <div class="panel-body">

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/store/payment') }}" 
                enctype="multipart/form-data">
                {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">ธนาคาร</label>

                        <div class="col-md-6">
                            <select name="payment_bank" class="form-control">
                                <option>-- เลือกธนาคาร --</option>
                                <option value="ธนาคารกุรงไทย">ธนาคารกุรงไทย</option>
                                <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                                <option value="ธนาคารกุรงเทพ">ธนาคารกุรงเทพ</option>
                                <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
                                <option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">เลขบัญชี</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="payment_accountno" required
                            value="{{ $paymentEdit->payment_accountno }}">
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">ชื่อบัญชี</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="payment_name" required
                            value="{{ $paymentEdit->payment_name }}">
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">รายละเอียด</label>

                        <div class="col-md-6">
                            <textarea class="form-control" name="payment_description" rows="5">{{ $paymentEdit->payment_description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            <button type="submit" class="btn btn-primary">
                                แก้ไขบัญชีธนาคาร
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