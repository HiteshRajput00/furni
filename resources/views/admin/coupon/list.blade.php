<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />
    <title>admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/admin/images/favicon.png') }}">
    <!-- Pignose Calender -->
    <link href="{{ url('/admin/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ url('/admin/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ url('/admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">coupon</th>
                    <th class="W-25" scope="col">couponTYPE</th>
                    <th scope="col">Sno.</th>
                    <th scope="col">coupon</th>
                    <th scope="col">code</th>
                    <th>expiredate</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $coupon)
                    <tr>
                        <td></td>
                        <td scope="row">{{ $coupon->type }}</td>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td> {{ $coupon->name }}</td>
                        <td>{{ $coupon->code }}</td>
                        <td>{{ $coupon->expiredate }}</td>
                        <td><a class="btn btn-primary" href="{{ route('delete', ['id' => $coupon->id]) }}">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
