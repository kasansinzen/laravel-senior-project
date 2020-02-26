@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">จัดการบัญชีธนาคาร</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-inbox fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $paymentCount }}</div>
                            <div>จำนวนบัญชีธนาคาร</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/store/payment/create') }}">
                    <div class="panel-footer">
                        <span class="pull-left">เพิ่มบัญชีธนาคาร</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-plus-sign"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        <!-- /.col-lg-3 col-md-6 -->
        </div> 
    <!-- /.row -->
    </div>

    <div class="row col-lg-12">
        <div class="panel panel-default">  
            <div class="panel-heading">ตารางข้อมูลบัญชีธนาคาร</div>
            <div class="panel-body">
            
                <div style="overflow-x:auto;">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ธนาคาร</th>
                                <th>เลขบัญชี</th>
                                <th>ชื่อบัญชี</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($paymentsIndex as $payment)
                            <tr>
                                <td>
                                @if($payment->payment_bank == 'ธนาคารกุรงไทย')
                                    <img src="/img/logo_ktb.png" height="50" width="50"> {{ $payment->payment_bank }}
                                @elseif($payment->payment_bank == 'ธนาคารไทยพาณิชย์')
                                    <img src="/img/logo_scb.png" height="50" width="50"> {{ $payment->payment_bank }}
                                @elseif($payment->payment_bank == 'ธนาคารกุรงเทพ')
                                    <img src="/img/logo_bbl.png" height="50" width="50"> {{ $payment->payment_bank }}
                                @elseif($payment->payment_bank == 'ธนาคารกสิกรไทย')
                                    <img src="/img/logo_kbank.png" height="50" width="50"> {{ $payment->payment_bank }}
                                @elseif($payment->payment_bank == 'ธนาคารกรุงศรีอยุธยา')
                                    <img src="/img/logo_bay.png" height="50" width="50"> {{ $payment->payment_bank }}
                                @elseif($payment->payment_bank == 'ธนาคารออมสิน')
                                    <img src="/img/logo_gsb.png" height="50" width="50"> {{ $payment->payment_bank }}
                                @endif
                                </td>
                                <td>{{ $payment->payment_accountno }}</td>
                                <td>{{ $payment->payment_name }}</td>
                                <td>
                                    <a href="/store/payment/{{ $payment->payment_id }}/edit">
                                        <button class="btn btn-warning">
                                        <span class="glyphicon glyphicon-cog"></span></button>
                                    </a>
                                </td>
                                <td>
                                    <form action="/store/payment/{{ $payment->payment_id }}" method="POST"
                                    onsubmit="return confirm('ยืนยันลบสินค้า')">
                                    {{ method_field('DELETE') }}
                                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                                        <button type="submit" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@endsection