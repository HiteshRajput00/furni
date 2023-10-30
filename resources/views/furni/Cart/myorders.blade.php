@extends('furni.structure.main_layout')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="login-form-bg h-100 ">
        <div class="container h-100">
            <div class="row justify-content-center h-100">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Sno.</th>
                            <th scope="col">OrderNO</th>
                            <th scope="col">product</th>
                            <th scope="col">coupon</th>
                            <th scope="col">Discount</th>
                            <th scope="col">total price</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>

                                <td scope="row">{{ $loop->iteration }}</td>
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
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
