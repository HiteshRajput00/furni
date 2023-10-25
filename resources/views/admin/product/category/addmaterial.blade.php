<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />
  
    <title>admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/admin/images/favicon.png')}}">
    <!-- Pignose Calender -->
    <link href="{{url('/admin/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{url('/admin/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{url('/admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <!-- Custom Stylesheet -->
    <link href="{{url('/admin/css/style.css')}}" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
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

        <!--**********************************
            Nav header start
        ***********************************-->
         @include('admin.structure.navbar')
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('admin.structure.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
       @include('admin.structure.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="login-form-bg h-100"  >
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xl-6">
                        <div class="form-input-content">
                            <div class="card login-form mb-0">
                                <div class="card-body pt-5">
                                    <a class="text-center" href="/home"> <h4>add material</h4></a>
            
                                    <form class="mt-5 mb-5 login-input" method="post" action="/addmaterial" >
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="enter material type" name="type">
                                            @if($errors->has('type'))
                                            <div class="text-danger">{{ $errors->first('type') }}</div>
                                             @endif
                                         </div>
                                        
                                        
                                        
                                        <button class="btn login-form__btn submit w-100" type="submit">add</button>
                                    </form>
                                    <a class="btn btn-primary" href="/index">back</a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="footer">
            <div class="copyright">
             <!--   <p> &copy;  <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>-->
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{url('/admin/plugins/common/common.min.js')}}"></script>
    <script src="{{url('/admin/js/custom.min.js')}}"></script>
    <script src="{{url('/admin/js/settings.js')}}"></script>
    <script src="{{url('/admin/js/gleek.js')}}"></script>
    <script src="{{url('/admin/js/styleSwitcher.js')}}"></script>

    <!-- Chartjs -->
    <script src="{{url('/admin/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Circle progress -->
    <script src="{{url('/admin/plugins/circle-progress/circle-progress.min.js')}}"></script>
    <!-- Datamap -->
    <script src="{{url('/admin/plugins/d3v3/index.js')}}"></script>
    <script src="{{url('/admin/plugins/topojson/topojson.min.js')}}"></script>
    <script src="{{url('/admin/plugins/datamaps/datamaps.world.min.js')}}"></script>
    <!-- Morrisjs -->
    <script src="{{url('/admin/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{url('/admin/plugins/morris/morris.min.js')}}"></script>
    <!-- Pignose Calender -->
    <script src="{{url('/admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{url('/admin/plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
    <!-- ChartistJS -->
    <script src="{{url('/admin/plugins/chartist/js/chartist.min.js')}}"></script>
    <script src="{{url('/admin/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>



    <script src="{{url('/admin/js/dashboard/dashboard-1.js')}}"></script>

</body>

</html>
