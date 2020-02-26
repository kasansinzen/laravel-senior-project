@extends('layouts.admin-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">เพิ่มข่าวสาร</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">แบบฟอร์มเพิ่มข้อมูลข่าวสาร</div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="/store/admin/news-management"
                enctype="multipart/form-data">
                {{ csrf_field() }}     

                    <div class="form-group">
                        <label for="name" class="col-md-2 control-label">หัวข้อข่าว</label>
                        <div class="col-md-8">
                            <input type="text" name="news_header" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">เนื้อหา</label>
                        <div class="col-md-8">
                            <textarea name="news_content" class="form-control" rows="10"
                            required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">รูปภาพ</label>
                        <div class="col-md-8">
                           <input type="file" name="news_picture" class="form-control"
                           accept="image/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label"></label>
                        <button type="submit" class="btn btn-primary">
                            เพิ่มข่าวสาร
                        </button>
                    </div>

                    </form>
            <!-- /.panel-body --> 
            </div>
        <!-- /.panel -->    
        </div>

@endsection