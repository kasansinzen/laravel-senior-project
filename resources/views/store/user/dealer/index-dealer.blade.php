@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">ตัวแทนจำหน่าย</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

@if($user->level_id == $level_id)

<div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $dealerCount }}</div>
                            <div>จำนวนตัวแทนจำหน่าย</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/store/dealer/create') }}">
                    <div class="panel-footer">
                        <span class="pull-left">เพิ่มตัวแทนจำหน่าย</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-plus-sign"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        <!-- /.col-lg-3 col-md-6 -->
        </div> 
    <!-- /.row -->
    </div>

    <div class="row col-lg-12">
        <div class="panel panel-default">  
            <div class="panel-heading">ตารางข้อมูลตัวแทนจำหน่าย</div>
            <div class="panel-body">
                <div style="overflow-x:auto;">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ชื่อตัวแทนจำหน่าย</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>อีเมลล์</th>
                                <th>วันที่สมัคร</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($dealers as $dealer)
                                <tr>
                                    <td>
                                        <a href="/store/dealer/{{ $dealer->dealer_id }}">
                                            {{ $dealer->dealer_name }}
                                        </a>
                                    </td>
                                    <td>{{ $dealer->dealer_tel }}</td>
                                    <td>{{ $dealer->dealer_email }}</td>
                                    <td>{{ $dealer->created_at }}</td>

                                    <td>
                                        <a href="/store/dealer/{{ $dealer->dealer_id }}/edit">
                                            <button class="btn btn-warning">
                                            <span class="glyphicon glyphicon-cog"></span></button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="/store/dealer/{{ $dealer->dealer_id }}" method="POST"
                                        onsubmit="return confirm('ยืนยันลบตัวแทนจำหน่าย')">
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
                    <div class="pagination"> {{ $dealers->links() }} </div>
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@else
    
    <div class="alert alert-danger">
        <strong>ไม่สามารถใช้งานได้</strong> เนื่องจากสถานะการใช้งานถูกจำกัด
    </div>

@endif

@endsection