@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">ลูกค้า</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $customerCount }}</div>
                        </div>
                    </div>
                </div>
                <a href="/store/customer">
                    <div class="panel-footer">
                        <span class="pull-left">ลูกค้าทั้งหมด</span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div> 
    <!-- /.row -->
    </div>

    <div class="row col-lg-10">
        <div class="panel panel-default">  
            <div class="panel-heading">ตารางข้อมูลลูกค้า</div>
            <div class="panel-body">
                <div style="overflow-x:auto;">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="40%">ชื่อลูกค้า</th>
                                <th width="20%">เบอร์โทรศัพท์</th>
                                <th width="20%">อีเมลล์</th>
                                <th width="20%">วันที่บันทึก</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($customersIndex as $customer)
                                <tr>
                                    <td>
                                        <a href="/store/customer/{{ $customer->customer_id }}">
                                            {{ $customer->customer_name }}
                                        </a>
                                    </td>
                                    <td>{{ $customer->customer_tel }}</td>
                                    <td>{{ $customer->customer_email }}</td>
                                    <td>{{ $customer->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4 col-md-offset-5">
                    <div class="pagination"> {{ $customersIndex->links() }} </div>
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@endsection