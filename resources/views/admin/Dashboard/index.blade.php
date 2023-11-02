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
                                <p id="p3" class="text-white mb-0">
                                    {{ now()->format('Y-m-d') }}
                                </p>
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
                                <p id="p3" class="text-white mb-0">
                                    {{ now()->format('Y-m-d') }}
                                </p>

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
                                <p id="p3" class="text-white mb-0">
                                {{ now()->format('Y-m-d') }}
                            </p>
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
                                        <h3 class="m-0">$ {{ $lastMonthEarnings }}</h3>
                                    </div>
                                    <div>
                                        <ul>
                                           
                                            <li class="d-inline-block"><a class="text-dark" href="#">{{ now()->format('Y-m-d') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <br><br>
                                <h4>Order Summary </h4>
                                <table class="table ">
                                    <thead>
                                        <tr>

                                            <th scope="col">OrderNO</th>
                                            <th scope="col">product</th>
                                            <th scope="">quantity</th>
                                            <th scope="col">coupon</th>
                                            <th scope="col">Discount</th>
                                            <th scope="col">total price</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lastMonthOrder as $order)
                                            <tr>

                                                <td> {{ $order->orderNUM }}</td>

                                                <td>
                                                    <table>
                                                        @foreach (explode(',', $order->productID) as $product)
                                                            <tr>
                                                                <?php  $result = App\Models\Products::Class::find($product)?>
                                                                <td> {{ $result->product }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </table>

                                                </td>
                                                <td>
                                                    <table>
                                                        @foreach (explode(',', $order->variation_qty) as $qty)
                                                            <tr>
                                                                <td> {{ $qty }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </td>
                                                <td>{{ $order->Coupon }}</td>
                                                <td>${{ $order->discount }}</td>
                                                <td>${{ $order->totalamount }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Products Summary</h4>
                            <div id="morris-bar-chart">

                             
                            </div>
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
                                                <th>Payment </th>
                                                <th>Amount </th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <?php $customer = App\Models\BillingDetails::class::find($order->billing_detailsID); ?>
                                                <tr>
                                                    <td><strong style="font-size: 25px">{{ $customer->fname }}&nbsp;{{ $customer->lname  }}</strong></td>
                                                    <td>

                                                        <table>
                                                            @foreach (explode(',', $order->productID) as $product)
                                                                <tr>
                                                                    <?php  $result = App\Models\Products::Class::find($product)?>
                                                                    <td> {{ $result->product }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>


                                                    </td>
                                                    <td>
                                                        <span>{{ $customer->statecountry }}</span>
                                                    </td>
                                                    @if ($order->status === 1)
                                                        <td>
                                                            <div>

                                                                <div class="progress" style="height: 6px">
                                                                    <div class="progress-bar bg-success"
                                                                        style="width: 50%"></div>
                                                                </div>

                                                            </div>
                                                        </td>
                                                        <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                                        <td>${{ $order->totalamount }}</td>
                                                        @else
                                                        <td>
                                                            <div>
                                                                <div class="progress" style="height: 6px">
                                                                    <div class="progress-bar bg-warning" style="width: 50%"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="fa fa-circle-o text-warning  mr-2"></i> Pending</td>
                                                        <td>${{ $order->totalamount }}</td>
                                                    @endif
                                                
                                                    
                                                </tr>
                                            @endforeach
                                           
                                          
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
