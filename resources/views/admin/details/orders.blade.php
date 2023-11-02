@extends('admin.structure.master_layout')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>


    <table class="table ">
        <thead>
            <tr>
                <th scope="col">Sno.</th>
                <th scope="col">OrderNO</th>
                <th scope="col">product</th>
                <th scope="">quantity</th>
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
@endsection
