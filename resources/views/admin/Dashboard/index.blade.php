@extends('admin.structure.master_layout')
@section('content')

    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">total Products </h3>
                            <div class="d-inline-block">
                                <h2 class="text-white"> {{ $data }}</h2>
                                {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                                <p id="p1" class="text-white mb-0"></p>
                                <script>
                                    var date = new Date();
                                    var current_date = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
                                    document.getElementById("p1").innerHTML = current_date;
                                </script>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Net Profit</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">$ {{ array_sum($price) }}</h2>
                                <p id="p2" class="text-white mb-0"></p>
                                <script>
                                    var date = new Date();


                                    var n = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
                                    document.getElementById("p2").innerHTML = n;
                                </script>

                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white"> Customers</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $userCount }}</h2>
                                <p id="p3" class="text-white mb-0"></p>
                                <script>
                                    var date = new Date();


                                    var n = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
                                    document.getElementById("p3").innerHTML = n;
                                </script>

                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body pb-0 d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-1">Product Sales</h4>
                                        <p>Total Earnings of the Month</p>
                                        <h3 class="m-0">$ 12,555</h3>
                                    </div>
                                    <div>
                                        <ul>
                                            <li class="d-inline-block mr-3"><a class="text-dark" href="#">Day</a></li>
                                            <li class="d-inline-block mr-3"><a class="text-dark" href="#">Week</a>
                                            </li>
                                            <li class="d-inline-block"><a class="text-dark" href="#">Month</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="chart_widget_2"></canvas>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="w-100 mr-2">
                                            <h6>Pixel 2</h6>
                                            <div class="progress" style="height: 6px">
                                                <div class="progress-bar bg-danger" style="width: 40%"></div>
                                            </div>
                                        </div>
                                        <div class="ml-2 w-100">
                                            <h6>iPhone X</h6>
                                            <div class="progress" style="height: 6px">
                                                <div class="progress-bar bg-primary" style="width: 80%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Order Summary</h4>
                            <div id="morris-bar-chart"></div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-widget">
                        <div class="card-body">
                            <h5 class="text-muted">Order Overview </h5>
                            <h2 class="mt-4">5680</h2>
                            <span>Total Revenue</span>
                            <div class="mt-4">
                                <h4>30</h4>
                                <h6>Online Order <span class="pull-right">30%</span></h6>
                                <div class="progress mb-3" style="height: 7px">
                                    <div class="progress-bar bg-primary" style="width: 30%;" role="progressbar"><span
                                            class="sr-only">30% Order</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h4>50</h4>
                                <h6 class="m-t-10 text-muted">Offline Order <span class="pull-right">50%</span></h6>
                                <div class="progress mb-3" style="height: 7px">
                                    <div class="progress-bar bg-success" style="width: 50%;" role="progressbar"><span
                                            class="sr-only">50% Order</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h4>20</h4>
                                <h6 class="m-t-10 text-muted">Cash On Develery <span class="pull-right">20%</span></h6>
                                <div class="progress mb-3" style="height: 7px">
                                    <div class="progress-bar bg-warning" style="width: 20%;" role="progressbar"><span
                                            class="sr-only">20% Order</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-0">
                            <h4 class="card-title px-4 mb-3">Todo</h4>
                            <div class="todo-list">
                                <div class="tdl-holder">
                                    <div class="tdl-content">
                                        <ul id="todo_list">
                                            <li><label><input type="checkbox"><i></i><span>Get up</span><a href='#'
                                                        class="ti-trash"></a></label></li>
                                            <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a
                                                        href='#' class="ti-trash"></a></label></li>
                                            <li><label><input type="checkbox"><i></i><span>Don't give up the
                                                        fight.</span><a href='#' class="ti-trash"></a></label></li>
                                            <li><label><input type="checkbox" checked><i></i><span>Do something
                                                        else</span><a href='#' class="ti-trash"></a></label></li>
                                        </ul>
                                    </div>
                                    <div class="px-4">
                                        <input type="text" class="tdl-new form-control"
                                            placeholder="Write new item and hit 'Enter'...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ url('/admin/images/users/8.jpg') }}" class="rounded-circle" alt="">
                                <h5 class="mt-3 mb-1">Ana Liem</h5>
                                <p class="m-0">Senior Manager</p>
                                <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ url('/admin/images/users/5.jpg') }}" class="rounded-circle" alt="">
                                <h5 class="mt-3 mb-1">John Abraham</h5>
                                <p class="m-0">Store Manager</p>
                                <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ url('/admin/images/users/7.jpg') }}" class="rounded-circle" alt="">
                                <h5 class="mt-3 mb-1">John Doe</h5>
                                <p class="m-0">Sales Man</p>
                                <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ url('/admin/images/users/1.jpg') }}" class="rounded-circle" alt="">
                                <h5 class="mt-3 mb-1">Mehedi Titas</h5>
                                <p class="m-0">Online Marketer</p>
                                <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <table class="table table-xs mb-0">
                                        <thead>
                                            <tr>
                                                <th>Customers</th>
                                                <th>Product</th>
                                                <th>Country</th>
                                                <th>Status</th>
                                                <th>Payment Method</th>
                                                <th>Activity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="{{ url('/admin/images/avatar/1.jpg') }}"
                                                        class=" rounded-circle mr-3" alt="">Sarah Smith</td>
                                                <td>iPhone X</td>
                                                <td>
                                                    <span>United States</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <div class="progress" style="height: 6px">
                                                            <div class="progress-bar bg-success" style="width: 50%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                                <td>
                                                    <span>Last Login</span>
                                                    <span class="m-0 pl-3">10 sec ago</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{ url('/admin/images/avatar/2.jpg') }}"
                                                        class=" rounded-circle mr-3" alt="">Walter R.</td>
                                                <td>Pixel 2</td>
                                                <td><span>Canada</span></td>
                                                <td>
                                                    <div>
                                                        <div class="progress" style="height: 6px">
                                                            <div class="progress-bar bg-success" style="width: 50%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                                <td>
                                                    <span>Last Login</span>
                                                    <span class="m-0 pl-3">50 sec ago</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{ url('/admin/images/avatar/3.jpg') }}"
                                                        class=" rounded-circle mr-3" alt="">Andrew D.</td>
                                                <td>OnePlus</td>
                                                <td><span>Germany</span></td>
                                                <td>
                                                    <div>
                                                        <div class="progress" style="height: 6px">
                                                            <div class="progress-bar bg-warning" style="width: 50%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-circle-o text-warning  mr-2"></i> Pending</td>
                                                <td>
                                                    <span>Last Login</span>
                                                    <span class="m-0 pl-3">10 sec ago</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{ url('/admin/images/avatar/6.jpg') }}"
                                                        class=" rounded-circle mr-3" alt=""> Megan S.</td>
                                                <td>Galaxy</td>
                                                <td><span>Japan</span></td>
                                                <td>
                                                    <div>
                                                        <div class="progress" style="height: 6px">
                                                            <div class="progress-bar bg-success" style="width: 50%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                                <td>
                                                    <span>Last Login</span>
                                                    <span class="m-0 pl-3">10 sec ago</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{ url('/admin/images/avatar/4.jpg') }}"
                                                        class=" rounded-circle mr-3" alt=""> Doris R.</td>
                                                <td>Moto Z2</td>
                                                <td><span>England</span></td>
                                                <td>
                                                    <div>
                                                        <div class="progress" style="height: 6px">
                                                            <div class="progress-bar bg-success" style="width: 50%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                                <td>
                                                    <span>Last Login</span>
                                                    <span class="m-0 pl-3">10 sec ago</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{ url('/admin/images/avatar/5.jpg') }}"
                                                        class=" rounded-circle mr-3" alt="">Elizabeth W.</td>
                                                <td>Notebook Asus</td>
                                                <td><span>China</span></td>
                                                <td>
                                                    <div>
                                                        <div class="progress" style="height: 6px">
                                                            <div class="progress-bar bg-warning" style="width: 50%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-circle-o text-warning  mr-2"></i> Pending</td>
                                                <td>
                                                    <span>Last Login</span>
                                                    <span class="m-0 pl-3">10 sec ago</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
