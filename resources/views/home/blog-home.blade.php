@extends('layouts.app')

@section('content')

	
	<div class="container">
		@foreach($newss as $news)
		<div id="blog-form">
			<div class="form-group col-md-4">
				<div class="row form-group">
					<img src="{{ $news->news_picture }}" width="100%" height="250">
				</div>
			</div>

			<div class="col-md-8">
				<div class="row form-group">
					<div class="col-md-12">
						<h4><label>{{ $news->news_header }}</label></h4>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						{{ $news->news_content }}
					</div>
				</div>
			</div>
		<!-- /form-group -->
		</div>
		@endforeach
	</div>

@include('layouts.inc-footer')

@endsection