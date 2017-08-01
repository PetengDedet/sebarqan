<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', config('app.name')) | {{config('app.name')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('assets/adminlte')}}/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

@yield('css')

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/adminlte')}}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('assets/adminlte')}}/dist/css/skins/_all-skins.min.css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-black sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('/')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">{{config('app.name')}}</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">{{config('app.name')}}</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{asset('assets/adminlte')}}/dist/img/user2-160x160.jpg"
                                                     class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0"  aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('assets/adminlte')}}/dist/img/user2-160x160.jpg" class="user-image"
                                 alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->full_name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('assets/adminlte')}}/dist/img/user2-160x160.jpg" class="img-circle"
                                     alt="User Image">

                                <p>
                                    {{Auth::user()->full_name}} - {{title_case(Auth::user()->level)}}
                                    <small>Member
                                        since {{\Carbon\Carbon::parse(Auth::user()->created_at)->format('F Y')}}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{url('profile')}}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <form method="post" action="{{url('logout')}}"></form>
                                    <a href="#" class="btn btn-default btn-flat" id="logout">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    {{--<li>--}}
                        {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                    {{--</li>--}}
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('assets/adminlte')}}/dist/img/user2-160x160.jpg" class="img-circle"
                         alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->full_name}}</p>
                    {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                {{--<li class="header">MAIN NAVIGATION</li>--}}
                <li class="@if(url()->current() == url('admin/dashboard')) active @endif">
                    <a href="{{url('admin/dashboard')}}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview @if(url()->current() == url('admin/orders') OR Request::route()->getPrefix() == 'admin/orders') menu-open active @endif">
                    <a href="#">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Order</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="@if(url()->current() == url('admin/orders') OR Request::route()->getPrefix() == 'admin/orders') active @endif"><a href="{{url('admin/orders')}}"><i class="fa fa-circle-o"></i>&nbsp; Order</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>&nbsp; Pending</a></li>
                    </ul>
                </li>
                @php
                    $produkMenu = [
                        url('admin/product'),
                        url('admin/new-product'),
                        url('admin/category')
                    ];
                @endphp
                <li class="treeview @if(in_array(url()->current(), $produkMenu) OR Request::route()->getPrefix() == 'admin/product') active @endif">
                    <a href="#">
                        <i class="fa fa-cube"></i>
                        <span>Product</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="@if(url()->current() == url('admin/product') OR Request::route()->getPrefix() == 'admin/product') active @endif">
                            <a href="{{url('admin/product')}}"><i class="fa fa-circle-o"></i>&nbsp; Semua Product</a>
                        </li>
                        <li class="@if(url()->current() == url('admin/new-product') OR Request::route()->getPrefix() == 'admin/new-product') active @endif">
                            <a href="{{url('admin/new-product')}}"><i class="fa fa-circle-o"></i>&nbsp; Tambah Product</a>
                        </li>
                        <li class="@if(url()->current() == url('admin/category') OR Request::route()->getPrefix() == 'admin/category') active @endif">
                            <a href="{{url('admin/category')}}"><i class="fa fa-circle-o"></i>&nbsp; Kategori Product</a>
                        </li>
                    </ul>
                </li>
                <li class="@if(url()->current() == url('admin/kupon') OR Request::route()->getPrefix() == 'admin/kupon') active @endif">
                    <a href="{{url('admin/kupon')}}">
                        <i class="fa fa-tags"></i>
                        <span>Kupon</span>
                    </a>
                </li>

                <li>
                    <a href="{{url('admin/banner')}}">
                        <i class="fa fa-map-signs"></i>
                        <span>Banner</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-sitemap"></i>
                        <span>Halaman</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-rss-square"></i>
                        <span>Blog</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Member</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('members')}}"><i class="fa fa-circle-o"></i>&nbsp; Semua Member</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-sliders"></i>
                        <span>Personalisasi</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('admin/personalisasi')}}">Personalisasi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('admin/email-template')}}">
                        <i class="fa fa-envelope"></i>
                        <span>Template Email</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i>
                        <span>Pengaturan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('admin/bank')}}"><i class="fa fa-circle-o"></i>&nbsp; Bank</a></li>
                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page_title')
                <small>@yield('page_description')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Copyright &copy; {{date('Y')}} <a href="{{config('app.url')}}">{{config('app.name')}}</a>.</strong> All
        rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
{{--<aside class="control-sidebar control-sidebar-dark">--}}
{{--<!-- Create the tabs -->--}}
{{--<ul class="nav nav-tabs nav-justified control-sidebar-tabs">--}}
{{--<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>--}}

{{--<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>--}}
{{--</ul>--}}
{{--<!-- Tab panes -->--}}
{{--<div class="tab-content">--}}
{{--<!-- Home tab content -->--}}
{{--<div class="tab-pane" id="control-sidebar-home-tab">--}}
{{--<h3 class="control-sidebar-heading">Recent Activity</h3>--}}
{{--<ul class="control-sidebar-menu">--}}
{{--<li>--}}
{{--<a href="javascript:void(0)">--}}
{{--<i class="menu-icon fa fa-birthday-cake bg-red"></i>--}}

{{--<div class="menu-info">--}}
{{--<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>--}}

{{--<p>Will be 23 on April 24th</p>--}}
{{--</div>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="javascript:void(0)">--}}
{{--<i class="menu-icon fa fa-user bg-yellow"></i>--}}

{{--<div class="menu-info">--}}
{{--<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>--}}

