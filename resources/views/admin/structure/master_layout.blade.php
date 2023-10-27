<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />

    <title>admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/admin/images/favicon.png') }}">
    <!-- Pignose Calender -->
    <link href="{{ asset('/admin/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('/admin/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="{{ url('/admin/images/logo.png') }}" alt=""> </b>
                    <span class="logo-compact"><img src="{{ url('/admin/images/logo-compact.png') }}"
                            alt=""></span>
                    <span class="brand-title">
                        <img src="{{ url('/admin/images/logo-text.png') }}" alt="">
                    </span>
                </a>
            </div>
        </div>
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                                    class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard"
                            aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="{{ url('/admin/images/user/1.png') }}" height="40" width="40"
                                    alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="/profile"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span>
                                                <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li>

                                        <hr class="my-2">
                                        <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock
                                                    Screen</span></a>
                                        </li>
                                        <li><a href="/adminlogout"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">

                    <li class="nav-label"><a class="has-arrow" href="javascript:void()" aria-expanded="false"><span
                                class="nav-text">Admin</span> </a>
                        <ul aria-expanded="false">
                            <ul aria-expanded="false">
                                <li><a href="/home">Dashboard</a></li>
                                <li><a href="/">Website</a></li>
                            </ul>
                        </ul>
                    </li>
                    
                    <ul aria-expanded="false">
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <span class="nav-text">Product</span>
                            </a>
                            <ul aria-expanded="false">
                                <ul aria-expanded="false">
                                    <li><a href="/add">Add product</a></li>
                                    <li><a href="/list">Product list</a></li>
                                </ul>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-note menu-icon"></i><span class="nav-text"> Variation</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="/colour">Add Colour</a></li>
                                <li><a href="/material"> Material type</a></li>
                                <li><a href="/size">Add Size</a></li>
                                <li><a href="/category"> Add Category</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-note menu-icon"></i><span class="nav-text"> Blogs</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="/addblog">Add Blog</a></li>
                                <li><a href="/bloglist"> Blog List</a></li>
                             
                            </ul>
                        </li>
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="bi bi-person"></i><span class="nav-text">Coupon</span>
                            </a>
                            <ul aria-expanded="false">

                                <li><a href="/addcoupon">Add Coupon</a></li>
                                
                            </ul>
                        </li>
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="bi bi-person"></i><span class="nav-text">Profile</span>
                            </a>
                            <ul aria-expanded="false">

                                <li><a href="/profile">Admin Profile</a></li>
                                <li><a href="/users">Users list</a></li>
                            </ul>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>

        @yield('content')




        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a>
                    2018</p>
            </div>
        </div>
    </div>

    <script src="{{ url('/admin/plugins/common/common.min.js') }}"></script>
    <script src="{{ url('/admin/js/custom.min.js') }}"></script>
    <script src="{{ url('/admin/js/settings.js') }}"></script>
    <script src="{{ url('/admin/js/gleek.js') }}"></script>
    <script src="{{ url('/admin/js/styleSwitcher.js') }}"></script>

    <!-- Chartjs -->
    <script src="{{ url('/admin/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Circle progress -->
    <script src="{{ url('/admin/plugins/circle-progress/circle-progress.min.js') }}"></script>
    <!-- Datamap -->
    <script src="{{ url('/admin/plugins/d3v3/index.js') }}"></script>
    <script src="{{ url('/admin/plugins/topojson/topojson.min.js') }}"></script>
    <script src="{{ url('/admin/plugins/datamaps/datamaps.world.min.js') }}"></script>
    <!-- Morrisjs -->
    <script src="{{ url('/admin/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ url('/admin/plugins/morris/morris.min.js') }}"></script>
    <!-- Pignose Calender -->
    <script src="{{ url('/admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ url('/admin/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <!-- ChartistJS -->
    <script src="{{ url('/admin/plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ url('/admin/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ url('/admin/js/dashboard/dashboard-1.js') }}"></script>

</body>

</html>
