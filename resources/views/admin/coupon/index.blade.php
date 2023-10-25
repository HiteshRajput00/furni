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
    <link href="{{ url('/admin/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    {{-- <link rel="stylesheet" href="{{url('/admin/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{url('/admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}"> --}}
    <!-- Custom Stylesheet -->
    <link href="{{ url('/admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div id="main-wrapper">
        @include('admin.structure.navbar')
        @include('admin.structure.header')
        @include('admin.structure.sidebar')
        <div class="login-form-bg h-100 ">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xl-11">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="/home">
                                    <h2>add product</h2>
                                </a>
                                <br><br>
                                <div>
                                    <h2> </h2>
                                    <br><br>
                                </div>
                                <!--form 1 start-->
                                <div>
                                    <form id="mainform" method="post" action="/savecoupon"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="enter coupon name"
                                                name="couponname" value="{{ old('couponname') }}" required>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="enter coupon code"
                                                name="couponcode" value="{{ old('couponcode') }}" required>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="material" id="">product type:</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="ptype" name="type">
                                                <option selected> select type</option>
                                                <option value="fixed"> fixed</option>
                                                <option value="discount"> discount</option>
                                            </select>
                                        </div>
                                        <!--simple div start-->
                                        <div id="form1" class="">
                                            <br><br>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="enter value"
                                                    name="value" required>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="expiredate" required>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="material" id="">product type:</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="ptype" name="status">
                                                    <option selected> select status</option>
                                                    <option value="1">auto expire</option>
                                                    <option value="2"> by admin</option>
                                                </select>
                                            </div>
                                            <br><br>
                                        </div>
                                </div>
                            </div>
                            <!--simple div end-->
                        </div>
                        <br><button class="btn login-form__btn submit w-100" type="submit" name="save">add</button>
                        </form><br>
                        {{-- <a class="btn btn-light" href="/index">back</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="footer">
        <div class="copyright">
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
    {{-- <script>
        const selectOption = document.getElementById('ptype');
        const btn = document.getElementById('sizebtn');
        const hiddenDiv = document.getElementById('form1');
        const form2 = document.getElementById('form2');
        const hiddenbtn = document.getElementById('hiddenbtn');
        selectOption.addEventListener('change', function() {
            const selectedValue = selectOption.value;
            if (selectedValue === 'fixed') {
                form1.style.display = 'block';
                hiddenbtn.style.display = 'none';
            } else {
                form1.style.display = 'block';
                // hiddenbtn.style.display = 'block';
            }
        });
    </script> --}}
</body>

</html>
