@extends('layouts.admin-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">จัดการข่าวสาร</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-list-alt fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $newsCount }}</div>
                            <div>ข่าวสารทั้งหมด</div>
                        </div>
                    </div>
                </div>
                <a href="/store/admin/news-management/create">
                    <div class="panel-footer">
                        <span class="pull-left">เพิ่มข่าวสาร</span>
                        <span class="pull-right"><i class="fa fa-plus"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div> 
    <!-- /.row -->
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">ตารางข้อมูลข่าวสาร</div>
            <div class="panel-body">
                <div style="overflow-x:auto;">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>หัวข้อ</th>
                                <th>วันที่บันทึก</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($newss as $news)
                            <tr>
                                <td>
                                    <a href="/store/admin/news-management/{{ $news->news_id }}">
                                        {{ $news->news_header }}
                                    </a>
                                </td>
                                <td>{{ $news->created_at }}</td>
                                <td>
                                    <a href="/store/admin/news-management/{{ $news->news_id }}/edit">
                                        <button class="btn btn-warning">
                                        <span class="glyphicon glyphicon-cog"></span></button>
                                    </a>
                                </td>
                                <td>
                                    <form action="/store/admin/news-management/{{ $news->news_id }}"
                                    method="POST" onsubmit="return confirm('ยืนยันการลบข้อมูลข่าวสาร')">
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
                <div class="col-md-4 col-md-offset-5">
                    <div class="pagination"> {{ $newss->links() }} </div>
                </div>
            <!-- /.panel-body --> 
            </div>
        <!-- /.panel -->    
        </div>
    </div>

@endsection