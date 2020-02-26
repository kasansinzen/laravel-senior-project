@extends('layouts.admin-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">รายละเอียดข้อมูลผู้ใช้งาน</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">แสดงายละเอียดข้อมูลผู้ใช้งาน</div>
            <div class="panel-body">
                <div class="col-md-3">
                    <div class="row form-group">
                        <img src="{{ Storage::url($user->picture) }}" width="100%" height="250">
                    </div>
                    
                </div>
                <div class="col-md-9 panel panel-default" style="padding-top: 20px;">

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">ชื่อผู้ใช้</label>

                        <div class="col-md-10">
                            <p>{{ $user->name }}</p>  
                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">อีเมลล์</label>

                        <div class="col-md-10">
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="row form-group">
                        <form method="post" action="/store/admin/user-management/{{ $user->user_id }}" 
                        onsubmit="return confirm('ยืนยันอัพเดทสถานะใช้งานของสมาชิก')">
                        {{ method_field('PUT') }}

                            <label id="txtLabelRight" class="col-md-2 control-label">ระดับใช้งาน</label>
                            <div class="col-md-4">
                                <select name="level_id" class="form-control">
                                @foreach($levels as $level)
                                    <option value="{{ $level->level_id }}"
                                    @if($user->level_id == $level->level_id)
                                        selected
                                    @endif >
                                        {{ $level->level_status }}
                                    </option>
                                @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                                <button type="submit" class="btn btn-warning">
                                    อัพเดทระดับ
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">ที่อยู่ร้านค้า</label>

                        <div class="col-md-10">
                        @if($shop)
                            <a target="_blank" href="{{ $shop }}">
                                {{ $shop }}
                            </a>
                        @else
                            <p id="p-shop-url">ผู้ใช้งานยังไม่มีร้านค้า</p>
                        @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">วันหมดโปร</label>

                        <div class="col-md-10">
                            {{ $dateEnd }}
                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="txtLabelRight" class="col-md-2 control-label">อายุการใช้งาน</label>

                        <div class="col-md-10">
                            {{ $diff }} วัน
                        </div>
                    </div>
                <!-- /col-md-9 -->
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panel -->
        </div>

        <div class="row" style="overflow-x:auto;">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">ตารางการชำระเงินค่าบริการระบบ</div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <tr id="head-table-tr-order">
                                <th>เลขบัญชี</th>
                                <th>ธนาคาร</th>
                                <th>ชื่อผู้โอน</th>
                                <th>วันที่โอน</th>
                                <th>เวลาโอน</th>
                                <th>จำนวนเงิน</th>
                            </tr>
                        @foreach($upgrades as $upgrade)
                            <tr>
                                <td>{{ $upgrade->upgrade_accountno }}</td>
                                <td>{{ $upgrade->upgrade_bank }}</td>
                                <td>{{ $upgrade->upgrade_name }}</td>
                                <td>{{ $upgrade->upgrade_date }}</td>
                                <td>{{ $upgrade->upgrade_time }}</td>
                                <td align="right">
                                    {{ number_format($upgrade->upgrade_amount,2) }}
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <th colspan="5" id="foot-table-tr-result">รวมทั้งหมด</th>
                                <th id="foot-table-result">
                                    {{ number_format($total,2) }}
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <!-- /.row -->                
        </div>
    <!-- /.row -->
    </div>

@endsection