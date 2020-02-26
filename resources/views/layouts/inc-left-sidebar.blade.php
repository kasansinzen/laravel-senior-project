<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    
                        <form method="get" action="/store/">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="ค้นหา...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                        </form>
                        
                        <li>
                            <a href="{{ url('/store/order') }}">
                                <i class="glyphicon glyphicon-list-alt fa-fw"></i> รายการสั่งซื้อทั้งหมด
                            </a>
                        </li>

                        <li>
                            <a href="">
                                <i class="fa fa-shopping-cart fa-fw"></i> หมวดสินค้า<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/store/product') }}"> สินค้า</a>
                                </li>
                                <li>
                                    <a href="{{ url('/store/producttype') }}"> ประเภทสินค้า</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href=""> 
                                <i class="fa fa-user fa-fw"></i> หมวดผู้ซื้อ<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('store/customer') }}">ลูกค้า</a>
                                </li>
                                <li>
                                    <a href="{{ url('store/dealer') }}">ตัวแทนจำหน่าย</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ url('store/discount') }}"><i class="fa fa-usd fa-fw"></i> ส่วนลดราคา</a>
                        </li>
                        <li>
                            <a href="{{ url('store/payment') }}"><i class="glyphicon glyphicon-credit-card fa-fw"></i> บัญชีธนาคาร</a>
                        </li>
                        <li>
                            <a href=""><i class="glyphicon glyphicon-duplicate fa-fw"></i> รายงาน<span class="fa arrow">
                            </span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('store/report-saled') }}">รายงานการขาย</a>
                                </li>
                                <li>
                                    <a href="{{ url('store/report-all') }}">รายงานทั้งหมด</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ url('store/upgrade-level') }}">
                                <i class="glyphicon glyphicon-collapse-up fa-fw"></i> อัพเกรดการใช้งาน
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('store/install-app') }}">
                                <i class="glyphicon glyphicon-download-alt fa-fw"></i> ติดตั้งร้านค้า
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>