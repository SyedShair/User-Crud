
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    @include('Layout.css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @section('header')
        <header class="main-header">
            <!-- Logo -->
            <a href="{{route('index.admin')}}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>Lib</b>rary</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Library</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <!-- Notifications: style can be found in dropdown.less -->

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{asset('assets/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                                <span class="hidden-xs"> @php echo \Illuminate\Support\Facades\Auth::user()->name;  @endphp</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{asset('assets/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                                    <p>
                                       @php echo \Illuminate\Support\Facades\Auth::user()->name;  @endphp

                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
    @show
    @section('side-bar')
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{asset('assets/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p> @php echo \Illuminate\Support\Facades\Auth::user()->name;  @endphp</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                    <li class="active treeview">
                        <a href="{{route('index.admin')}}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>

                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cube"></i> <span>Racks</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="{{route('rack.index')}}"> Add Rack</a></li>
                        </ul>
                    </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-book"></i> <span>Books</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active"><a href="{{route('book.index')}}"> Add Book</a></li>
                            </ul>
                        </li>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 2 || \Illuminate\Support\Facades\Auth::user()->role_id == 1)

                            <li class="treeview">
                        <a href="{{route('rack.details')}}">
                            <i class="fa  fa-external-link-square"></i> <span>View Racks</span></i>
                        </a>
                    </li>
                    </li> <li class="treeview">
                        <a href="{{route('books.search')}}">
                            <i class="fa  fa-book"></i> <span>Search Books</span></i>
                        </a>
                    </li>
                        @endif



                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
    @show
<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        @section('content')


         @show
        </div>

    @section('footer')
            <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="">Almsaeed Studio</a>.</strong> All rights reserved.
    </footer>
        @show

</div><!-- ./wrapper -->

@include('Layout.js')
@section('extra-js')
@show
</body>
</html>
