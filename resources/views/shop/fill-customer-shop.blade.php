@extends('layouts.shop-master')

@section('content')

    <form method="get" action="/shop/{{ Session::get('user') }}/confirm-order">
    {{ csrf_field() }}
    
        <div class="row">
            <div class="form-group" id="text-margin">
                <label class="col-md-2 col-md-offset-2 control-label">ชื่อ-นามสกุล</label>

                <div class="col-md-5">
                    <input type="text" class="form-control" name="customer_name" 
                    value="{{ old('customer_name') }}" required autofocus>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group" id="text-margin">
                <label class="col-md-2 col-md-offset-2 control-label">ที่อยู่</label>

                <div class="col-md-5">
                    <textarea class="form-control" name="customer_address">{{ old('customer_address') }}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group" id="text-margin">
                <label class="col-md-2 col-md-offset-2 control-label">รหัสไปรษณีย์</label>

                <div class="col-md-5">
                    <input type="text" class="form-control" name="customer_postcode" 
                    value="{{ old('customer_postcode') }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group" id="text-margin">
                <label class="col-md-2 col-md-offset-2 control-label">อีเมลล์</label>

                <div class="col-md-5">
                    <input type="email" class="form-control" name="customer_email" 
                    value="{{ old('customer_email') }}" required>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group" id="text-margin">
                <label class="col-md-2 col-md-offset-2 control-label">เบอร์โทรศัพท์</label>

                <div class="col-md-5">
                    <input type="text" class="form-control" name="customer_tel" 
                    value="{{ old('customer_tel') }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group" id="btn-next-margin">
                <div class="col-md-6 col-md-offset-5 col-sm-6 col-sm-offset-5 col-xs-6 col-xs-offset-5">
                    <button type="submit" class="btn btn-primary" style="width: 35%;">
                        ต่อไป
                    </button>
                </div>
            </div>
        </div>
        

    </form>

@endsection