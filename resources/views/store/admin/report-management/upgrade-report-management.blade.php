@extends('layouts.admin-master')

@section('content')

    <div class="row">
        <div class="col-lg-11">
            <h2 class="page-header">รายงานการสั่งซื้อทั้งหมด</h2>
        </div>
        <div class="col-md-1"  id="page-print">
            <button class="btn btn-default" onclick="printPage()">
                <span class="glyphicon glyphicon-print"></span>
            </button>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">แสกดงรายงานการสั่งซื้อทั้งหมด</div>
                <div class="panel-body">

                @foreach($upgrades as $upgrade)
                    <label class="control-label">วันที่บันทึก</label>
                            {{ $upgrade->created_at }}
                    <div style="overflow-x:auto;">
                        <table class="table table-hover">
                            <tr id="head-table-tr-order">
                                <th>เลขบัญชี</th>
                                <th>ธนาคาร</th>
                                <th>จำนวนเงิน</th>
                                <th>ชื่อผู้โอน</th>
                                <th>วันที่โอน</th>
                                <th>เวลาโอน</th>
                            </tr>
                            <tr>
                                <td>{{ $upgrade->upgrade_accountno }}</td>
                                <td>{{ $upgrade->upgrade_bank }}</td>
                                <td align="right">
                                    {{ number_format($upgrade->upgrade_amount,2) }}
                                </td>
                                <td>{{ $upgrade->upgrade_name }}</td>
                                <td>{{ $upgrade->upgrade_date }}</td>
                                <td>{{ $upgrade->upgrade_time }}</td>
                            </tr>
                        </table><hr>
                    </div>
                @endforeach
                <!-- /.panel-body -->    
                </div>
            <!-- /.panal -->
            </div>
        <!-- /.col-lg-8 -->
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-piggy-bank fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{ number_format($total,2) }} ฿</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <span class="pull-left">ยอดรวมรายการชำระทั้งหมด</span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        <!-- /.col-lg-4 col-md-6-->
        </div> 
    <!-- /.row -->
    </div>

    <script type="text/javascript">
        function printPage(){
            window.print();
        }
    </script>

@endsection