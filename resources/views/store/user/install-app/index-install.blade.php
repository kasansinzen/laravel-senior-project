@extends('layouts.user-master')

@section('content')

	<div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">ติดตั้งร้านค้า</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-12">
        <div class="panel panel-default"> 
            <div class="panel-heading">การจัดการร้านค้า Facebook</div>
            <div class="panel-body">

            	<div class="row">
            		<div class="col-lg-12">
            			<div class="form-group" id="text-install">
            				<p><img src="/img/logo-facebook.png" height="80" width="80"></p>
            				<p><h3><strong>ติดตั้งร้านค้าของคุณบน Facebook</strong></h3></p>
            			</div>
            		</div>
            	</div>

            	<div class="row">
			    	<div class="col-lg-4 col-lg-offset-4">
			    		<div class="form-group">
				    		<div class="btn-group btn-group-justified">
				    			<a href="https://www.facebook.com/v2.6/dialog/pagetab?app_id=290916661326289&redirect_uri=https://kasansin-project2.000webhostapp.com/shop/{{ $user }}/" target="_blank" class="btn btn-primary btn-lg">ติดตั้งร้านค้าบน Facebook</a>
				    		</div>
			    		</div>
			    	</div>
			    </div>

            </div>
        </div>
    </div>

@endsection