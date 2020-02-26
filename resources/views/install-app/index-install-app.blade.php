@extends('layouts.sender-master')

	<style type="text/css">
		#background-install-app{
			width: 100%;
			height: 600;
			background-color: gray;
		}
		#btn-install{
			margin-top: -80px;
			width: 100%;
			font-family: 'JasmineUPC';
			font-size: 40;
		}
	</style>

@section('content')

	<div class="row">
		<div class="col-lg-12" id="background-install-app">
			<img src="/pic/bg-install.png" width="100%" height="100%">
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-lg-offset-4">
			<a id="app-link">
				<button class="btn btn-warning btn-lg" id="btn-install">
					ติดตั้งแอพพลิเคชั่น
				</button>
			</a>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
    		$('#app-link').click(function(){
        		FB.ui({
				 	method: 'pagetab',
					redirect_uri: 'https://kasansin-project2.000webhostapp.com/shop//'
				}, function(response){});
	    	});
		});
	</script>

@endsection