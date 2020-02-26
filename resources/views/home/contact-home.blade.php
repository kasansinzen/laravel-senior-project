@extends('layouts.app')

@section('content')

	<div class="container" id="body-container">
        
        <div class="col-md-3">
            <div class="row form-group">
                <div class="client_profile_pic"><img src="/pic/contact-pic.jpg" alt=""></div>
            </div>
            
        </div>

        <div class="col-md-9">

        	<div class="row form-group">
                <h4><label class="col-md-10 control-label">ข้อมูลติดต่อ</label></h4>
            </div>

            <div class="row form-group">
                <label id="label-right" class="col-md-2 control-label">ชื่อ-นามสกุล</label>

                <div class="col-md-10">
                    <p>กสานติ์ศิลป์ คำสัตย์</p>  
                </div>
            </div>

            <div class="row form-group">
                <label id="label-right" class="col-md-2 control-label">เบอร์โทรศัพท์</label>

                <div class="col-md-10">
                	<p>087-9622088</p>
                </div>
            </div>

            <div class="row form-group">
                <label id="label-right" class="col-md-2 control-label">อีเมลล์</label>

                <div class="col-md-10">
                	<p>kasansin_first@hotmail.com</p>
                </div>
            </div>

            <div class="row form-group">
                <label id="label-right" class="col-md-2 control-label">Facebook</label>

                <div class="col-md-10">
                	<p><a href="https://www.facebook.com/xaozeed">https://www.facebook.com/xaozeed</a></p>
                </div>
            </div>

            <div class="row form-group">
                <label id="label-right" class="col-md-2 control-label">Line</label>

                <div class="col-md-10">
                	<img src="/pic/line-qr-code.jpg" width="250" height="250">
                </div>
            </div>
            <hr>

            <div class="row form-group">
                <h4><label class="col-md-10 control-label">การศึกษา</label></h4>
            </div>

            <div class="row form-group">
                <label id="label-right" class="col-md-2 control-label">สาขา</label>

                <div class="col-md-10">
                    <p>เทคโนโลยีสารสนเทศ</p>
                </div>
            </div>

            <div class="row form-group">
                <label id="label-right" class="col-md-2 control-label">คณะ</label>

                <div class="col-md-10">
                	<p>วิทยาการสารสนเทศ</p>
                </div>
            </div>

            <div class="row form-group">
                <label id="label-right" class="col-md-2 control-label">สถานศึกษา</label>

                <div class="col-md-10">
                	<p>มหาวิทยาลัยมหาสารคาม</p>
                </div>
            </div>

            <div class="row form-group">
                <label id="label-right" class="col-md-2 control-label">รหัสนิสิต</label>

                <div class="col-md-10">
                    <p>56011224016</p>
                </div>
            </div>
            <hr>
        <!-- /col-md-9 -->
        </div>
	</div>

@include('layouts.inc-footer')

@endsection