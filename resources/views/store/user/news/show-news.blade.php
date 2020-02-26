@extends('layouts.user-master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">รายละเอียดข่าวสาร</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">แสดงรายละเอียดข้อมูลข่าวสาร</div>
            <div class="panel-body">
                <!-- Show --> 
                <div class="col-md-4">
                    <div class="form-group">
                        <img src="{{ Storage::url($news->news_picture) }}" width="100%" height="250">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group col-md-12">
                        <label><p><h4>{{ $news->news_header }}</h4></p></label>
                        <p>{{ $news->news_content }}</p>
                        
                    </div>
                </div>
            <!-- /.panel-body --> 
            </div>
        <!-- /.panel --> 
        </div>

@endsection