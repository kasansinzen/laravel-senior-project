<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>EC-STORE</title>
    <link rel="shortcut icon" href="/img/icon.png" type="image/png">
    <!-- Bootstrap Core CSS -->
    @include('layouts.inc-stylesheet')
    @yield('stylesheet')
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header navbar-form">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/img/logo.png" width="150" height="45">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-form">
                    <li><a href="/shop/{{ Session::get('user') }}">ร้านค้า</a></li>
                    <li><a href="/" target="_blank">เว็บไซต์</a></li>
                    <li><a href="/shop/{{ Session::get('user') }}/paymenting">วิธีการชำระเงิน</a></li>
                    <li><a href="/" target="_blank">ยืนยันการชำระเงิน</a></li>
                    
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-form navbar-right">
                    <li><a href="/shop/{{ Session::get('user') }}/register-dealer">สมัครตัวแทนจำหน่าย</a></li>
                    <li><a href="/shop/{{ Session::get('user') }}/login-dealer">เข้าสู่ระบบตัวแทนจำหน่าย</a></li>

                    <li id="padding-nav-shop">
                        <form method="get" action="/shop/{{ Session::get('user') }}/search-product">
                            <div class="input-group">
                                <input type="text" name="search_product" 
                                class="form-control" placeholder="ค้นหา...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </form>
                    </li>
                    <li id="padding-cart-shop">
                        <a href="/shop/{{ Session::get('user') }}/cart-order">
                           <span class="glyphicon glyphicon-shopping-cart fa-2x"></span>
                           <span class="badge">{{ Session::has('cart')?Session::get('cart')->totalQty : '' }}</span> 
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid" id="contentLayout">
        
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">

                    @yield('content')
                    
                <!-- /.panel panel-default -->    
                </div>
            <!-- /.col-md-12 -->     
            </div>
        <!-- /.row -->    
        </div>
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    @include('layouts.inc-scripts')
    @yield('scripts')

</body>
</html>