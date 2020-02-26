@extends('layouts.admin-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">จัดการรายการชำระค่าบริการระบบ</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">ตารางข้อมูลรายการชำระค่าบริการระบบ</div>
            <div class="panel-body">
                <div style="overflow-x:auto;">
                     <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>รหัส</th>
                                <th>ชื่อผู้ใช้</th>
                                <th>จำนวนชำระ</th>
                                <th>วันที่บันทึก</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($upgrades as $upgrade)
                                <tr>
                                    <td>
                                        <a href="/store/admin/upgrade-management/{{ $upgrade->upgrade_id }}">
                                            {{ sprintf('%04d', $upgrade->upgrade_id) }}
                                        </a>
                                    </td>
                                    <td>{{ $upgrade->users->name }}</td>
                                    <td>{{ number_format($upgrade->upgrade_amount,2) }}</td>
                                    <td>{{ $upgrade->created_at }}</td>
                                    <td>
                                        <form action="/store/admin/upgrade-management/{{ $upgrade->upgrade_id }}"
                                        method="POST" onsubmit="return confirm('ยืนยันการลบรายการบริการระบบ')">
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
                    <div class="pagination"> {{ $upgrades->links() }} </div>
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panel -->
        </div>
    <!-- /.row -->
    </div>

@endsection