{{--<p>New phone +1(800)555-1234</p>--}}
{{--</div>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="javascript:void(0)">--}}
{{--<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>--}}

{{--<div class="menu-info">--}}
{{--<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>--}}

{{--<p>nora@example.com</p>--}}
{{--</div>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="javascript:void(0)">--}}
{{--<i class="menu-icon fa fa-file-code-o bg-green"></i>--}}

{{--<div class="menu-info">--}}
{{--<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>--}}

{{--<p>Execution time 5 seconds</p>--}}
{{--</div>--}}
{{--</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--<!-- /.control-sidebar-menu -->--}}

{{--<h3 class="control-sidebar-heading">Tasks Progress</h3>--}}
{{--<ul class="control-sidebar-menu">--}}
{{--<li>--}}
{{--<a href="javascript:void(0)">--}}
{{--<h4 class="control-sidebar-subheading">--}}
{{--Custom Template Design--}}
{{--<span class="label label-danger pull-right">70%</span>--}}
{{--</h4>--}}

{{--<div class="progress progress-xxs">--}}
{{--<div class="progress-bar progress-bar-danger" style="width: 70%"></div>--}}
{{--</div>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="javascript:void(0)">--}}
{{--<h4 class="control-sidebar-subheading">--}}
{{--Update Resume--}}
{{--<span class="label label-success pull-right">95%</span>--}}
{{--</h4>--}}

{{--<div class="progress progress-xxs">--}}
{{--<div class="progress-bar progress-bar-success" style="width: 95%"></div>--}}
{{--</div>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="javascript:void(0)">--}}
{{--<h4 class="control-sidebar-subheading">--}}
{{--Laravel Integration--}}
{{--<span class="label label-warning pull-right">50%</span>--}}
{{--</h4>--}}

{{--<div class="progress progress-xxs">--}}
{{--<div class="progress-bar progress-bar-warning" style="width: 50%"></div>--}}
{{--</div>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="javascript:void(0)">--}}
{{--<h4 class="control-sidebar-subheading">--}}
{{--Back End Framework--}}
{{--<span class="label label-primary pull-right">68%</span>--}}
{{--</h4>--}}

{{--<div class="progress progress-xxs">--}}
{{--<div class="progress-bar progress-bar-primary" style="width: 68%"></div>--}}
{{--</div>--}}
{{--</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--<!-- /.control-sidebar-menu -->--}}

{{--</div>--}}
{{--<!-- /.tab-pane -->--}}
{{--<!-- Stats tab content -->--}}
{{--<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>--}}
{{--<!-- /.tab-pane -->--}}
{{--<!-- Settings tab content -->--}}
{{--<div class="tab-pane" id="control-sidebar-settings-tab">--}}
{{--<form method="post">--}}
{{--<h3 class="control-sidebar-heading">General Settings</h3>--}}

{{--<div class="form-group">--}}
{{--<label class="control-sidebar-subheading">--}}
{{--Report panel usage--}}
{{--<input type="checkbox" class="pull-right" checked>--}}
{{--</label>--}}

{{--<p>--}}
{{--Some information about this general settings option--}}
{{--</p>--}}
{{--</div>--}}
{{--<!-- /.form-group -->--}}

{{--<div class="form-group">--}}
{{--<label class="control-sidebar-subheading">--}}
{{--Allow mail redirect--}}
{{--<input type="checkbox" class="pull-right" checked>--}}
{{--</label>--}}

{{--<p>--}}
{{--Other sets of options are available--}}
{{--</p>--}}
{{--</div>--}}
{{--<!-- /.form-group -->--}}

{{--<div class="form-group">--}}
{{--<label class="control-sidebar-subheading">--}}
{{--Expose author name in posts--}}
{{--<input type="checkbox" class="pull-right" checked>--}}
{{--</label>--}}

{{--<p>--}}
{{--Allow the user to show his name in blog posts--}}
{{--</p>--}}
{{--</div>--}}
{{--<!-- /.form-group -->--}}

{{--<h3 class="control-sidebar-heading">Chat Settings</h3>--}}

{{--<div class="form-group">--}}
{{--<label class="control-sidebar-subheading">--}}
{{--Show me as online--}}
{{--<input type="checkbox" class="pull-right" checked>--}}
{{--</label>--}}
{{--</div>--}}
{{--<!-- /.form-group -->--}}

{{--<div class="form-group">--}}
{{--<label class="control-sidebar-subheading">--}}
{{--Turn off notifications--}}
{{--<input type="checkbox" class="pull-right">--}}
{{--</label>--}}
{{--</div>--}}
{{--<!-- /.form-group -->--}}

{{--<div class="form-group">--}}
{{--<label class="control-sidebar-subheading">--}}
{{--Delete chat history--}}
{{--<a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>--}}
{{--</label>--}}
{{--</div>--}}
{{--<!-- /.form-group -->--}}
{{--</form>--}}
{{--</div>--}}
{{--<!-- /.tab-pane -->--}}
{{--</div>--}}
{{--</aside>--}}
<!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    {{--<div class="control-sidebar-bg"></div>--}}
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('assets/adminlte')}}/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('assets/adminlte')}}/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{asset('assets/adminlte')}}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{asset('assets/adminlte')}}/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/adminlte')}}/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/adminlte')}}/dist/js/demo.js"></script>
<script>
    $(document).ready(function () {
        $('#logout').on('click', function () {
            $(this).parent().find('form').submit();
        });
    });
</script>

@yield('js')

</body>
</html>
