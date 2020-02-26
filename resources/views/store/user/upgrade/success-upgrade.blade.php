@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">สำเร็จ</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-12">
        <div class="panel panel-default">  
            <div class="panel-heading">อัพเกรดการใช้งาน</div>
            <div class="panel-body">
            
                <div class="col-md-6 col-md-offset-3">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <div class="form-group">
                            <h4 id="label-create-order">{{ Session::get('success') }}</h4>
                        </div>

                        <div class="form-group">
                            <label class="control-label" id="label-create-order">หมายเลขรายการชำระเงิน</label>
                            <label class="control-label"> {{ sprintf('%04d', $getUpgrade->upgrade_id) }}</label>
                        </div>
                    </div>
                @endif
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@endsection