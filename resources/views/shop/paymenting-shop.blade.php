@extends('layouts.shop-master')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-12"><h2><label>วิธีการชำระเงิน</label></h2></div>
            </div>

            <div class="row col-md-12">
                <div class="panel panel-default">
                    <div class="form-horizontal" id="padding-paymenting">
                    @foreach($payments as $payment)
                        <div class="row form-group">
                            <div class="col-md-2 col-sm-2 col-xs-4 control-img">
                                @if($payment->payment_bank == 'ธนาคารกุรงไทย')
                                    <img src="/img/logo_ktb.png" height="100" width="100">
                                @elseif($payment->payment_bank == 'ธนาคารไทยพาณิชย์')
                                    <img src="/img/logo_scb.png" height="100" width="100">
                                @elseif($payment->payment_bank == 'ธนาคารกุรงเทพ')
                                    <img src="/img/logo_bbl.png" height="100" width="100">
                                @elseif($payment->payment_bank == 'ธนาคารกสิกรไทย')
                                    <img src="/img/logo_kbank.png" height="100" width="100">
                                @elseif($payment->payment_bank == 'ธนาคารกรุงศรีอยุธยา')
                                    <img src="/img/logo_bay.png" height="100" width="100">
                                @elseif($payment->payment_bank == 'ธนาคารออมสิน')
                                    <img src="/img/logo_gsb.png" height="100" width="100">
                                @endif
                            </div>
                            <div class="col-md-5 col-sm-6 col-xs-8">
                                <div class="row form-group">
                                    <label class="col-md-4  control-label">ธนาคาร</label>
                                    <p class="col-md-6 control-p">{{ $payment->payment_bank }}</p>
                                </div>

                                <div class="row form-group">
                                    <label class="col-md-4 control-label">เลขัญชี</label>
                                    <p class="col-md-6 control-p">{{ $payment->payment_accountno }}</p>
                                </div>

                                <div class="row form-group">
                                    <label class="col-md-4 control-label">ชื่อบัญชี</label>
                                    <p class="col-md-6 control-p">{{ $payment->payment_name }}</p>
                                </div>
                                <hr>
                            </div>
                        </div>
                        
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection