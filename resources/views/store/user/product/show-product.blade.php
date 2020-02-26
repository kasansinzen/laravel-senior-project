@extends('layouts.user-master')
    
<!-- You can use Open Graph tags to customize link previews.
Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
<meta property="og:url" content="https://kasansin-project2.000webhostapp.com/shop/{{ $user }}/view/{{ $productShow->product_id }}" />
<meta property="og:type" content="https://kasansin-project2.000webhostapp.com/shop/{{ $user }}/view/{{ $productShow->product_id }}" />
<meta property="og:title" content="https://kasansin-project2.000webhostapp.com/shop/{{ $user }}/view/{{ $productShow->product_id }}" />
<meta property="og:description" content="https://kasansin-project2.000webhostapp.com/shop/{{ $user }}/view/{{ $productShow->product_id }}" />
<meta property="og:image" content="https://kasansin-project2.000webhostapp.com/shop/{{ $user }}/view/{{ $productShow->product_id }}" />

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">จัดการสินค้า</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-12">
        <div class="panel panel-default">  
            <div class="panel-heading">รายละเอียดสินค้า</div>
            <div class="panel-body">

                <div class="form-group">
                    <div class="col-md-3">
                        <div class="form-group">
                            <img src="{{ $url }}" width="100%" height="300">
                        </div>
                        
                        <div class="form-group">
                            <div class="row col-md-4 col-md-offset-5">
                                <!-- Your share button code -->
                                <div class="fb-share-button" data-href="https://kasansin-project2.000webhostapp.com/shop/{{ $user }}/view/{{ $productShow->product_id }}" data-layout="button" size="large"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="row panel panel-default" style="padding-top: 20px;">
                        <div class="row form-group">
                            <label id="txtLabelRight" class="col-md-2 control-label">ชื่อสินค้า</label>

                            <div class="col-md-6">
                                <p>{{ $productShow->product_name }}</p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label id="txtLabelRight" class="col-md-2 control-label">จำนวน</label>

                            <div class="col-md-6">
                                <p>{{ $productShow->product_unit }}</p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label id="txtLabelRight" class="col-md-2 control-label">ราคา</label>

                            <div class="col-md-6">
                                <p>{{ number_format($productShow->product_price,2) }}</p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label id="txtLabelRight" class="col-md-2 control-label">ประเภทสินค้า</label>

                            <div class="col-md-6">
                                <p>{{ $productShow->producttype->producttype_name }}</p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label id="txtLabelRight" class="col-md-2 control-label">รายละเอียด</label>

                            <div class="col-md-6">
                                <p>{{ $productShow->product_description }}</p>
                            </div>
                        </div>
                    </div>
                <!-- /col-md-9 -->
                </div>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@endsection

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=765625186948704";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>