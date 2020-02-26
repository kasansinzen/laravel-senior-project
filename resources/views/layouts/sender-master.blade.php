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