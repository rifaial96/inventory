<ul id="menu" class="page-sidebar-menu">

    <li {!! (Request::is('admin') ? 'class="active"' : '') !!}>
        <a href="{{ route('admin.dashboard') }}">
            <i class="livicon" data-name="dashboard" data-size="33" data-c="#418BCA" data-hc="#418BCA"
               data-loop="true"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>

    <!-- ================================== Menu Category ==================================== -->
    <li {!! (Request::is('admin/category') || Request::is('admin/category/*')  ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="responsive-menu" data-c="#418BCA" data-hc="#418BCA"  data-size="33"
               data-loop="true"></i>
            <span class="title">Category</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/category') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/category') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Category List
                </a>
            </li>
            <li {!! (Request::is('admin/category/create') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/category/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add Category
                </a>
            </li>
        </ul>
    </li>    

    <!-- ================================== Menu Supplier ==================================== -->
    <li {!! (Request::is('admin/supplier') || Request::is('admin/supplier/*')  ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="move" data-c="#ef6f6c" data-hc="#ef6f6c" data-size="33"
               data-loop="true"></i>
            <span class="title">Supplier</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/supplier') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/supplier') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Supplier List
                </a>
            </li>
            <li {!! (Request::is('admin/supplier/create') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/supplier/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add Supplier
                </a>
            </li>
        </ul>
    </li>    

    <!-- ================================== Menu Customer ==================================== -->
    <li {!! (Request::is('admin/customer') || Request::is('admin/customer/*')  ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="user" data-c="#6CC66C" data-hc="#6CC66C" data-size="33"
               data-loop="true"></i>
            <span class="title">Customer</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/customer') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/customer') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Customer List
                </a>
            </li>
            <li {!! (Request::is('admin/customer/create') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/customer/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add Customer
                </a>
            </li>
        </ul>
    </li>        

    <!-- ================================== Menu Product ==================================== -->
    <li {!! (Request::is('admin/product') || Request::is('admin/product/*')  ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="camera" data-c="#F89A14" data-hc="#F89A14" data-size="33"
               data-loop="true"></i>
            <span class="title">Product</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/product') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/product') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Product List
                </a>
            </li>
            <li {!! (Request::is('admin/product/create') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/product/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add Product
                </a>
            </li>
        </ul>
    </li>          

    <!-- ================================== Menu Transaction ==================================== -->
    <li {!! (Request::is('admin/sale') || Request::is('admin/sale/*') || Request::is('admin/purchase/*') || Request::is('admin/purchase/*')  ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="spinner-x" data-c="#5bc0de" data-hc="#5bc0de" data-size="33"
               data-loop="true"></i>
            <span class="title">Transaction</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/sale') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/sale') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Sales
                </a>
            </li>
            <li {!! (Request::is('admin/purchase') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/purchase') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Purchases
                </a>
            </li>
        </ul>
    </li>          

    <!-- ================================== Menu Cash Flow ==================================== -->
    <li {!! (Request::is('admin/cash') || Request::is('admin/cash/*')  ? 'class="active"' : '') !!}>
        <a href="{{ URL::to('admin/cash') }}">
            <i class="livicon" data-name="money" data-size="33" data-c="#F89A14" data-hc="#F89A14"
               data-loop="true"></i>
            <span class="title">Cash Flow</span>
        </a>
    </li>

    <!-- ================================== Menu Report ==================================== -->
    <li {!! (Request::is('admin/report') || Request::is('admin/report/*')  ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="linechart" data-c="#6CC66C" data-hc="#6CC66C" data-size="33"
               data-loop="true"></i>
            <span class="title">Report</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/report/sale') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/report_sale') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Sales
                </a>
            </li>
            <li {!! (Request::is('admin/report/purchase') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/report_purchase') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Purchases
                </a>
            </li>
            <li {!! (Request::is('admin/report/cash') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/report_cash') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Cash Flow
                </a>
            </li>
        </ul>
    </li>          


    <!-- Menus generated by CRUD generator -->
    @include('admin/layouts/menu')
</ul>