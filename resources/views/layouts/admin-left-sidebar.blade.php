<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
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

            <li>
                <a href="{{ url('/store/admin/upgrade-management') }}"> รายการชำระบริการระบบ</a>
            </li>

            <li>
                <a href="{{ url('/store/admin/news-management') }}"> จัดการข้อมูลข่าวสาร</a>
            </li>

            <li>
                <a href="{{ url('/store/admin/user-management') }}"> จัดการผู้ใช้งาน</a>
            </li>

            <li>
                <a href="{{ url('/store/admin/order-management') }}"> รายการรสั่งซื้อสินค้าในระบบทั้งหมด</a>
            </li>

            <li>
                <a href="{{ url('/store/admin/product-management') }}"> จัดการสินค้าในระบบ</a>
            </li>

            <li>
                <a href=""><span class="fa arrow"></span> รายงาน</a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/store/admin/upgrade-report-management') }}">รายงานการชำระบริการระบบทั้งหมด</a>
                    </li>
                    <li>
                        <a href="{{ url('/store/admin/order-report-management') }}">รายงานการสั่งซื้อทั้งหมด</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>