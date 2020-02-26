@extends('layouts.user-master')

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">ข้อมูลผู้ใช้</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-12">
        <div class="panel panel-default">  
            <div class="panel-heading">รายละเอียดข้อมูลผู้ใช้</div>
            <div class="panel-body">
                
                <div class="col-md-3">
                    <div class="row form-group">
                        <img src="{{ $urlPic }}" width="100%" height="250">
                    </div>
                    
                </div>

                <div class="col-md-9">
                    <div class="row panel panel-default" style="padding-top: 20px;">
                        <div class="row form-group">
                            <label id="txtLabelRight" class="col-md-3 control-label">ชื่อผู้ใช้</label>

                            <div class="col-md-9">
                                <p>{{ $userIndex->name }}</p>  
                            </div>
                        </div>

                        <div class="row form-group">
                            <label id="txtLabelRight" class="col-md-3 control-label">อีเมลล์</label>

                            <div class="col-md-9">
                                <p>{{ $userIndex->email }}</p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label id="txtLabelRight" class="col-md-3 control-label">สถานะใช้งาน</label>

                            <div class="col-md-9">
                                <p>{{ $userIndex->level->level_status }}</p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label id="txtLabelRight" class="col-md-3 control-label">วันหมดอายุการใช้งาน</label>

                            <div class="col-md-9">
                                <p>{{ $dateEnd }}</p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label id="txtLabelRight" class="col-md-3 control-label">อายุการใช้งาน</label>

                            <div class="col-md-9">
                                <p>{{ $diff }} วัน</p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label id="txtLabelRight" class="col-md-3 control-label">ที่อยู่ร้านค้า</label>

                            <div class="col-md-9">
                            @if($shop)
                                <a target="_blank" href="{{ $shop }}">
                                    {{ $shop }}
                                </a>
                            @else
                                <p>
                                    ผู้ใช้งานยังไม่มีร้านค้า
                                </p>
                            @endif
                            </div>
                        </div>
                    <!-- /.row -->
                    </div>
                <!-- /col-md-9 -->
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

    <div class="row col-lg-12">
        <div class="panel panel-default">  
            <div class="panel-heading">ตารางข้อมูลการชำระค่าบริการ</div>
            <div class="panel-body">
                <div style="overflow-x:auto;">
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
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@endsection