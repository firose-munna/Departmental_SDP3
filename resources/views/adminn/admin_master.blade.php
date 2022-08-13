<!DOCTYPE html>
<html lang="en">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Joruri Osudh - Admin</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="{{asset("admin/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("admin/css/bootstrap-responsive.min.css")}}" rel="stylesheet">
    <link id="base-style" href="{{asset("admin/css/style.css")}}" rel="stylesheet">
    <link id="base-style-responsive" href="{{asset("admin/css/style-responsive.css")}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="{{asset("admin/css/ie.css")}}" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="{{asset("admin/css/ie9.css")}}" rel="stylesheet">
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- end: Favicon -->




</head>

<body>
<!-- start: Header -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="index.html"><span>Joruri Osudh</span></a>

            <!-- start: Header Menu -->
            <div class="nav-no-collapse header-nav">
                <ul class="nav pull-right">

                    <!-- start: User Dropdown -->
                    <li class="dropdown">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="halflings-icon white user"></i> {{Session::get('admin_name')}}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-menu-title">
                                <span>Account Settings</span>
                            </li>
                            <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
                            <li><a href="{{url('/logout')}}"><i class="halflings-icon off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <!-- end: User Dropdown -->
                </ul>
            </div>
            <!-- end: Header Menu -->

        </div>
    </div>
</div>
<!-- start: Header -->

<div class="container-fluid-full">
    <div class="row-fluid">

        <!-- start: Main Menu -->
        <div id="sidebar-left" class="span2">
            <div class="nav-collapse sidebar-nav">
                <ul class="nav nav-tabs nav-stacked main-menu">
                    <li><a href="{{url('/dashboard')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>


                    <!-- Category Dropdown....../-->
                    <li>
                        <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Category</span><span class="label label-important"> 3 </span></a>
                        <ul>
                            <li><a class="submenu" href="{{url('/categories/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Category</span></a></li>
                            <li><a class="submenu" href="{{url('/categories/')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Category</span></a></li>

                        </ul>
                    </li>

                    <!-- Sub Category Dropdown....../-->
                    <li>
                        <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Sub Category</span><span class="label label-important"> 3 </span></a>
                        <ul>
                            <li><a class="submenu" href="{{url('/sub-categories/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Subcategory</span></a></li>
                            <li><a class="submenu" href="{{url('/sub-categories/')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Subcategory</span></a></li>
                            <li><a class="submenu" href="{{url('/sub-categories/')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> New Subcategory</span></a></li>
                        </ul>
                    </li>

                    <!-- Brand Dropdown....../-->
                    <li>
                        <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Brand</span><span class="label label-important"> 3 </span></a>
                        <ul>
                            <li><a class="submenu" href="{{url('/brands/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Brand</span></a></li>
                            <li><a class="submenu" href="{{url('/brands/')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Brands</span></a></li>
                        </ul>
                    </li>

                    <!-- unit Dropdown....../-->
                    <li>
                        <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Unit</span><span class="label label-important"> 3 </span></a>
                        <ul>
                            <li><a class="submenu" href="{{url('/units/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Unit</span></a></li>
                            <li><a class="submenu" href="{{url('/units/')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Units</span></a></li>
                        </ul>
                    </li>

                    <!-- Product Dropdown....../-->
                    <li>
                        <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Product</span><span class="label label-important"> 3 </span></a>
                        <ul>
                            <li><a class="submenu" href="{{url('/products/create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Product</span></a></li>
                            <li><a class="submenu" href="{{url('/products/')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Products</span></a></li>
                        </ul>
                    </li>
                    <li><a href="{{url('/manage-order')}}"><i class="icon-edit"></i><span class="hidden-tablet"> Orders</span></a></li>

                </ul>
            </div>
        </div>
        <!-- end: Main Menu -->

        <noscript>
            <div class="alert alert-block span10">
                <h4 class="alert-heading">Warning!</h4>
                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
            </div>
        </noscript>

        <!-- start: Content -->
        <div id="content" class="span10">


            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.html">Home</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="#">Dashboard</a></li>
            </ul>



            @yield('admin_content')



        </div><!--/.fluid-container-->

        <!-- end: Content -->
    </div><!--/#content.span10-->
</div><!--/fluid-row-->

<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Settings</h3>
    </div>
    <div class="modal-body">
        <p>Here settings can be configured...</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
    </div>
</div>

<div class="clearfix"></div>

<footer>

    <p>
        <span style="text-align:left;float:left">&copy; 2022 <a href="#" alt="">Joruri Osudh Dashboard</a></span>

    </p>

</footer>

<!-- start: JavaScript-->

<script src="{{asset("admin/js/jquery-1.9.1.min.js")}}"></script>
<script src="{{asset("admin/js/jquery-migrate-1.0.0.min.js")}}"></script>

<script src="{{asset("admin/js/jquery-ui-1.10.0.custom.min.js")}}"></script>

<script src="{{asset("admin/js/jquery.ui.touch-punch.js")}}"></script>

<script src="{{asset("admin/js/modernizr.js")}}"></script>

<script src="{{asset("admin/js/bootstrap.min.js")}}"></script>

<script src="{{asset("admin/js/jquery.cookie.js")}}"></script>

<script src="{{asset('admin/js/fullcalendar.min.js')}}"></script>

<script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset("admin/js/excanvas.js")}}"></script>
<script src="{{asset("admin/js/jquery.flot.js")}}"></script>
<script src="{{asset("admin/js/jquery.flot.pie.js")}}"></script>
<script src="{{asset("admin/js/jquery.flot.stack.js")}}"></script>
<script src="{{asset("admin/js/jquery.flot.resize.min.js")}}"></script>

<script src="{{asset("admin/js/jquery.chosen.min.js")}}"></script>

<script src="{{asset("admin/js/jquery.uniform.min.js")}}"></script>

<script src="{{asset("admin/js/jquery.cleditor.min.js")}}"></script>

<script src="{{asset("admin/js/jquery.noty.js")}}"></script>

<script src="{{asset("admin/js/jquery.elfinder.min.js")}}"></script>

<script src="{{asset("admin/js/jquery.raty.min.js")}}"></script>

<script src="{{asset("admin/js/jquery.iphone.toggle.js")}}"></script>

<script src="{{asset("admin/js/jquery.uploadify-3.1.min.js")}}"></script>

<script src="{{asset("admin/js/jquery.gritter.min.js")}}"></script>

<script src="{{asset("admin/js/jquery.imagesloaded.js")}}"></script>

<script src="{{asset("admin/js/jquery.masonry.min.js")}}"></script>

<script src="{{asset("admin/js/jquery.knob.modified.js")}}"></script>

<script src="{{asset("admin/js/jquery.sparkline.min.js")}}"></script>

<script src="{{asset("admin/js/counter.js")}}"></script>

<script src="{{asset("admin/js/retina.js")}}"></script>

<script src="{{asset("admin/js/custom.js")}}"></script>
<!-- end: JavaScript-->

</body>
</html>
