@extends('layouts.admin-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">แก้ไขข่าวสาร</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">แบบฟอร์มแก้ไขข้อมูลข่าวสาร</div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data" 
                action="/store/admin/news-management/{{ $news->news_id }}">
                {{ method_field('PUT') }}     

                    <div class="form-group">
                        <label for="name" class="col-md-2 control-label">หัวข้อข่าว</label>
                        <div class="col-md-8">
                            <input type="text" name="news_header" class="form-control" required
                            value="{{ $news->news_header }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">เนื้อหา</label>
                        <div class="col-md-8">
                            <textarea name="news_content" class="form-control" rows="10"
                            required>{{ $news->news_content }}"</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">รูปภาพ</label>
                        <div class="col-md-8">
                            <img src="{{ Storage::url($news->news_picture) }}" width="100" height="100">
                           <input type="file" name="news_picture" class="form-control" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label"></label>
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                        <button type="submit" class="btn btn-warning">
                            แก้ไขข่าวสาร
                        </button>
                    </div>

                    </form>
            <!-- /.panel-body --> 
            </div>
        <!-- /.panel -->    
        </div>

@endsection
                        