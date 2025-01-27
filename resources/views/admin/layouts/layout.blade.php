<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('page_title') | Deniz Gayrimenkul</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/backend/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="/backend/dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
@yield('head')

@yield('css')
<!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>D</b>G</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Deniz</b>Gayrimenkul</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="/backend/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Kayıt: {{ Auth::user()->created_at }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/profile" class="btn btn-default btn-flat">Profil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/logout" class="btn btn-default btn-flat">Çıkış Yap</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info" style="margin-top: 12px;">
                    <p>{{ Auth::user()->name }}</p>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENU</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="{{ Request::path()=='admin/index' ? 'active' : '' }}"><a href="/admin/index"><i
                            class="fa fa-link"></i> <span>Admin</span></a></li>
                <li><a href="/admin/contact-form-from-site"><i class="fa fa-link"></i> <span>Mesajlar</span></a></li>
                <li class="{{ Request::path()=='admin/page-header' ? 'active' : '' }}"><a href="/admin/page-header"><i
                            class="fa fa-link"></i> <span>Site Başlığı</span></a></li>
                <li class="{{ Request::path()=='admin/menu' ? 'active' : '' }}"><a href="/admin/menu"><i
                            class="fa fa-link"></i> <span>Menü</span></a></li>
                <li class="{{ Request::path()=='admin/featured-properties' ? 'active' : '' }}"><a
                        href="/admin/featured-properties"><i class="fa fa-link"></i> <span>Gözde İlanlar</span></a></li>


                <li class="treeview{{ Request::path()=='admin/about-us' ? ' menu-open' : '' }}{{ Request::path()=='admin/contact' ? ' menu-open' : '' }}">
                    <a href="#"><i class="fa fa-link"></i> <span>Sayfalar</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu"{{Request::path()=='admin/about-us' ? ' style=display:block':''}}{{Request::path()=='admin/contact' ? ' style=display:block':''}}>
                        <li class="{{ Request::path()=='admin/about-us' ? 'active' : '' }}"><a
                                href="/admin/about-us"><i class="fa fa-link"></i> <span>Hakkımızda Sayfası</span></a>
                        </li>
                    </ul>
                </li>


                <li class="treeview{{ Request::path()=='admin/categories' ? ' menu-open' : '' }}">
                    <a href="#"><i class="fa fa-link"></i> <span>Kategoriler</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu"{{Request::path()=='admin/categories' ? ' style=display:block':''}}{{Request::path()=='admin/create-category' ? ' style=display:block':''}}>
                        <li class="{{ Request::path()=='admin/categories' ? 'active' : '' }}"><a
                                href="/admin/categories">Kategoriler</a></li>
                        <li class="{{ Request::path()=='admin/create-category' ? 'active' : '' }}"><a
                                href="/admin/create-category">Kategori Ekle</a></li>
                    </ul>
                </li>
                <li class="treeview{{ Request::path()=='admin/properties' ? ' menu-open':'' }}{{ Request::path()=='admin/create-property' ? ' menu-open':'' }}">
                    <a href="#"><i class="fa fa-link"></i> <span>İlanlar</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu" {{ Request::path()=='admin/properties' ? ' style=display:block;':'' }}{{ Request::path()=='admin/create-property' ? 'style=display:block;':'' }}>
                        <li class="{{ Request::path()=='admin/properties' ? 'active' : '' }}"><a
                                href="/admin/properties">İlanlar</a></li>
                        <li class="{{ Request::path()=='admin/create-property' ? 'active' : '' }}"><a
                                href="/admin/create-property">İlan Ekle</a></li>
                    </ul>
                </li>
                <li class="treeview{{ Request::path()=='admin/why-choose-us' ? ' menu-open' : '' }}{{ Request::path()=='admin/why-choose-us-icons' ? ' menu-open' : '' }}">
                    <a href="#"><i class="fa fa-link"></i> <span>Neden Biz?</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu" {{ Request::path()=='admin/why-choose-us' ? ' style=display:block;':'' }}{{ Request::path()=='admin/why-choose-us-icons' ? ' style=display:block;':'' }}>
                        <li class="{{ Request::path()=='admin/why-choose-us' ? 'active' : '' }}"><a
                                href="/admin/why-choose-us">Neden Biz?</a></li>
                        <li class="{{ Request::path()=='admin/why-choose-us-icons' ? 'active' : '' }}"><a
                                href="/admin/why-choose-us-icons">İkonlu Madde Ekle</a></li>
                    </ul>
                </li>
                <li class="treeview{{ Request::path()=='admin/agents' ? ' menu-open':'' }}{{ Request::path()=='admin/create-agent' ? ' menu-open':'' }}">
                    <a href="#">
                        <i class="fa fa-link"></i> <span>Danışmanlar</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu" {{ Request::path()=='admin/agents' ? ' style=display:block;':'' }}{{ Request::path()=='admin/create-agent' ? ' style=display:block;':'' }}>
                        <li class="{{ Request::path()=='admin/agents' ? ' active' : '' }} "><a href="/admin/agents">
                                Danışmanlar</a></li>
                        <li class="{{ Request::path()=='admin/create-agent' ? ' active' : '' }}"><a
                                href="/admin/create-agent">Danışman Ekle</a></li>
                    </ul>
                </li>
                <li class="treeview{{ Request::path()=='/admin/references' ? ' menu-open' : '' }}">
                    <a href="#"><i class="fa fa-link"></i> <span>Referanslar</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu"{{Request::path()=='admin/references' ? ' style=display:block':''}}{{Request::path()=='admin/create-reference' ? ' style=display:block':''}}>
                        <li class="{{ Request::path()=='admin/references' ? 'active' : '' }}"><a
                                href="/admin/references">Referanslar</a></li>
                        <li class="{{ Request::path()=='admin/create-reference' ? 'active' : '' }}"><a
                                href="/admin/create-reference">Referanslar Ekle</a></li>
                    </ul>
                </li>
                <li><a href="/admin/seo-options"><i class="fa fa-link"></i> <span>SEO Optimizasyonları</span></a></li>
                <li><a href="/admin/contact-and-map"><i class="fa fa-link"></i> <span>İletişim Sayfası</span></a></li>
                <li><a href="/admin/social-media"><i class="fa fa-link"></i> <span>Sosyal Medya Hesapları</span></a>
                </li>
                <li class="treeview{{ Request::path()=='admin/footer' ? ' menu-open':'' }}{{ Request::path()=='admin/insert-useful-links' ? ' menu-open':'' }}">
                    <a href="#">
                        <i class="fa fa-link"></i> <span>Footer</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu" {{ Request::path()=='admin/footer' ? ' style=display:block;':'' }}{{ Request::path()=='admin/useful-links' ? ' style=display:block;':'' }}>
                        <li class="{{ Request::path()=='admin/footer' ? ' active' : '' }} "><a href="/admin/footer">
                                Footer</a></li>
                        <li class="{{ Request::path()=='admin/useful-links' ? ' active' : '' }}"><a
                                href="/admin/useful-links"> Footer'a link ekle</a></li>
                    </ul>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page_title')
                <small>@yield('optional_description')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{request('url')}}"><i class="fa fa-dashboard"></i> {{request('url')}}</a></li>
                <li class="active">@yield('page_title')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$property_count}}</h3>

                            <p>Mevcut İlan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-home"></i>
                        </div>
                        <a href="/admin/properties" class="small-box-footer">İlanları Gör <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$agent_count}}</h3>
                            <p>Danışman</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/admin/agents" class="small-box-footer">Danışmanları Gör <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$category_count}}</h3>
                            <p>İlan Kategorisi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="/admin/categories" class="small-box-footer">İlan Kategorilerini Gör <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want by Emre Özyildirim
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2020 <a href="https://www.denizinsaatyapi.com" target="_blank">Deniz
                Gayrimenkul</a>.</strong> All rights reserved.
    </footer>
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
@yield('js')
</body>
</html>
