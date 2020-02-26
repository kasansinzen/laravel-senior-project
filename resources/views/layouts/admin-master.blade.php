<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-STORE by Admin</title>
    <link rel="shortcut icon" href="/img/icon.png" type="image/png">
    <!-- Bootstrap Core CSS -->
    @include('layouts.inc-stylesheet')
    @yield('stylesheet')
</head>
<body>
    <div id="wrapper">
    <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/store') }}"><img src="/img/logo.png" width="150" height="45"></a>
            </div>
            <!-- /.navbar-header -->
            @include('layouts.admin-header')
            <!-- /.navbar-top-links -->
            @include('layouts.admin-left-sidebar')
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <div class="col-xs-12">

                            @yield('content')
                        
                    <!-- /.col-md-12 -->     
                    </div>
                <!-- /.row -->    
                </div>
            </div>
        <!-- /.container-fluid -->
        </div>
    <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    @include('layouts.inc-scripts')
    @yield('scripts')
</body>
</html>